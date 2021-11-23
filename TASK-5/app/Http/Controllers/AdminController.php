<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Check authentication
        $this->middleware('isAdmin'); // Check if admin is authenticated
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userlist()
    {
        return View('pages.admin.users')->with('users',User::all());
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
    public function show($userId)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
        $var = User::where('id', $userId)->first();
        return view('pages.admin.user-edit')->with('data', $var);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phoneNo' => 'required|min:11',
            'balance' => 'required',
            'commission' => 'required',
        ]);



        $user = User::find($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNo = $request->phoneNo;
        $user->balance = $request->balance;
        $user->commission = $request->commission;


        if($request->password != null)
        {
            $user->password = bcrypt($request->password);
        }




        if($user->save()) {
            return redirect()->route('admin.user.index')->with("success","User {$request->name} update successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        $var = User::where('id', $userId)->first();
        $name = $var->name;
        $var->delete();
        return redirect()->back()->with("error","User {$name} Successfully Deleted");
    }
}
