<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batche;
use App\Models\Participant;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $attBatchEvent = Batche::with('events', 'participants', 'creator', 'editor', 'destroyer')->get();
        $participants = Participant::with('creator', 'editor', 'destroyer')->get();

        return view('attendance.index', compact('participants', 'attBatchEvent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attBatchEvent = Batche::with('events', 'participants', 'creator', 'editor', 'destroyer')->get();
        $participants = Participant::with('creator', 'editor', 'destroyer')->get();
       return view('attendance.create', compact('participants', 'attBatchEvent'));
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
