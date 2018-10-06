<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductDetail;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = ProductDetail::all();

        return view('admin.productDetail.add',['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->merge([ 
        //     'size' => implode(',', (array) $request->get('size')) 
        // ]);
        $count = count($request->input('color'));
        for($i = 0; $i < $count; ++$i){
        $data = $request->all();
        $request->validate([
            'size' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'product_detail_image' => 'required',
        ]);
        // ProductDetail::create($data);
            ProductDetail::create([
                'product_id' => $request->product_id[$i],
                'color_id' => $request->color[$i],
                'size_id' => $request->size[$i],
                'quantity' => $request->quantity[$i],
                // 'product_detail_image' => $request->product_detail_image[$i],
                'product_detail_image' =>$request->file('product_detail_image')[$i]->store('images')
            ]);
        }
        return Redirect()->route('detail.list', $request->product_id)->with('flag', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productDetail = ProductDetail::find($id);
        return $productDetail;

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productDetail = ProductDetail::find($id);
        return view('admin.productDetail.edit', ['productDetails' => $productDetail]);
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
    //     $productDetail = ProductDetail::find($id);
    //     $data = $request->all();
    //     $request->validate([
    //     'product_id' => 'required|numeric',
    //     'size' => 'required',
    //     'color' => 'required',
    //     'quantity' => 'required|numeric',
    // ]);
    //     $productDetail->update($data);
    //     return redirect('admin/product-detail')->with('flag','Cập nhật thành công!');
        $detail = ProductDetail::find($id);
        $data = $request->all();
        $request->validate([
            'size_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required|numeric',
            // 'product_detail_image' => 'required',
        ]);
        if ($request->hasFile('product_detail_image')) {
            $detail->update([
            'product_detail_image' => $request->product_detail_image->store('images'),
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'quantity' => $request->quantity,
        ]);
        // $detail = ProductDetail::where('id',$id)->first();
        // $detail->size = $request->size;
        // $detail->color = $request->color;
        // $detail->quantity = $request->quantity;
        // $detail->product_detail_image = $request->file('product_detail_image')->store('images');
        // $detail->save();
        }else{
            $detail->update([
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
                'quantity' => $request->quantity,
            ]);
        }
        
        // return response()->json(['noti' => 'edited'],200);
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
        ProductDetail::find($id)->delete();
        return response()->json(['error' => false]);
    }
    public function getList(){
        $color = ProductDetail::join('colors','colors.id','=','product_details.color_id')
        ->select('colors.code')->get();
        $productDetails = ProductDetail::join('products','product_details.product_id','=','products.id')
        ->join('colors','color.id','=','product_details.color_id')
        ->join('sizes','sizes.id','=','product_details.size_id')
        ->Select('product_details.*','products.name as product_name')->orderBy('id','desc');
        // $productDetails = ProductDetail::orderBy('id', 'desc');
        return datatables()->eloquent($productDetails)
        ->addColumn('action', function($productDetail){
            return '<button class="btn btn-success" productDetailId="'.$productDetail->id.'"><i class="fa fa-eye" aria-hidden="true"></i></button> <a class="btn btn-warning"  productDetailId="'.$productDetail->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <button productDetailId="'.$productDetail->id.'" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>';
        })
        ->addColumn('color', function($productDetail){
            return '<div style="width:70px;height:70px;border: 1px solid black;border-radius:5px;background-color: '.$productDetail->color.';"></div>';
        })
        ->addColumn('product_detail_image', function($productDetail){
            return '<img style="width:140px;height="140px" class="img-fluid" src="'.asset('/storage')."/".$productDetail->product_detail_image.'">';
        })
        // ->addColumn('name', function($product){
        //     return $product->name;
        // })
        ->rawColumns(['action', 'color','product_detail_image'])
        ->toJson();
        
    }

}


