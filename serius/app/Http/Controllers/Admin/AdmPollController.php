<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poll;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmPollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $poll = DB::table('polls')
        ->join('users', 'polls.created_by', '=' , 'users.id')
        ->get();
        return view('poll.view', compact('poll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::get();
        return view('poll.create', compact('user'));
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
            'title'=>'required',
            'description'=>'required',
            'deadline'=>'required',
            'created_by'=>'required',
        ]);

        $poll = Poll::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'deadline'=>$request->deadline,
            'created_by'=>$request->created_by,
        ]);

        if($poll){
            return redirect()->route('poll.index');
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
        $poll = Poll::findorfail($id);
        $user = User::get();
        return view('poll.edit', compact('poll','user'));
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
            'title'=>'required',
            'description'=>'required',
            'deadline'=>'required',
            'created_by'=>'required',
        ]);

        $poll = [
            'title'=>$request->title,
            'description'=>$request->description,
            'deadline'=>$request->deadline,
            'created_by'=>$request->created_by,
        ];

        $ubah = Poll::findorfail($id)->update($poll);
        return redirect()->route('poll.index');
        // $ubah = Poll::findorfail($id);
        // $aksi = $ubah->update($poll);

        // if($aksi){
        //     return redirect()->route('poll.index');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletepoll($id)
    {
        //
        $hapus = Poll::find($id)->delete();
        return redirect()->back()->with('success', 'Poll Berhasil di Hapus');
    }
}
