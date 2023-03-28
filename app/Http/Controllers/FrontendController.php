<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class FrontendController extends Controller
{
    public const PUBLIC_PATH = 'upload/avatars/';

    public function index()
    {
        return view('frontend.pages.index');
    }

    public function login()
    {
        return view('frontend.pages.login');
    }

    public function register()
    {
        return view('frontend.pages.register');
    }

    public function getAccount()
    {
        $getUserById = User::find(Auth::user()->id);
        return view('frontend.pages.account', compact('getUserById'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'billing_address' => ['required', 'max:255'],
            'shipping_address' => ['required', 'max:255'],
            'phone' => ['required', 'max:20'],
            'email' => ['required', 'max:255', 'email'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(110, 110)->save(FrontendController::PUBLIC_PATH . $pathName);
        }
        $id = Auth::user()->id;

        $getUserById = User::find($id);

        $imageExist = public_path(FrontendController::PUBLIC_PATH  . $getUserById->photo);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
        $getUserById->name = $request->name;
        $getUserById->email = $request->email;
        $getUserById->address = $request->billing_address;
        $getUserById->shipping_address = $request->shipping_address;
        $getUserById->phone = $request->phone;
        $getUserById->photo = $pathName;
        $getUserById->save();

        toastr()->success('Updated User Profile Success');

        return redirect()->back()->with('getUserById');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'max:255', 'min:8'],
            'new_password' => [
                'required',
                'max:255', 'min:8',
                'required_with:confirm_password',
                'same:confirm_password'
            ],
            'confirm_password' => ['max:255', 'min:8'],
        ]);
        $hashedPassword = Auth::user()->password;
        $checkedPassword = Hash::check($request->current_password, $hashedPassword);
        if ($checkedPassword) {
            $getUserById = User::find(Auth::user()->id);
            $getUserById->password = Hash::make($request->new_password);
            $getUserById->save();
            toastr()->success('Updated User Password Success');
            return redirect()->back();
        } else {
            toastr()->error('Current Password is wrong');
            return redirect()->back();
        }
    }
}