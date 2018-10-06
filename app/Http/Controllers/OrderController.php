<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Requests;

class OrderController extends Controller
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
        return view('admin.order.add');
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
            'product_id' => 'required',
            'code' => 'required',
            'total_price' => 'required|numeric',
            'user_id' => 'required|numeric',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'customer_mobile' => 'required|numeric',
            'status' => 'required|numeric',
        ]);
        Order::create($data);
        return redirect('admin/order')->with('flag','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.order.edit', ['orders' => $order]);
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
        $order = Order::find($id);
        $data = $request->all();
        $request->validate([
        'product_id' => 'required',
        'code' => 'required',
        'total_price' => 'required|numeric',
        'user_id' => 'required|numeric',
        'customer_name' => 'required',
        'customer_address' => 'required',
        'customer_mobile' => 'required|numeric',
        'status' => 'required|numeric',
    ]);
        $order->update($data);
        return redirect('admin/order')->with('flag','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return response()->json(['error' => false]);
    }
    public function getList(){
        $orders = Order::orderBy('id', 'desc');
        return datatables()->eloquent($orders)
        ->addColumn('action', function($order){
            return '<button class="btn btn-success" orderId="'.$order->id.'">Show </button> <a class="btn btn-warning" href="'.asset("admin/order")."/".$order->id."/edit".'">Edit </a> <button orderId="'.$order->id.'" class="btn btn-danger">Delete </button>';
        }) 
        ->rawColumns(['action'])
        ->toJson();
    }
}
