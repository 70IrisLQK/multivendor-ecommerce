<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    public const PUBLIC_PATH = 'upload/avatars/';

    public function adminDashboard()
    {
        return view('admin.pages.admin_dashboard');
    }

    public function adminLogin()
    {
        return view('admin.pages.admin_login');
    }

    public function adminRegister()
    {
        return view('admin.pages.admin_register');
    }

    public function adminForgotPassword()
    {
        return view('admin.pages.admin_forgot');
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function adminProfile()
    {
        $getAdminById = User::find(Auth::user()->id);

        return view('admin.pages.admin_profile', compact('getAdminById'));
    }

    public function adminUpdateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(110, 110)->save(AdminController::PUBLIC_PATH . $pathName);
        }

        $getAdminById = User::find($id);

        $imageExist = public_path(AdminController::PUBLIC_PATH  . $getAdminById->photo);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
        $getAdminById->name = $request->name;
        $getAdminById->email = $request->email;
        $getAdminById->phone = $request->phone;
        $getAdminById->address = $request->address;
        $getAdminById->photo = $pathName;
        $getAdminById->save();

        toastr()->success('Updated Admin Profile Success');

        return view('admin.pages.admin_profile', compact('getAdminById'));
    }

    public function adminPassword()
    {
        return view('admin.pages.admin_password');
    }

    public function adminUpdatePassword(Request $request)
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
            $getAdminById = User::find(Auth::user()->id);
            $getAdminById->password = Hash::make($request->new_password);
            $getAdminById->save();
            toastr()->success('Updated Admin Password Success');
            return redirect()->back();
        } else {
            toastr()->error('Current Password is wrong');
            return redirect()->back();
        }
    }
}