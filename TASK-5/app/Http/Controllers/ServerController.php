<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Server;


use App\Http\Controllers\ServerHelper;


class ServerController extends Controller
{
    private $userId = 5;

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
        
        return view('pages.server-mikrotik')->with('servers',Server::all());
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
        $validator = Validator::make([], []);

        $request->validate([
            'name' => 'required|min:2|max:100',
            'ip' => 'required|min:7|max:15',
            'port' => 'required|min:2|max:5',
            'username' => 'required|min:1|max:100',
            'password' => 'required|min:1|max:100',
        ]);


        $server = new Server();
        $server->companyId = 20;
        $server->isActive = 1;
        $server->name = $request->name;
        $server->ip = $request->ip;
        $server->port = $request->port;
        $server->dnsName = $request->dnsName;
        $server->username = $request->username;
        $server->password = $request->password;

        if($server->save()) {
            return redirect()->route('server.index')->with("success","Server {$request->name} Successfully Added");
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
        $var = Server::where('id', $id)->first();
        return view('pages.server-mikrotik-edit')->with('data', $var);
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
        $validator = Validator::make([], []);

        $request->validate([
            'name' => 'required|min:2|max:100',
            'ip' => 'required|min:7|max:15',
            'port' => 'required|min:2|max:5',
            'username' => 'required|min:1|max:100',
            'password' => 'required|min:1|max:100',
        ]);


        $server = Server::find($id);
        $server->name = $request->name;
        $server->ip = $request->ip;
        $server->port = $request->port;
        $server->dnsName = $request->dnsName;
        $server->username = $request->username;
        $server->password = $request->password;

        if($server->save()) {
            return redirect()->route('server.index')->withSuccess(['Server Successfully added']);
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
        $var = Server::where('id', $id)->first();
        $name = $var->name;
        $var->delete();
        return redirect()->back()->with("error","Server {$name} Successfully Deleted");
    }
}
