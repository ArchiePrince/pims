<?php

namespace App\Http\Controllers;

use Database\Seeders\BatchesSeeder;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Batche;
use App\Models\EventType;
use App\Models\Participant;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class BatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batche::with('events')->latest()->get();
        return response()->json($batches, 200);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $eventType = EventType::all();
        $events = Event::with('eventType', 'creator', 'editor', 'destroyer')->latest()->first();
        $batches = Batche::all();
        return view('batches.create', compact('eventType', 'events', 'batches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $batches = Batche::with('events')->get();
            $validator = Validator::make($request->all(), [
                'eid' => 'required',
                'title' => 'required',
                'start' => 'required',
                'end' => 'required',
                'location' => 'required',
                'allDay' => 'required',
                'color' => 'required',
                'textColor' => 'required',
                'description' => 'required',
            ]);

            if ($validator->failed()){
                Alert::error('Error!', $validator->messages()->first());
                return redirect()->route('batches.create');
            } else {
                if (empty($request->bid)){
                    Batche::create($request->all());
                    Alert::success('Success', 'Event Created Successfully');
//                    return redirect()->route('batches.create');
                    return redirect()->back();

                } else {
                    Batche::where('bid', $request->bid)->update([
                        'eid' => $request->eid,
                        'title' => $request->title,
                        'start' => $request->start,
                        'end' => $request->end,
                        'location' => $request->location,
                        'allDay' => $request->allDay,
                        'color' => $request->color,
                        'textColor' => $request->textColor,
                        'description' => $request->description,
                    ]);
                    Alert::success('Success', 'Event Updated Successfully');
                    return redirect()->back();
                }

            }
        } catch (\Exception $e) {
            Alert::error("Error", $e->getMessage());
            return redirect()->back();
        }



//           $events = Event::with('eventType', 'creator', 'editor', 'destroyer')->latest()->first();
//            $bid = $request->bid;
//            $batch = Batche::firstOrNew(['bid'=>$bid]);
//            $batch->b_title = $request->b_title;
//            $batch->eid = $events->eid;
//            $batch->start = $request->start;
//        $batch->end = $request->end;
//        $batch->loc = $request->loc;
//        $batch->desc = $request->desc;
//            $batch->save();

//            return redirect()->route('events.create')->with('add', 'Batch successfully added to Event!');
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
    public function destroy(Request $request)
    {
       Batche::where('bid', $request->bid)->delete();
        Alert::success('Success', 'Event Deleted Successfully');
        return response()->json($batch);
    }
}
