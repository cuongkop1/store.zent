<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductGallery;
use App\Http\Requests;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productGallery.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required|numeric',
    //         'link' => 'required',
    //     ]);
    //     $gallery = new ProductGallery();
    //     $gallery->product_id = $request->input('product_id');
    //     $gallery->link = $request->file('link')->store('images');
    //     $gallery->save();
    //     return redirect('admin/product-gallery')->with('flag','Thêm thành công!');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productGallery = ProductGallery::find($id);
        return $productGallery;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productGallery = ProductGallery::find($id);
        return view('admin.productGallery.edit', ['productGalleries' => $productGallery]);
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
        $productGallery = ProductGallery::find($id);
        $data = $request->all();
        $request->validate([
        'color_id' => 'required',
    ]);
        $productGallery->update([
            'color_id' =>$request->color_id,
        ]);
        return redirect('admin/product-gallery')->with('flag','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductGallery::find($id)->delete();
        return response()->json(['error' => false]);
    }
    public function getList(){
        $productGalleries = ProductGallery::orderBy('id', 'desc');
        return datatables()->eloquent($productGalleries)
        ->addColumn('action', function($productGallery){
            return '<button class="btn btn-success" productgalleryId="'.$productGallery->id.'">Show </button> <a class="btn btn-warning" href="'.asset("admin/product-gallery")."/".$productGallery->id."/edit".'">Edit </a> <button productgalleryId="'.$productGallery->id.'" class="btn btn-danger">Delete </button>';
        })
        ->addColumn('link', function($post){
            return '<img class="img-fluid" src="'.'http://store.zent/storage/'.$post->link.'">';
        })
        ->rawColumns(['action','link'])
        ->toJson();
    }

    public function store(Request $request)
    {
        $imageName = $request->file('link')->store('images');

        return response()->json(['path' => $imageName]);
    }
}
