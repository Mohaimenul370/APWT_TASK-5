<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\RouterApi;
use App\Custom\Format;
use App\Models\ServerAccess;
use App\Models\Server;

use Illuminate\Support\Facades\Auth;
class RouterController extends Controller
{



    private $userId=5;


    public function __construct()
    {
       $this->middleware('auth');
      //$this->userId = Auth::id();
    }

    public function hotspotLog()
    {
        $datasets = ServerHelper::mergeServerInfo($this->userId, 'getHotSpotLog');


        foreach ($datasets as $key => $dataset) {
            $dataExtract = explode(" ", $dataset['message']);
            if (substr($dataset['message'], 0, 2) == "->") {
                $datasets[$key]['user'] = $dataExtract[1];
                $datasets[$key]['ip'] = substr($dataExtract[2], 1, stripos($dataExtract[2], '):') - 1);
                $datasets[$key]['log'] = substr($dataset['message'], stripos($dataset['message'], '):') + 3);
            } else {
                unset($datasets[$key]);
            }
        }

        
        return view('pages.hotspot-log')->with('datasets', $datasets);
    }


    public function hotspotUsers()
    {
        $this->userId = Auth::id();

        $datasets = ServerHelper::mergeServerInfo($this->userId, 'getHotSpotUsers');

        foreach ($datasets as $key => $dataset) {
            $datasets[$key]['clientName'] = '-';
            $datasets[$key]['bytes-in'] = Format::bytes($dataset['bytes-in'], 2);
            $datasets[$key]['bytes-out'] = Format::bytes($dataset['bytes-out'], 2);
            $datasets[$key]['uptime'] = Format::dtm($dataset['uptime']);
            //$datasets[$key]['mac-address'] = '-';
        }

        return view('pages.hotspot-users')->with('datasets', $datasets);
    }

    public function hotspotActiveUsers()
    {
        $datasets = ServerHelper::mergeServerInfo($this->userId, 'getHotSpotEnabledUsers');

        foreach ($datasets as $key => $dataset) {
            $datasets[$key]['clientName'] = '-';
            $datasets[$key]['bytes-in'] = Format::bytes($dataset['bytes-in'], 2);
            $datasets[$key]['bytes-out'] = Format::bytes($dataset['bytes-out'], 2);
            $datasets[$key]['uptime'] = Format::dtm($dataset['uptime']);
            //$datasets[$key]['mac-address'] = '-';
        }

        return view('pages.hotspot-active-users')->with('datasets', $datasets);
    }

    public function hotspotOnlineUsers()
    {
        $datasets = ServerHelper::mergeServerInfo($this->userId, 'getHotSpotActiveUsers');

        foreach ($datasets as $key => $dataset) {
            $datasets[$key]['clientName'] = '-';
            $datasets[$key]['bytes-in'] = Format::bytes($dataset['bytes-in'], 2);
            $datasets[$key]['bytes-out'] = Format::bytes($dataset['bytes-out'], 2);
            $datasets[$key]['uptime'] = Format::dtm($dataset['uptime']);
            //$datasets[$key]['mac-address'] = '-';
        }
        return view('pages.hotspot-online-users')->with('datasets', $datasets);
    }

    public function hotspotOnlineUsersRemove($serverId,$userId)
    {
        $server = Server::find($serverId);
        $router = new RouterApi($server->ip,$server->port, $server->username, $server->password);
        $router->removeHotSpotUserFromActive($userId);
        return redirect()->back();
    }

    public function hotspotProfiles()
    {
        $datasets = ServerHelper::mergeServerInfo($this->userId, 'getHotSpotProfiles');
        foreach ($datasets as $key => $dataset) {
            $datasets[$key]['rate-limit'] = $datasets[$key]['rate-limit'] ?? 'Unlimited';
            $datasets[$key]['price'] = substr($dataset['name'], 0, strpos($dataset['name'], "Tk"));
            $datasets[$key]['validity'] =substr($dataset['name'], strpos($dataset['name'], "Mb") + 2, strpos($dataset['name'], "Day") - strpos($dataset['name'], "Mb") - 2);
            if (!is_numeric($datasets[$key]['price'])) { $datasets[$key]['price'] = $datasets[$key]['validity'] = 0;}
        }
        return view('pages.hotspot-profiles')->with('datasets', $datasets);
    }

    public function hotspotProfilesRemove($serverId,$packageName)
    {
        $server = Server::find($serverId);
        if($server==null){
            return redirect()->back()->with("error","Something went wrong");
        }
        $router = new RouterApi($server->ip,$server->port, $server->username, $server->password);
        $router->removeHotSpotProfiles($packageName);
        return redirect()->back()->with("success","Profile {$packageName} Remove Successfully");;
    }


    public function hotspotMacLog()
    {
        $datasets = ServerHelper::mergeServerInfo($this->userId, 'getHotSpotUserMacLog');
        return view('pages.hotspot-log-mac')->with('datasets', $datasets);
    }


    public function hotspotChangeLog()
    {
        $datasets = ServerHelper::mergeServerInfo($this->userId, 'getHotSpotUserChangeLog');
        return view('pages.hotspot-log-userchange')->with('datasets', $datasets);
    }


    public function dhcpLeases()
    {
        $datasets = ServerHelper::mergeServerInfo($this->userId, 'dhcpServerLease');
        return view('pages.dhcp-leases')->with('datasets', $datasets);
    }


    public function pppoeProfiles()
    {
        $datasets = ServerHelper::mergeServerInfo($this->userId, 'getPPPoEProfiles');
        foreach ($datasets as $key => $dataset) {
            $datasets[$key]['rate-limit'] = $datasets[$key]['rate-limit'] ?? 'Unlimited';
            $datasets[$key]['price'] = substr($dataset['name'], 0, strpos($dataset['name'], "Tk"));
            $datasets[$key]['validity'] =substr($dataset['name'], strpos($dataset['name'], "Mb") + 2, strpos($dataset['name'], "Day") - strpos($dataset['name'], "Mb") - 2);
            if (!is_numeric($datasets[$key]['price'])) { $datasets[$key]['price'] = $datasets[$key]['validity'] = 0;}
        }
        return view('pages.pppoe-profiles')->with('datasets', $datasets);
    }

    public function pppoeProfilesRemove($serverId,$packageName)
    {
        $server = Server::find($serverId);
        if($server==null){
            return redirect()->back()->with("error","Something went wrong");
        }
        $router = new RouterApi($server->ip,$server->port, $server->username, $server->password);
        $router->removePPPoEProfiles($packageName);
        return redirect()->back()->with("success","Profile {$packageName} Remove Successfully");;
    }
}
