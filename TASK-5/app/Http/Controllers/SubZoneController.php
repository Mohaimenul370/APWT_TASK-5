<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subzone;
use App\Models\Zone;

class SubzoneController extends Controller
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
        return view('pages.service-sub-zone')->with('subzone',Subzone::all())->with('zones',Zone::all());
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
            'zoneId' => 'required',
   
        ]);


        $p = new Subzone();
        $p->zoneId = $request->zoneId;
        $p->name = $request->name;      

        if($p->save()) {
            return redirect()->route('sub-zone.index')->with("success","Service Sub Zone {$request->name} Successfully Added");
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
        $var = Subzone::where('id', $id)->first();
        return view('pages.service-sub-zone-edit')->with('data', $var);
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
        $vadiddata=$request->validate([
            'name' => 'required|min:2|max:100',
           
        ]);


        $var = Subzone::find($id);
        $var->name = $request->name;
       
        if($var->save()) {
            return redirect()->route('sub-zone.index')->with("success","Sub Zone {$request->name} Successfully Updated");
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
        $var = Subzone::where('id', $id)->first();
        $name = $var->name;
        $var->delete();
        return redirect()->back()->with("error"," Sub Zone {$name} Successfully Deleted");
    }
}
