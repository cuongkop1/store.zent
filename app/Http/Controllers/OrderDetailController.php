<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetail;
use App\Http\Requests;

class OrderDetailController extends Controller
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
        return view('admin.orderDetail.add');
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
        'product_detail_id' => 'required|numeric',
        'order_id' => 'required|numeric',
        'quantity' => 'required|numeric',
        'price' => 'required|numeric',
    ]);
        OrderDetail::create($data);
        return redirect('admin/order-detail')->with('flag','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderDetail = OrderDetail::find($id);
        return $orderDetail;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderDetail = OrderDetail::find($id);
        return view('admin.orderDetail.edit', ['orderDetails' => $orderDetail]);
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
        $orderDetail = OrderDetail::find($id);
        $data = $request->all();
        $request->validate([
        'product_detail_id' => 'required|numeric',
        'order_id' => 'required|numeric',
        'quantity' => 'required|numeric',
        'price' => 'required|numeric',
    ]);
        $orderDetail->update($data);
        return redirect('admin/order-detail')->with('flag','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderDetail::find($id)->delete();
        return response()->json(['error' => false]);
    }
    public function getList(){
        $orderDetails = OrderDetail::orderBy('id', 'desc');
        return datatables()->eloquent($orderDetails)
        ->addColumn('action', function($orderDetail){
            return '<button class="btn btn-success" orderDetailId="'.$orderDetail->id.'">Show </button> <a class="btn btn-warning" href="'.asset("admin/order-detail")."/".$orderDetail->id."/edit".'">Edit </a> <button orderDetailId="'.$orderDetail->id.'" class="btn btn-danger">Delete </button>';
        }) 
        ->rawColumns(['action'])
        ->toJson();
        
    }
}
