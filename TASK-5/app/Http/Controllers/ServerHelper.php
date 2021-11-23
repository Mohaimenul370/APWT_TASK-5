<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Custom\RouterApi;
use App\Models\ServerAccess;
use App\Models\Server;

class ServerHelper
{
    public static function mergeServerInfo($userId,$functionName)
    {
        $finalData = array();
        $serverAccess = ServerAccess::where('userId', $userId)->get();
        foreach ($serverAccess as $access)
        {
            $server = Server::find($access->serverId);
            if($server->isActive!=1){continue; }// if server not active then not execute next code
            $router = new RouterApi($server->ip,$server->port, $server->username, $server->password);
            $dataTemps = $router->{$functionName}();
           foreach($dataTemps as $key => $dataTemp){
                $dataTemps[$key]['serverName'] = $server->name;
                $dataTemps[$key]['serverId'] = $server->id;
           }
            $finalData = array_merge($finalData,$dataTemps); 
        }
        return $finalData;
    }
}
