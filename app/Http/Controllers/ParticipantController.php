<?php

namespace App\Http\Controllers;

use App\Imports\ParticipantsImport;
use Illuminate\Http\Request;
use DB;
use App\Models\Participant;
use App\Helpers\Helper;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Batche;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ParticipantController extends Controller
{
    public function index()
    {
        //
        $attBatchEvent = Batche::with('events', 'participants', 'creator', 'editor', 'destroyer')->latest()->get();
        $participants = Participant::with('creator', 'editor', 'destroyer')->latest()->get();

        return view('participants.index', compact('participants', 'attBatchEvent'));
    }


//    public function create()
//    {
//        //
//        return view('participants.create');
//    }

    public function store(Request $request)
    {
        if ($request->has('file')) {
            $request->validate([
                'file' => 'required'
            ]);

            $file = $request->file('file')->store('public/import');
            $import = new ParticipantsImport;
            $import->import($file);

            if ($import->failures()->isNotEmpty()) {
                return back()->withFailures($import->failures());
            }

            Alert::success('Success', 'Participants Created Successfully');
            return back();

        }

        if ($request->has('modal')) {
            $id             = $request->pid;
            $f_name         = $request->f_name;
            $l_name         = $request->l_name;
            $gender        = $request->gender;
            $p_email         = $request->p_email;
            $profession         = $request->profession;
            $org         = $request->org;
            $workloc    = $request->workloc;
            $district         = $request->district;
            $region         = $request->region;
            $tel         = $request->tel;
            $phone         = $request->phone;

            $generator = Helper::IDGenerator(new Participant, 'rec_id', 'REACH', 5);
            $participant      = Participant::firstOrNew(['pid'=>$id]); //if name = name in database exist

            $participant->rec_id         = $generator;
            $participant->f_name          = $f_name;
            $participant->l_name          = $l_name;
            $participant->gender          = $gender;
            $participant->p_email         = $p_email;
            $participant->profession           = $profession;
            $participant->org       = $org;
            $participant->workloc       = $workloc;

            $participant->district         = $district;
            $participant->region          = $region;
            $participant->tel = $tel;
            $participant->phone  = $phone;
            $participant->save();

//            return redirect()->route('participants.index')->with('success', 'Participant is successfully added!');
            Alert::success('Success', 'Participants Created Successfully');
            return back();
        }

    }
    /**
     * download file
     *
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Auth\Access\Response
     */
      public function download(Request $request)
    {
//        $print = public_path();
//        dd($print);
        $file = public_path(). "/attachments/participants/participants-list.xlsx";

        $headers = ['Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

        if (file_exists($file)) {

            return \Response::download($file, 'participants-list.xlsx', $headers);

        } else {
            Alert::toast('File Does Not Exit', 'error');
        }
    }


//?php
//namespace App\Http\Controllers;
//    use Exception;
//    use Illuminate\Http\Request;
//    use Illuminate\Support\Facades\Log;
//    use Illuminate\Support\Facades\Storage;
//    use League\CommonMark\Inline\Element\Strong;
//class AttachmentController extends Controller
//{
//    /**
//     * Retrieve file from storage
//     * @param string $attachment_name
//     * @return mixed
//     */
//    public function getFile($path, $attachment_name) {
//
//        if(Storage::disk('local')->exists("attachments/$path/$attachment_name")) {
//
//            $absolutePath = Storage::disk('local')->path("attachments/$path/$attachment_name");
//            $content = file_get_contents($absolutePath);
//            ob_end_clean();
//            return response($content)->withHeaders(['Content-Type' => mime_content_type($absolutePath)]);
//        }
//        return redirect('/404');
//    }
//}



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
        $participant->profession = $request->profession;
        $participant->org = $request->org;
        $participant->workloc = $request->workloc;
        $participant->district = $request->district;
        $participant->region = $request->region;
        $participant->tel = $request->tel;
        $participant->phone = $request->phone;
        $participant->save();

        Alert::success('Success', 'Participants Updated Successfully');
        return redirect()->route('participants.index', $participant);

//        return redirect()->route('participants.index', $participant)->with('update', 'Data is successfully updated!');
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
        Alert::warning('Success', 'Participants Deleted Successfully');
        return redirect()->back();

    }
//    public function import(Request $request)
//    {
//
//    }
}
