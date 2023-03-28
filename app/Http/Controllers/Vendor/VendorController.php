<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class VendorController extends Controller
{
    public const PUBLIC_PATH = 'upload/avatars/';

    public function vendorDashboard()
    {
        return view('vendor.pages.vendor_dashboard');
    }

    public function vendorLogin()
    {
        return view('vendor.pages.vendor_login');
    }

    public function vendorRegister()
    {
        return view('vendor.pages.vendor_register');
    }

    public function vendorForgotPassword()
    {
        return view('vendor.pages.vendor_forgot');
    }

    public function vendorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        toastr()->success('Logout Successfully.');

        return redirect('/vendor/login');
    }

    public function vendorProfile()
    {
        $getVendorById = User::find(Auth::user()->id);

        return view('vendor.pages.vendor_profile', compact('getVendorById'));
    }

    public function vendorUpdateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'joined_at' => ['required'],
            'vendor_info' => ['required', 'max:255'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(110, 110)->save(VendorController::PUBLIC_PATH . $pathName);
        }

        $getVendorById = User::find($id);

        $imageExist = public_path(VendorController::PUBLIC_PATH  . $getVendorById->photo);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
        $getVendorById->name = $request->name;
        $getVendorById->email = $request->email;
        $getVendorById->phone = $request->phone;
        $getVendorById->address = $request->address;
        $getVendorById->vendor_info = $request->vendor_info;
        $getVendorById->vendor_joined_at = Carbon::createFromFormat('d/m/Y', $request->joined_at);
        $getVendorById->photo = $pathName;
        $getVendorById->save();

        toastr()->success('Updated Vendor Profile Success');

        return view('vendor.pages.vendor_profile', compact('getVendorById'));
    }

    public function vendorPassword()
    {
        return view('vendor.pages.vendor_password');
    }

    public function vendorUpdatePassword(Request $request)
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
            $getVendorById = User::find(Auth::user()->id);
            $getVendorById->password = Hash::make($request->new_password);
            $getVendorById->save();
            toastr()->success('Updated Vendor Password Success');
            return redirect()->back();
        } else {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            return redirect()->back();
        }
    }
}