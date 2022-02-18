<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
                //SELECT * FROM user;
                $users = User::all();
                $departments = Department::with('user')->get();

                return view('users.index', compact('users', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::with('user')->get();
        return view('users.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $batches = Batche::with('events')->get();
//        $validator = Validator::make($request->all(), [
//            'eid' => 'required',
//            'b_title' => 'required',
//            'start' => 'required',
//            'end' => 'required',
//            'location' => 'required',
//            'allDay' => 'required',
//            'color' => 'required',
//            'textColor' => 'required',
//            'description' => 'required',
//        ]);
//
//        if ($validator->failed()){
//            Alert::error('Error!', $validator->messages()->first());
//            return redirect()->route('events.create');
//        } else {
//            Batche::create($request->all());
//            Alert::success('Success', 'Event Created Successfully');
//            return redirect()->route('events.create');
//        }
        User::create($request->all());
//        $uid = $request->uid;
//        $user = User::firstOrNew(['uid'=>$uid]);
//           $user->name = $request->name;
//            $user->username = $request->username;
//            $user->email = $request->email;
//            $user->password = Hash::make($request->password);
//            $user->department()->did = $request->did;
//            $user->save();
       return redirect()->route('users.create')->with('success', 'User is successfully added!');
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
