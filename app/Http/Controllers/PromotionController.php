<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\Http\Requests;

class PromotionController extends Controller
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
        return view('admin.promotion.add');
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
        'date' => 'required',
    ]);
        Promotion::create($data);
        return redirect('admin/promotion')->with('flag','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::find($id);
        return $promotion;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::find($id);
        return view('admin.promotion.edit', ['promotions' => $promotion]);
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
        $product = Promotion::find($id);
        $data = $request->all();
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:promotions,email,'.$id,
        'password' => 'required|confirmed|min:6',
    ]);
        $product->update($data);
        return redirect('admin/promotion')->with('flag','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Promotion::find($id)->delete();
        return response()->json(['error' => false]);
    }
    public function getList(){
        $promotions = Promotion::orderBy('id', 'desc');
        return datatables()->eloquent($promotions)
        ->addColumn('action', function($promotion){
            return '<button class="btn btn-success" promotionId="'.$promotion->id.'">Show </button> <a class="btn btn-warning" href="'.asset("admin/promotion")."/".$promotion->id."/edit".'">Edit </a> <button promotionId="'.$promotion->id.'" class="btn btn-danger">Delete </button>';
        }) 
        ->rawColumns(['action'])
        ->toJson();
        
    }
}
