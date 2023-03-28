<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    public const PUBLIC_PATH = 'upload/brands/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBrands = Brand::latest('id')->get();

        return view('admin.brand.list_brand', compact('listBrands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(696, 350)->save(BrandController::PUBLIC_PATH . $pathName);
        }

        $newBrand = new Brand();
        $newBrand->name = $request->name;
        $newBrand->slug = Str::slug($request->name);
        $newBrand->image = $pathName;
        $newBrand->save();

        toastr()->success('Added Brand Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getBrandById = Brand::find($id);
        return view('admin.brand.edit_brand', compact('getBrandById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(110, 110)->save(BrandController::PUBLIC_PATH . $pathName);
        }

        $getBrandById = Brand::find($id);

        $imageExist = public_path(BrandController::PUBLIC_PATH  . $getBrandById->image);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
        $getBrandById->name = $request->name;
        $getBrandById->image = $pathName;
        $getBrandById->save();

        toastr()->success('Updated Brand Success');

        return view('admin.brand.edit_brand', compact('getBrandById'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getBrandById = Brand::find($id);

        $imageExist = public_path(BrandController::PUBLIC_PATH  . $getBrandById->image);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
        Brand::destroy($id);


        toastr()->success('Deleted Brand Success');

        return redirect()->back();
    }
}