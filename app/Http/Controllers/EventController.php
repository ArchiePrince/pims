<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Batche;
use App\Models\EventType;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{

    public function index()
    {
        //SELECT * FROM events;
        $events = Event::with('batches', 'eventType', 'creator', 'editor', 'destroyer')
            ->latest()->get();
        $batches = Batche::with('events', 'creator', 'editor', 'destroyer')->get();


        return view('events.index', compact('events', 'batches'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

//         $batchEvent = Event::with('eventType', 'creator', 'editor', 'destroyer')->latest()->first();
//
//            $eid = $request->eid;
//            $event = Event::firstOrNew(['eid'=>$eid]);
//           $event->e_title = $request->e_title;
//            $event->tid = $request->tid;
//            $event->save();
//
//
//
//       return redirect()->route('events.create')->with('success', 'Event is successfully added!');

        $validator = Validator::make($request->all(),[
            'e_title' => 'required',
        ]);
//        if (!$validator->passes()) {
//            return response()->json(['error'=>$validator->errors()->all()]);
//        }
//        $input = $request->all();
//        Event::create($input);
//        return response()->json(['success'=>'Form Submitted successfully.']);

        if ($validator->failed()){
            Alert::error('Error!', $validator->messages()->first());
            return redirect()->route('batches.create');
        }
        else {
            Event::create($request->all());
            Alert::success('Success', 'Program Created Successfully');
            return redirect()->route('batches.create');
        }
    }



    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }


    public function edit(Event $event)
    {
        //
        return view('events.edit', compact('event'));
    }


    public function update(Request $request, Event $event)
    {
        //
          $event->e_title = $request->e_title;
            $event->e_date = $request->e_date;
            $event->e_loc = $request->e_loc;
            $event->e_desc = $request->e_desc;
            $event->e_rmrks = $request->e_rmrks;
            $event->save();

        return redirect()->route('events.index', $event)->with('update', 'Data is successfully updated!');
    }


    public function destroy(Event $event)
    {
        //
         $event->delete();
        return redirect()->back()->with('del', 'Data deleted successfully!');
    }


}
