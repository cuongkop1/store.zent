<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Color;
use App\Size;
use App\Order;
use App\ProductDetail;
use App\ProductGallery;
use DB;
use Cart;
use Uuid;
use App\Http\Requests;
use Toastr;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();
        $last6 = Product::orderBy('id','desc')->take(6)->get();
        $latest = Product::orderBy('id','desc')->take(3)->get();
        $ranimages = Product::all()->random(6);
        $hot = Product::select('products.*','product_galleries.link')
        ->join('product_galleries','product_galleries.product_id','=','products.id')
        ->where('product_galleries.color_id',7)->orderBy('id','desc')->get();
        $count = Cart::Count();
        // $colorss = ProductGallery::where('product_id',$request->id)
        // ->join('colors','colors.id','=','product_galleries.color_id')
        // ->select('product_galleries.color_id','colors.code')->get();
        // dd($colors);
        return view('home.master', ['products' => $products,'last6s' => $last6,
         'ranimages' =>$ranimages,'hots'=>$hot,'latests'=>$latest,'count'=>$count]);
    }
    public function ViewProduct($slug){
        $viewps = Product::where('slug','=',$slug )->firstOrFail();
        $colors = ProductDetail::where('product_id',$viewps->id)
        ->join('colors','colors.id','=','product_details.color_id')
        ->select('colors.code','product_details.color_id')
        ->distinct('colors.code')->get();
        $ranimages = Product::all()->random(6);
        // $sizes = ProductDetail::where('product_id',$viewps->id)
        // ->join('sizes','sizes.id','=','product_details.size_id')
        // ->where('sizes.id',$colors->size_id)
        // ->select('sizes.name')->get();
        // $images = ProductGallery::where('product_id', $viewps->id)
        // ->join('product_galleries','product_galleries.product_id','=','products.id')
        // ->select('product_galleries.link')->get();
        $count = Cart::Count();
        return view('home.product', ['product_views' => $viewps,'colors'=>$colors,'count'=>$count,
         'ranimages' =>$ranimages]);
    }
    public function GetSizeByColor($color_id,$product_id){
        $sizes = ProductDetail::where('product_id',$product_id)
        ->join('sizes','sizes.id','=','product_details.size_id')
        ->where('product_details.color_id',$color_id)
        ->select('sizes.name as size_name','product_details.color_id','product_details.size_id','product_details.product_id')
        ->distinct('sizes.name')->get();
        // dd($sizes);
        return response()->json(['data'=>$sizes], 200);
    }
    public function GetQuantity($product_id, $color_id, $size_id){
        $quantity = ProductDetail::where('product_id',$product_id)
        ->where('color_id',$color_id)->where('size_id',$size_id)
        ->select('product_details.quantity')->first();
        // dd($quantity);
        
        return $quantity;
    }
    public function addToCart(Request $request,$id){

        $cart = Product::where('id',$id)->first();
        $code = Color::where('code',$request->color)
        ->select('colors.code','colors.id','colors.name')->first();
        // dd($code);
        $image = ProductGallery::where('product_id',$cart->id)
        ->select('product_galleries.link')
        ->where('color_id',$code->id)
        ->first();
        // dd($image);
        Cart::add(['id' => $id, 'name' =>$cart->name, 'qty' => $request->qty, 'price' => $cart->price, 'options' => ['img' => $image->link,'color'=>$code->name,'size'=>$request->size,'slug'=>$cart->slug]]);
        $content = Cart::content();
        // dd($content);
        // Cart::destroy();
    }
    public function CartView(){
        $content = Cart::content();
        $total = Cart::total();
        $count = Cart::Count();
        // dd($content);
        return view('home.cart',compact('content','total','count'));
    }
    public function DeleteProduct($id){
        Cart::remove($id);
        return redirect('cart');
    }
    public function CartCount(){
        $count = Cart::Count();
    }
    public function Minus(Request $request)
    {   
        $cart = Cart::get($request->rowId);
        if($cart->qty >1){
            Cart::update($request->rowId, $cart->qty -1);
        }
        return response()->json(['success' => 'Minus quantity Succesfully']);
    }

    public function Plus(Request $request)
    {
        $cart = Cart::get($request->rowId);
        $product = ProductDetail::where('product_id' , $cart->id)->first();
        if ($product->quantity > $cart->qty + 1) {
            Cart::update($request->rowId,$cart->qty + 1);
        }
        else{
            Toastr::error('Số lượng trong kho không đủ');
        }
        return response()->json(['success' => 'Plus quantity Succesfully']);
    }
    public function CheckOut(){
        $content = Cart::content();
        $total = Cart::total();
        $count = Cart::Count();
        return view('home.checkout',compact('content','total','count'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
    //     $request->validate([
    //     'customer_name' => 'required',
    //     'customer_address' => 'required',
    //     'customer_mobile' => 'required|numeric',
    // ]);
        
        // Order::create($data);
        $carts = Cart::content();
        
         // dd($carts);

        foreach ($carts as $c) {
            
            // dd($c);
            // $product = ProductDetail::where('product_id' , $cart->id)
        // ->where('color_id',$cart->color)->where('size_id',$cart->size)
            // ->get();
           
        }
         dd($c);
        // Order::create([
        //     'customer_name' => $request->customer_name,
        //     'customer_address' => $request->customer_address,
        //     'customer_mobile' => $request->customer_mobile,
        //     'total_price' => $request->total_price,
        //     // 'code' => Uuid::generate()->string,
        //     'code' => str_random(15),
        // ]);
        // Cart::destroy();
        // return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function QuickView($id)
    {   
        $product = Product::find($id);
        $colors = ProductDetail::where('product_id',$product->id)
        ->join('colors','colors.id','=','product_details.color_id')
        ->select('colors.code as color_code','product_details.color_id')
        ->distinct('colors.code')
        ->get();
        // dd($product1);
        return response()->json(['data'=> $product, 'colors' => $colors]);
        // ->with(['colors' => $colors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
