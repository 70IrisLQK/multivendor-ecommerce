<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    public const PUBLIC_PATH = 'upload/categories/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategories = Category::latest('id')->get();

        return view('admin.category.list_category', compact('listCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create_category');
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
            Image::make($image)->resize(120, 120)->save(CategoryController::PUBLIC_PATH . $pathName);
        }

        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->slug = Str::slug($request->name);
        $newCategory->image = $pathName;
        $newCategory->save();

        toastr()->success('Added Category Success');

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
        $getCategoryById = Category::find($id);
        return view('admin.category.edit_category', compact('getCategoryById'));
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
            Image::make($image)->resize(110, 110)->save(CategoryController::PUBLIC_PATH . $pathName);
        }

        $getCategoryById = Category::find($id);

        $imageExist = public_path(CategoryController::PUBLIC_PATH  . $getCategoryById->image);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
        $getCategoryById->name = $request->name;
        $getCategoryById->image = $pathName;
        $getCategoryById->save();

        toastr()->success('Updated Category Success');

        return view('admin.category.edit_category', compact('getCategoryById'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getCategoryById = Category::find($id);

        $imageExist = public_path(CategoryController::PUBLIC_PATH  . $getCategoryById->image);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
        Category::destroy($id);

        toastr()->success('Deleted Category Success');

        return redirect('admin/categories');
    }
}