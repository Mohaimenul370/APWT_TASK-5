<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServerWatchDog;
use Illuminate\Support\Facades\DB;

class ServerWatchDogController extends Controller
{
    
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function show(){
        return view('pages.server-watch-dog');
    }
    

    public function store(Request $request)
    {

        $validateddata = $request->validate([
            'companyId' => 'required',
            'name' => 'required|min:2|max:100',
            'ip' => 'required|min:10|max:20',
            'port' => 'required',
            'status' => 'required',
            'macAddress' => 'required',
            'type' => 'required',
   
        ]);


        $p = new ServerWatchDog();
        $p->name = $request->name;
        $p->companyId = $request->companyId;
        $p->ip = $request->ip;
        $p->port = $request->port;
        $p->status = $request->status;
        $p->macAddress = $request->macAddress;
        $p->type = $request->type;
        $p->isActive = $request->isActive ;

        if($p->save()) {
            return redirect()->route('watchdog.index')->with('success','Successfully added');
        }
    }
    public function list()
    {
        $s = ServerWatchDog::all();
        return view('pages.server-watch-dog')->with('servers', $s);
    }

    public function delete($id){
        $server = ServerWatchDog::where('id',$id)->first();
        $server->delete();
        return redirect()->route('watchdog.index')->with('success','Deleted Successfully');
    //    return view('pages.server-watch-dog')->with('msg','Deleted Successfully');
    }

    public function edit(Request $req){
        //
        $id = $req->id;

        $server = ServerWatchDog::where('id',$id)->first();

        return view('pages.server-watch-dog-edit')->with('server', $server);

    }

    public function update(Request $request){


        $server = ServerWatchDog::where('id',$request->id)->first();
        

        $server->name = $request->name;
        $server->companyId = $request->companyId;
        $server->ip = $request->ip;
        $server->port = $request->port;
        $server->status = $request->status;
        $server->macAddress = $request->macAddress;
        $server->type = $request->type;
        $server->isActive = $request->isActive ;
        $server->save();
        
        return redirect()->route('watchdog.index')->with('success','Update Successfully');
        
    }
    public function view(Request $request)
    {
        $server = ServerWatchDog::where('id', $request->id)->first();


        return view('pages.server-watch-dog-view')->with('server', $server);
      
    }

}
