<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Http\Requests;

class ColorController extends Controller
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
        return view('admin.color.add');
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
        'code' => 'required',
        'name' => 'required',
    ]);
        Color::create([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => str_slug($request->name,'-'),
        ]);
        return redirect('admin/color')->with('flag','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $color = Color::find($id);
        return $color;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.color.edit', ['colors' => $color]);
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
        $color = Color::find($id);
        $data = $request->all();
        $request->validate([
        'code' => 'required',
        'name' => 'required',
    ]);
        $color->update([
                'code' => $request->code,
                'name' => $request->name,
                'slug' => str_slug($request->name,'-'),
            ]);
        return redirect('admin/color')->with('flag','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Color::find($id)->delete();
        return response()->json(['error' => false]);
    }
    public function getList(){
        $colors = Color::orderBy('id', 'desc');
        return datatables()->eloquent($colors)
        ->addColumn('action', function($color){
            return '<button class="btn btn-success" colorId="'.$color->id.'">Show </button> <a class="btn btn-warning" href="'.asset("admin/color")."/".$color->id."/edit".'">Edit </a> <button colorId="'.$color->id.'" class="btn btn-danger">Delete </button>';
        })
        ->addColumn('color', function($color){
            return '<div style="width:70px;height:70px;border: 1px solid black;border-radius:5px;background-color: '.$color->code.';"></div>';
        })
        ->rawColumns(['action','color'])
        ->toJson();
        
    }
}
