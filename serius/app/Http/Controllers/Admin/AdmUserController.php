<?php

namespace App\Http\Controllers\Admin;

use App\Models\Division;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdmUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = DB::table('users')
        ->join('divisions', 'users.division_id', '=' , 'divisions.id')
        ->select('users.*', 'divisions.name')
        ->get();
        return view('manageuser.view', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $divisi = Division::get();
        return view('manageuser.create', compact('divisi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
            'role'=>'required',
            'division_id'=>'required',
        ]);

        $user = User::create([
            'username'=>$request->username,
            'password'=>bcrypt('12345'),
            'role'=>$request->role,
            'division_id'=>$request->division_id,
        ]);

        if($user){
            return redirect()->route('manageuser.index');
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
        //
        $user = User::findOrFail($id);
        $divisi = Division::get();
        return view('manageuser.edit', compact('user','divisi'));
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
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
            'role'=>'required',
            'division_id'=>'required',
        ]);

        $data = [
            'username'=>$request->username,
            'password'=>$request->password,
            'role'=>$request->role,
            'division_id'=>$request->division_id,
        ];

        $ubah = User::findOrFail($id)->update();
            return redirect()->route('manageuser.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteuser($id)
    {
        //
        $hapus = User::findorfail($id)->delete();
        return redirect()->back()->with('success', 'User Berhasil di Hapus');
    }
}
