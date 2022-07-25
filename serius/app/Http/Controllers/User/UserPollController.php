<?php

namespace App\Http\Controllers\User;

use App\Models\Poll;
use App\Models\Choice;
use App\Models\User;
use App\Models\Vote;
use App\Models\Division;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserPollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $vote = Vote::with('title', 'description', 'deadline', 'created_by')
        // ->where('active', 'Y')->doesntHave('votes')->get();

        //variable poll sama dengan database dari table poll, table poll join/gabung table user 
        //table poll kolom created_by sama dengan table user kolom id
        // $poll = DB::table('polls')
        // ->join('users', 'polls.created_by', '=' , 'users.id')
        // ->get();
        $user_id = Auth()->user()->id;

        $w = "SELECT * FROM polls JOIN users ON polls.created_by = users.id WHERE NOT EXISTS (SELECT *FROM votes WHERE user_id = '$user_id' AND votes.poll_id=polls.id)";
        $poll = DB::select($w);
        return view('userpoll.view', compact('poll'));
    }

    public function userpilihpoll($id){
        //$poll = Poll::findorfail($id);
        //dd($id);
        //dd($choice);
        //$division = Division::findorfail($id);
        //return view('userpoll.create', compact('poll', 'choice', 'user', 'division'));

        //variabel choice sama dengan table choice dimana poll_id variabel id
        $choice = Choice::where('poll_id', $id)->get();
        return view('userpoll.create', compact('choice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $vote = DB::table('votes')
        // ->join('choices', 'votes.choice_id', '=' , 'choices.id' )
        // ->join('users', 'votes.user_id', '=', 'users.id')
        // ->join('polls', 'votes.poll_id', '=' , 'polls.id')
        // ->join('divisions', 'votes.division_id', '=', 'divisions.id')
        // ->get();
        // $choice = Choice::get();
        // $user = User::get();
        // $poll = Poll::get();
        // $division = Division::get();
        // return view('userpoll.create', compact('vote'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi dari form choice_id dibuthkan, poll_id dibutuhkan
        $this->validate($request,[
            'choice_id'=>'required',
            'poll_id'=>'required',
        ]);

        //variabel user_id megambil session user id
        //variabel poll_id mengambil database user dimana id dari variabel user_id first(pertama atau untuk mengambil data tunggal
        $user_id = Auth()->user()->id;
        $poll_id = User::where('id', $user_id)->first();
        //dd($poll_id->division_id);

        //variabel vote mengambil database vote create
        //choice id dll dari form ke database
        $vote = Vote::create([
            'choice_id'=>$request->choice_id,
            'user_id'=>$user_id,
            'poll_id'=>$request->poll_id,
            'division_id'=>$poll_id->division_id,
        ]);

        //jika variabel vote maka akan diarahkan ke route usserpoll function index
        if($vote){
            return redirect()->route('userpoll.index');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
