<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public const PUBLIC_PATH = 'upload/subcategories/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSubCategories = SubCategory::with('category')->latest('id')->get();

        return view('admin.subcategory.list_subcategory', compact('listSubCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategory = Category::all();

        return view('admin.subcategory.create_subcategory', compact('listCategory'));
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
            'category_id' => ['required']
        ]);

        $newSubCategory = new SubCategory();
        $newSubCategory->name = $request->name;
        $newSubCategory->slug = Str::slug($request->name);
        $newSubCategory->category_id = $request->category_id;
        $newSubCategory->save();

        toastr()->success('Added SubCategory Success');

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
        $getSubCategoryById = SubCategory::find($id);
        $listCategories = Category::all();
        return view('admin.subcategory.edit_subcategory', compact(
            'getSubCategoryById',
            'listCategories'
        ));
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
            'category_id' => ['required']
        ]);

        $getSubCategoryById = SubCategory::find($id);

        $getSubCategoryById->name = $request->name;
        $getSubCategoryById->slug = Str::slug($request->name);
        $getSubCategoryById->category_id = $request->category_id;
        $getSubCategoryById->save();

        toastr()->success('Updated SubCategory Success');

        $listCategories = Category::all();
        return view('admin.subcategory.edit_subcategory', compact('getSubCategoryById', 'listCategories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::destroy($id);

        toastr()->success('Deleted SubCategory Success');

        return redirect()->back();
    }
}