<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poll;
use App\Models\Choice;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmChoiceController extends Controller
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
        return view('choice.view', compact('poll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //untuk choice
     public function pilihpoll($id){
         $poll = Poll::findorfail($id);
         return view('choice.create', compact('poll'));
     }

    public function create()
    {
        //
        $poll = Poll::get();
        return view('choice.create', compact('poll'));
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
            'choice'=>'required',
            'poll_id'=>'required',
        ]);

        if(count($request->choice)>0){
            foreach($request->choice as $choice)
            {
                $choice = Choice::create([
                    'choice'=>$choice,
                    'poll_id'=>$request->poll_id,
                ]);
            }
        }
        

        if($choice){
            return redirect()->route('choice.index')-with('success', 'Data Berhasil Ditambahkan');
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
        $choi = Choice::where('poll_id', $id)->get();
        return view('choice.show', compact('choi'));
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
        return view('choice.create', compact('poll'));
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
            'choice'=>'required',
            'poll_id'=>'required',
        ]);

        $data = [
            'choice'=>$request->choice,
            'poll_id'=>$request->poll_id,
        ];

        $ubah = Choice::findorfail($id)->update();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletechoice($id)
    {
        //
        $hapus = Choice::findorfail($id)->delete();
            return redirect()->back()->with('success', 'Choice Berhasil di Hapus');
    }
}
