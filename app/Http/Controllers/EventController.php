<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Batche;
use App\Models\EventType;

class EventController extends Controller
{

    public function index()
    {
        //SELECT * FROM events;
        $events = Event::with('eventType', 'creator', 'editor', 'destroyer')
        ->latest()->get();
       

        return view('events.index', compact('events'));

    }
 
    public function create()
    {
        $eventType = EventType::all();
        $batchEvent = Event::with('eventType', 'creator', 'editor', 'destroyer')->latest()->first();
        $batch = Batche::all();
        return view('events.create', compact('eventType', 'batchEvent', 'batch'));
    }

    public function store(Request $request)
    {

         $batchEvent = Event::with('eventType', 'creator', 'editor', 'destroyer')->latest()->first();

            $eid = $request->eid;
            $event = Event::firstOrNew(['eid'=>$eid]);
           $event->e_title = $request->e_title;
            $event->e_date = $request->e_date;
            $event->tid = $request->tid;
            $event->e_loc = $request->e_loc;
            $event->e_desc = $request->e_desc;
            $event->e_rmrks = $request->e_rmrks;
            $event->save();

          
            
       return redirect()->route('events.create')->with('success', 'Event is successfully added!');
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
