<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;





class UserController extends Controller
{
   
    public function __construct()
    {
       $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('pages.user')->with('servers',User::all());
    }


    public function dash()
    {
        
        return view('pages.dashboard');
    }



    public function edit()
    {
        
        return view('pages.user.user-edit')->with('data',User::find(auth()->user()->id));
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
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phoneNo' => 'required|min:11',
            'balance' => 'required',
            'commission' => 'required',
        ]);



        $user = User::find(auth()->user()->id);
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
            return redirect()->route('user.profile')->with("success","User {$request->name} update successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $var = User::where('id', $id)->first();
        $name = $var->name;
        $var->delete();
        return redirect()->back()->with("error","User {$name} Successfully Deleted");
    }
}
