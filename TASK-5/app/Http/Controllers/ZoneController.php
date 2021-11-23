<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;

class ZoneController extends Controller
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
    public function index()
    {
        return view('pages.service-zone')->with('servicezone',Zone::all());
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
        $validateddata = $request->validate([
            'name' => 'required|min:2|max:100',
   
        ]);


        $p = new Zone();
        $p->name = $request->name;      

        if($p->save()) {
            return redirect()->route('zone.index')->with("success","Server {$request->name} Successfully Added");
        }
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
        $var = Zone::where('id', $id)->first();
        return view('pages.service-zone-edit')->with('data', $var);
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
       // $validator = Validator::make([], []);

        $vadiddata=$request->validate([
            'name' => 'required|min:2|max:100',
           
        ]);


        $var = Zone::find($id);
        $var->name = $request->name;
       
        if($var->save()) {
            return redirect()->route('zone.index')->with("success","Zone {$request->name} Successfully Updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $var = Zone::where('id', $id)->first();
        $name = $var->name;
        $var->delete();
        return redirect()->back()->with("error","Zone {$name} Successfully Deleted");
    }
}
