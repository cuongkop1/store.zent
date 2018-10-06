<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Color;
use App\ProductGallery;
use App\ProductDetail;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Expense;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        // return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
        'name' => 'required',
        'original_price' => 'required|numeric',
        'price' => 'required|numeric',
        'description' => 'required',
        'content' => 'required',
        'product_code' => 'required|unique:products',
        'featured_image' => 'required',
    ]);
        Product::create([
            'featured_image' => $request->file('featured_image')->store('images'),
            'name' => $request->name,
            'original_price' => $request->original_price,
            'price' => $request->price,
            'description' => $request->description,
            'content' => $request->content,
            'product_code' => $request->product_code,
            'slug' => str_slug($request->name,'-'),
        ]);
        return redirect('admin/product')->with('flag','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return $product;

    }
    public function showDetail($id){
        $details = Product::find($id);
        $product_details = ProductDetail::where('product_id',$details->id)
        ->join('products','products.id','=','product_details.product_id')
        ->join('colors','colors.id','=','product_details.color_id')
        ->join('sizes','sizes.id','=','product_details.size_id')
        ->select('product_details.*','colors.code','sizes.name')->orderBy('id','desc')
        ->get();
        // dd($product_details);
        return view('admin.productDetail.list',['products'=> $details,'product_details' => $product_details]);
    }

      public function showImages($id)
    {   
        $images = ProductGallery::where('product_id', $id)->get();
        return $images;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', ['products' => $product]);
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
        $product = Product::find($id);
        $data = $request->all();
        $request->validate([
        'name' => 'required',
        'original_price' => 'required|numeric',
        'price' => 'required|numeric',
        'description' => 'required',
        'content' => 'required',
        'product_code' => 'required|unique:products,product_code,'.$id,
        // 'featured_image' => 'required',
    ]);
        if ($request->hasFile('featured_image')) {
            $product->update([
                'featured_image' => $request->featured_image->store('images'),
                'name' => $request->name,
                'original_price' => $request->original_price,
                'price' => $request->price,
                'description' => $request->description,
                'content' => $request->content,
                'product_code' => $request->product_code,
                'slug' => str_slug($request->name,'-'),
            ]);
        }
        else{
            $product->update([
                'name' => $request->name,
                'original_price' => $request->original_price,
                'price' => $request->price,
                'description' => $request->description,
                'content' => $request->content,
                'product_code' => $request->product_code,
                'slug' => str_slug($request->name,'-'),
            ]);

        }
        
        return redirect('admin/product')->with('flag','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return response()->json(['error' => false]);
    }
    public function getList(){
        // $users = Post::select('posts.id','posts.title','posts.thumbnail','posts.user_id','users.name')
        // ->join('users', 'users.id', '=', 'posts.user_id');
        // $products =Product::join('product_galleries', 'product_galleries.product_id', '=', 'products.id')->select('products.*','product_galleries.link')->orderBy('id','desc');
        // $products =DB::table('products')
        //     ->join('product_galleries', 'product_galleries.product_id', '=', 'products.id')
        //     ->select('products.*', 'product_galleries.link')
        //     ->get();
        $products = Product::orderBy('id','desc');
        return datatables()->eloquent($products)
        ->addColumn('action', function($product){
            return '<a title="Thêm chi tiết" style="margin-right: 3px;" class="btn btn-primary" href="'.asset("admin/product-detail")."/".$product->id."/add".'"><i class="fa fa-plus" aria-hidden="true"></i></a><a productId="'.$product->id.'" title="Thêm ảnh" style="margin-right: 3px;color:black; background: aquamarine;" class="btn add-image"><i class="fa fa-file-image-o" aria-hidden="true"></i></a><button title="Xem" class="btn btn-success" productId="'.$product->id.'"><i class="fa fa-eye" aria-hidden="true"></i></button><br> <a title="Sửa" class="btn btn-warning" style="margin-top:6px" href="'.asset("admin/product")."/".$product->id."/edit".'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <button productId="'.$product->id.'" title="Xóa" class="btn btn-danger" style="margin-top:6px"><i class="fa fa-trash" aria-hidden="true"></i></button>
                <a href="'.route('detail.list', $product->id).'" title="xem danh sách" style="color:black;margin-top:6px;background:palevioletred" class="btn btn-detail"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a>';
        })->addColumn('featured_image', function($product){
            return '<img style="width:110px;height:110px" class="img-fluid" src="'.'http://store.zent/storage/'.$product->featured_image.'">';
        })
        ->editColumn('price', function ($product) {
                return number_format($product->price).'<span> đ</span>';
            })
        ->rawColumns(['action','featured_image','price'])
        ->toJson();
        
    }
    public function createDetail($id){
        // $detail = DB::table('product_details')->join('products', 'products.id', '=', 'product_details.product_id')->get();
        $product = Product::find($id);
        return view('admin.productDetail.add', ['detail_ids' => $product]);
    }
    public function storeImages(Request $request, $id)
    {
        $images =$request->image;
        for ($i=0; $i < count($images)  ; $i++) { 
            $link = new ProductGallery();
            $link->product_id = $id;
            $link->link = 'images/' .$images[$i]->getClientOriginalName();
            $link->save();
            Storage::putFileAs('/images', $images[$i],$images[$i]->getClientOriginalName());
        }
        return response()->json([
            'success' => ' Create Product successfully'
        ]);
    }
    public function destroyImages($id)
    {   
        $image = ProductGallery::find($id);
        $image->delete();

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
