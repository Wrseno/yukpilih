<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Vote;
use App\Models\User;
use App\Models\Poll;
use App\Models\Division;
use App\Models\Choice;

class PollResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $poll = Poll::orderBy('id', "DESC")->get();
        $choice = Choice::get();

        $hasil1 = 0;
        $hasil2 = 0;
        $hasil3 = 0;

        foreach($poll as $p)
        {
            if(count($choice) !=0)
            {
                $opsi3 = '';
                $jml_pilihan = Choice::where('poll_id', '=', $p->id)->count();
               // dd($jml_pilihan);
                if($jml_pilihan == 2){
                    $divisi = Division::get();
                    $jml_divisi = Division::count();

                    foreach($divisi as $d)
                    {
                        $vote1 = Vote::where('choice_id','=',$choice->map->id[0])->where('division_id','=',$d->id)->count();
                        $vote2 = Vote::where('choice_id','=',$choice->map->id[1])->where('division_id','=',$d->id)->count();
                        if($vote1 > $vote2)
                        {
                            $hasil1++;
                        }
                        if($vote2 > $vote1)

                        {
                            $hasil2++;
                        }
                    }

                    $opsi3 = '';
                    $hasil1 = ($hasil1/$jml_divisi)*100;
                    $hasil2 = ($hasil2/$jml_divisi)*100;
                }
                if($jml_pilihan == 3)
                {
                   
                    $division = Division::get();
                    $jml_divisi = Division::count();
                    foreach($division as $d)
                    {
                        $vote1 = Vote::where('choice_id', '=', $choice->map->id[0])->where('division_id','=',$d->id)->count();
                        $vote2 = Vote::where('choice_id', '=', $choice->map->id[1])->where('division_id','=',$d->id)->count();
                        $vote3 = Vote::where('choice_id', '=', $choice->map->id[2])->where('division_id', '=', $d->id)->count();

                        if($vote1 > $vote2 && $vote1 > $vote3)
                        {
                            $hasil1++;
                        }
                        if($vote2 > $vote1 && $vote2 > $vote3)
                        {
                            $hasil2++;
                        }
                        if($vote3 > $vote1 && $vote3 > $vote2)
                        {
                            $hasil3++;
                        }
                        if($vote1 = $vote2 = $vote3)
                        {
                            $im = 1/3;
                        }
                        if($vote1 = $vote2 || $vote1 = $vote3)
                        {
                            $hasil1 = 1/3;
                        }
                        if($vote2 = $vote1 || $vote2 = $vote3)
                        {
                            $hasil2 = 1/3;
                        }
                        if($vote3 = $vote1 || $vote3 = $vote2)
                        {
                            $hasil3 = 1/3;
                        }
                    }

                    $opsi3 = $choice->map->choice[3];
                    $hasil1 = ($hasil1/$jml_divisi)*100;
                    $hasil2 = ($hasil2/$jml_divisi)*100;
                    $hasil3 = ($hasil3/$jml_divisi)*100;
                }


                $data[]=[
                    'id' => $p->id,
                    'title'=>$p->title,
                    'description'=>$p->description,
                    'deadline'=>$p->deadline,
                    'created_by'=>$p->created_by,
                    'pilih1'=>$choice->map->choice[0],
                    'pilih2'=>$choice->map->choice[1],
                    'pilih3'=>$opsi3,
                    'hasil1'=>$hasil1,
                    'hasil2'=>$hasil2,
                    'hasil3'=>$hasil3,
                ];

                $hasil1 = 0;
                $hasil2 = 0;
                $hasil3 = 0;
            }

            else
            {
                echo "ada";
            }
        }
        if(Vote::where('user_id','=',Auth::user()->id)->exists())
        {
            $validasi = 'ada';
        }
        else
        {
            $validasi = 'tidak';
        }
        return view('result.view', compact('poll','choice','validasi','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
