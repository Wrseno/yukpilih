<?php

namespace App\Http\Controllers\Admin;

use App\Models\Division;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $divisi = Division::get();
        return view('division.view', compact('divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('division.create');
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
            'name'=>'required',
        ]);

        $divisi = Division::create([
            'name'=>$request->name,
        ]);

        if($divisi){
            return redirect()->route('division.index')->with('success', 'Data Berhasil di Tambahkan');
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
        $divisi = Division::findorfail($id);
        return view('division.edit', compact('divisi'));
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
            'name'=>'required',
        ]);

        $divisi = [
            'name'=>$request->name,
        ];

        $ubah = Division::findorfail($id)->update($divisi);
            return redirect()->route('division.index')->with('success', 'Division Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletedivision($id)
    {
        //
        $hapus = Division::find($id)->delete();
        return redirect()->back()->with('success', 'Division Berhasil di Hapus');
    }
}
