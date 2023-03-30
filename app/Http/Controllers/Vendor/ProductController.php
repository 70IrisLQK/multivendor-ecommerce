<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImages;
use App\Models\Product;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    const PUBLIC_PATH = 'upload/products/thumbnail/';
    const ACTIVE = 'active';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $listProductsById = Product::where('id', $id)->latest()->get();
        return view('vendor.vendor_product.list_vendor_product', compact('listProductsById'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategory = Category::with('subCategories')->get();
        $listBrand = Brand::all();
        return view('vendor.vendor_product.create_vendor_product', compact(
            'listCategory',
            'listBrand',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "name" => ['required', 'max:255', 'min:6'],
                "tags" => ['sometimes', 'max:255'],
                "size" => ['sometimes', 'max:255'],
                "color" => ['sometimes', 'max:255'],
                "short_description" => ['required', 'max:255'],
                "long_description" => ['required'],
                "selling_price" => ['required', 'numeric'],
                "discount_price" => ['required', 'numeric'],
                "code" => ['required', 'max:255'],
                "qty" => ['required', 'numeric'],
                "brand_id" => ['required'],
                "category_id" => ['required'],
                "subcategory_id" => ['required'],
                'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
            ]);

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $pathName = Str::uuid() . '.' . $thumbnail->getClientOriginalExtension();
                Image::make($thumbnail)->resize(800, 800)->save(ProductController::PUBLIC_PATH . $pathName);
            }

            $newProduct = new Product();
            $newProduct->name = $request->name;
            $newProduct->slug = Str::slug($request->name);
            $newProduct->tags = $request->tags;
            $newProduct->size = $request->size;
            $newProduct->color = $request->color;
            $newProduct->short_description = $request->short_description;
            $newProduct->long_description = $request->long_description;
            $newProduct->selling_price = $request->selling_price;
            $newProduct->discount_price = $request->discount_price;
            $newProduct->code = $request->code;
            $newProduct->qty = $request->qty;
            $newProduct->brand_id = $request->brand_id;
            $newProduct->category_id = $request->category_id;
            $newProduct->subcategory_id = $request->subcategory_id;
            $newProduct->thumbnail = $request->thumbnail;
            $newProduct->hot_deals = $request->hot_deals;
            $newProduct->featured = $request->featured;
            $newProduct->special_deals = $request->special_deals;
            $newProduct->special_offer =  $request->special_offer;
            $newProduct->thumbnail = $pathName;
            $newProduct->status = ProductController::ACTIVE;
            $newProduct->save();

            // Save Multiple Image
            $images = $request->file('multi_image');
            foreach ($images as  $image) {
                $pathImage = Str::uuid() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(800, 800)->save('upload/products/multi_images/' . $pathImage);

                MultiImages::create([
                    'product_id' => $newProduct->id,
                    'image_name' => $pathImage,
                ]);
            }

            toastr()->success('Created Product Success');

            return redirect()->back();
        } catch (Query $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                toastr()->error('Duplicate Product.');
            }
            return redirect()->back();
        }
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
        $listCategory = Category::all();
        $listBrand = Brand::all();
        $listSubCategory = SubCategory::all();
        $getProductById = Product::find($id);
        $multiImages = MultiImages::where('product_id', $id)->get();
        return view('vendor.vendor_product.edit_vendor_product', compact(
            'getProductById',
            'listCategory',
            'listBrand',
            'listSubCategory',
            'multiImages'
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProductById = Product::findOrFail($id);
        $imageExist = public_path(ProductController::PUBLIC_PATH  . $getProductById->thumbnail);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
        $images = MultiImages::where('product_id', $id)->get();
        foreach ($images as  $image) {

            $imageExist = public_path('upload/products/multi_images/'  . $image->image_name);
            if (file_exists($imageExist)) {
                unlink($imageExist);
            }

            MultiImages::where('product_id', $id)->delete();
        }


        toastr()->success('Deleted Product Success');

        return redirect()->back();
    }

    public function updateThumbnail($id, Request $request)
    {
        $request->validate([
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $pathName = Str::uuid() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(800, 800)->save(ProductController::PUBLIC_PATH . $pathName);
        }

        $getProductById = Product::find($id);

        $imageExist = public_path(ProductController::PUBLIC_PATH  . $getProductById->thumbnail);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }
        $getProductById->thumbnail = $pathName;
        $getProductById->save();

        toastr()->success('Updated Thumbnail Product Success');

        return redirect()->back();
    }

    public function updateMultiImages($id, Request $request)
    {
        $request->validate(
            [
                'multi_images' => 'required',
                'multi_images.*' => 'mimes:jpeg,jpg,png,gif|max:2048'
            ]
        );

        if ($request->hasFile('multi_images')) {
            $images = $request->multi_images;
            foreach ($images as  $image) {
                $pathImage = Str::uuid() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(800, 800)->save('upload/products/multi_images/' . $pathImage);

                $multiImage = MultiImages::findOrFail($id);
                $imageExist = public_path('upload/products/multi_images/'  . $multiImage->image_name);
                if (file_exists($imageExist)) {
                    unlink($imageExist);
                }

                MultiImages::where('id', $id)->update([
                    'image_name' => $pathImage,
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        toastr()->success('Updated Multi Images Product Success');

        return redirect()->back();
    }

    public function deleteMultiImage($id)
    {
        $multiImagesById = MultiImages::findOrFail($id);
        $imageExist = public_path('upload/products/multi_images/'  . $multiImagesById->image_name);
        if (file_exists($imageExist)) {
            unlink($imageExist);
        }

        $multiImagesById->delete();

        toastr()->success('Deleted Multi Image Product Success');

        return redirect()->back();
    }

    public function getSubCategory($id)
    {
        dd($id);
        $getSubcategoryById = SubCategory::where('category_id', $id)->get();
        return json_encode($getSubcategoryById);
    }
}