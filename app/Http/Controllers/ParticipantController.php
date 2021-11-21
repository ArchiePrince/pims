<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Participant;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Batche;
use App\Models\Event;
use App\Models\Attendance;

class ParticipantController extends Controller
{

    public function index()
    {
        //
        $attBatchEvent = Batche::with('event', 'participants', 'creator', 'editor', 'destroyer')->get();
        $attendances = Attendance::with('participant', 'batch', 'creator', 'editor', 'destroyer')->get();
        $participants = Participant::orderBy('pid', 'DESC')->get();

        return view('participants.index', compact('participants', 'attBatchEvent', 'attendances'));
    }

 
    public function create()
    {
        //
        return view('participants.create');
    }

    public function store(Request $request)
    {
        $id             = $request->pid;
        $f_name         = $request->f_name;
        $l_name         = $request->l_name;
        $gender        = $request->gender;
        $p_email         = $request->p_email;
        $prfssn         = $request->prfssn;
        $org         = $request->org;
        $distr         = $request->distr;
        $rgn         = $request->rgn;
        $tel         = $request->tel;
        $phone         = $request->phone;

        $generator = Helper::IDGenerator(new Participant, 'rec_id', 'REACH', 5);
        $participant      = Participant::firstOrNew(['pid'=>$id]); //if name = name in database exist

           $participant->rec_id         = $generator;
            $participant->f_name          = $f_name;
            $participant->l_name          = $l_name;
            $participant->gender          = $gender;
            $participant->p_email         = $p_email;
            $participant->prfssn           = $prfssn;
            $participant->org       = $org;
            $participant->distr         = $distr;
            $participant->rgn          = $rgn;
            $participant->tel = $tel;
            $participant->phone  = $phone;
            $participant->save();
       return redirect()->route('participants.create')->with('success', 'Participant is successfully added!');
    }

      public function show($id)
    {
        //
        
    }
    
    public function edit(Participant $participant)
    {
        //
       return view('participants.edit', compact('participant'));    
    }


    public function update(Request $request, Participant $participant)
    {
        $participant->f_name = $request->f_name;
        $participant->l_name = $request->l_name;
        $participant->gender = $request->gender;
        $participant->p_email = $request->p_email;
        $participant->prfssn = $request->prfssn;
        $participant->org = $request->org;
        $participant->distr = $request->distr;
        $participant->rgn = $request->rgn;
        $participant->tel = $request->tel;
        $participant->phone = $request->phone;
        $participant->save();

        return redirect()->route('participants.edit', $participant)->with('update', 'Data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
        $participant->delete();
        return redirect()->back()->with('del', 'Data deleted successfully!');

    }

    public function deleteCheckedParticipants(Request $request)
    {
        $ids = $request->ids;
        Participant::whereIn('pid',$ids)->delete();
        return response()->json(['delSel'=> "Participants have been deleted!"]);
    }
}
