<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class UserController extends Controller
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
        return view('admin.user.add');
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
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6',
        ]);
        User::create($data);
        return redirect('admin/user')->with('flag','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['users' => $user]);
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
        $user = User::find($id);
        $data = $request->all();
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'required|confirmed|min:6',
    ]);
        $user->update($data);
        return redirect('admin/user')->with('flag','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['error' => false]);
    }
    public function getList(){
        $users = User::orderBy('id', 'desc');
        return datatables()->eloquent($users)
        ->addColumn('action', function($user){
            return '<button class="btn btn-success" userId="'.$user->id.'">Show </button> <a class="btn btn-warning" href="'.asset("admin/user")."/".$user->id."/edit".'" userId="'.$user->id.'">Edit </a> <button userId="'.$user->id.'" class="btn btn-danger">Delete </button>';
        }) 
        ->rawColumns(['action'])
        ->toJson();
        
    }
}
