<?php

namespace App\Custom;

use App\Custom\RouterosAPI;

/**
 * [Description RouterApi]
 */
class RouterApi
{
    //private static $_instance = null;
    //private static $counter = 0;
    //private static $ip;
    private $routerOs;

    function __construct($ip = '192.168.88.1', $port = '8728', $username = 'admin', $password = null)
    {
        $this->routerOs = new RouterosAPI();
        $this->routerOs->debug = false;
        $ipWithPort = $ip . ':' . $port;
        $this->routerOs->connect($ipWithPort, $username, $password);
    }



    /**
     * isConnected
     *
     * @return [type]
     */
    public function isConnected()
    {
        return $this->routerOs->connected;
    }

    /**
     * comm
     *
     * @param mixed $urlCom
     * @param mixed $dataCom
     * 
     * @return [type]
     */
    public function comm($urlCom, $dataCom)
    {
        return $this->routerOs->comm($urlCom, $dataCom);
    }



    /**
     * shutDown
     *
     * @return bool
     */
    public function shutDown()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/system/shutdown");
        } else return false;
    }



    /**
     * reboot
     *
     * @return bool
     */
    public function reboot()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/system/reboot");
        } else return false;
    }







    /**
     * getHotSpotUsers
     *
     * @return [type]
     */
    public function getHotSpotUsers()
    {
        if ($this->isConnected()) {
            $data = $this->routerOs->comm("/ip/hotspot/user/print");
            return $this->removeDefaultData($data);
        } else return array();
    }


    private function removeDefaultData($arrayData)
    {
        foreach ($arrayData as $key => $data) {
            if ($data["name"] == "default-trial" || $data["name"] == "default" || $data["name"] == "default-encryption") {
                unset($arrayData[$key]);
            }
        }
        return $arrayData;
    }


    /**
     * getHotSpotUserSearch
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function getHotSpotUserSearch($clientId = null)
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/ip/hotspot/user/print", array(
                "?name" => $clientId,
            ));
        } else return array();
    }

    /**
     * getHotSpotEnabledUsers
     *
     * @return [type]
     */
    public function getHotSpotEnabledUsers()
    {
        if ($this->isConnected()) {
            $data = $this->routerOs->comm("/ip/hotspot/user/print", array(
                "?disabled" => "no",
            ));

            return $this->removeDefaultData($data);
        } else return array();
    }


    /**
     * getHotSpotDisabledUsers
     *
     * @return [type]
     */
    public function getHotSpotDisabledUsers()
    {
        if ($this->isConnected()) {
            $data = $this->routerOs->comm("/ip/hotspot/user/print", array(
                "?disabled" => "yes",
            ));
            return $this->removeDefaultData($data);
        } else return array();
    }



    /**
     * getHotSpotProfiles
     *
     * @return [type]
     */
    public function getHotSpotProfiles()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/ip/hotspot/user/profile/print");
        } else return array();
    }



    public function removeHotSpotProfiles($profileName)
    {


        if ($this->isConnected()) {
            $profile = $this->routerOs->comm("/ip/hotspot/user/profile/print", array(
                "?name" => $profileName,
            ));

            if ($profile != null) {
                $userId = $profile[0]['.id'];
                $this->routerOs->comm("/ip/hotspot/user/profile/remove", array(
                    ".id" => $userId,
                ));
                return true;
            } else return false;

        }
    }


    public function getHotSpotActiveUsers()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/ip/hotspot/active/print");
        } else return array();
    }


    /****************************************************************
     *****
    $clientData = array(
        "server" => "$server",
        "name" => "$name",
        "password" => "$password",
        "profile" => "$profile",
        "disabled" => "no",
        "limit-uptime" => "$timelimit",
        "limit-bytes-total" => "$datalimit",
        "comment" => "$comment",
      );
     **************
     ***************************************/


    /**
     * addHotSpotUser
     *
     * @param array $dataCom
     * 
     * @return [type]
     */
    public function addHotSpotUser($clientData)
    {
        if ($this->isConnected()) {
            $activeUser = $this->routerOs->comm("/ip/hotspot/user/print", array(
                "?name" => $clientData['name'],
            ));

            if ($activeUser == null) {
                if (!isset($clientData['limit-bytes-total'])) {
                    $clientData['limit-bytes-total'] = 0;
                }
                if (!isset($clientData['limit-uptime'])) {
                    $clientData['limit-uptime'] = 0;
                }
                if (!isset($clientData['server'])) {
                    $clientData['server'] = 'all';
                }
                $this->routerOs->comm("/ip/hotspot/user/add", $clientData);
                return true;
            } else return false;
        } else return false;
    }



    public function updateHotSpotUser($clientId, $password, $package, $comment = null, $disabled = 'no')
    {

        if ($this->isConnected()) {
            $user = $this->routerOs->comm("/ip/hotspot/user/print", array(
                "?name" => $clientId,
            ));

            if ($comment == null) {
                $comment = $user[0]['comment'];
            }

            if ($user != null) {
                $this->routerOs->comm("/ip/hotspot/user/set", array(
                    ".id" => $user[0]['.id'],
                    /* "server" => 'all',
                    "name" => $user[0]['name'],*/
                    "profile" => $package,
                    "password" => $password,
                    "mac-address" => "00:00:00:00:00:00",
                    "disabled" => $disabled,
                    "comment" => $comment,
                ));
                return true;
            } else return false;
        } else return false;
    }

    /**
     * unbindHotSpotUserMac
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function unbindHotSpotUserMac($clientId = null)
    {
        $this->removeHotSpotUserFromActive($clientId);
        $this->removeHotSpotUserFromCookies($clientId);
        if ($this->isConnected()) {
            $user = $this->routerOs->comm("/ip/hotspot/user/print", array(
                "?name" => $clientId,
            ));

            if ($user != null) {
                $this->routerOs->comm("/ip/hotspot/user/set", array(
                    ".id" => $user[0]['.id'],
                    /* "server" => 'all',
                    "name" => $user[0]['name'],
                   /* "password" => $user[0]['password'], */
                    "mac-address" => "00:00:00:00:00:00",
                    /*"disabled" => $user[0]['disabled'],*/
                ));
                return true;
            } else return false;
        } else return false;
    }



    /**
     * removeHotSpotUserFromActive
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function removeHotSpotUserFromActive($clientId = null)
    {
        if ($this->isConnected()) {
            $activeUser = $this->routerOs->comm("/ip/hotspot/active/print", array(
                "?user" => $clientId,
            ));

            if ($activeUser != null) {
                $userId = $activeUser[0]['.id'];
                $this->routerOs->comm("/ip/hotspot/active/remove", array(
                    ".id" => $userId,
                ));
                return true;
            } else return false;
        } else return false;
    }

    /**
     * removeHotSpotUserFromCookies
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function removeHotSpotUserFromCookies($clientId = null)
    {
        if ($this->isConnected()) {
            $activeCookie = $this->routerOs->comm("/ip/hotspot/cookie/print", array(
                "?user" => $clientId,
            ));

            if ($activeCookie != null) {
                $cookId = $activeCookie[0]['.id'];
                $this->routerOs->comm("/ip/hotspot/cookie/remove", array(
                    ".id" => $cookId,
                ));
                return true;
            } else return false;
        } else return false;
    }

    /**
     * deleteHotSpotUser
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function deleteHotSpotUser($clientId = null)
    {
        $this->removeHotSpotUserFromActive($clientId);
        $this->removeHotSpotUserFromCookies($clientId);
        if ($this->isConnected()) {
            $this->routerOs->comm("/ip/hotspot/user/remove", array(
                ".id" => $clientId,
            ));
            return true;
        } else return false;
    }


    /**
     * disableHotSpotUser
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function disableHotSpotUser($clientId = null)
    {
        $this->removeHotSpotUserFromActive($clientId);
        $this->removeHotSpotUserFromCookies($clientId);
        if ($this->isConnected()) {
            $user = $this->routerOs->comm("/ip/hotspot/user/print", array(
                "?name" => $clientId,
            ));

            if ($user != null) {
                $userId = $user[0]['.id'];
                $this->routerOs->comm("/ip/hotspot/user/set", array(
                    ".id" => $userId,
                    "disabled" => "yes",
                ));
                return true;
            } else return false;
        } else return false;
    }


    /**
     * resetHotSpotUserCounter
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function resetHotSpotUserCounter($clientId = null)
    {
        if ($this->isConnected()) {

            $activeUser = $this->routerOs->comm("/ip/hotspot/user/print", array(
                "?name" => $clientId,
            ));
            $userId = $activeUser[0]['.id'];
            $this->routerOs->comm("/ip/hotspot/user/reset-counters", array(
                ".id" => $userId,

            ));
            return true;
        } else return false;
    }


    /**
     * enableHotSpotUser
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function enableHotSpotUser($clientId = null)
    {
        if ($this->isConnected()) {
            $activeUser = $this->routerOs->comm("/ip/hotspot/user/print", array(
                "?name" => $clientId,
            ));

            if ($activeUser != null) {
                $userId = $activeUser[0]['.id'];
                $this->routerOs->comm("/ip/hotspot/user/set", array(
                    ".id" => $userId,
                    "disabled"   => "no",

                ));
                $this->resetHotSpotUserCounter($clientId);
                return true;
            } else return false;
        } else return false;
    }

    /**
     * getInterface
     *
     * @return [type]
     */
    public function getInterface()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/interface/print");
        } else {
            return array();
        }
    }

    /**
     * getMonitorInterface
     *
     * @param null $interface
     * 
     * @return [type]
     */
    public function getMonitorInterface($interface = null)
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/interface/monitor-traffic", array(
                "interface" => $interface,
                "once" => "",
            ));
        } else {
            return array();
        }
    }

    /**
     * dhcpServerLease
     *
     * @return [type]
     */
    public function dhcpServerLease()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/ip/dhcp-server/lease/print");
        } else {
            return array();
        }
    }


    /********
     * @param
     * array("?bypassed" => "yes",)
     * array("?authorized" => "yes",)
     * 
     *
     */

    /**
     * getHotSpotHost
     *
     * @param null $where
     * 
     * @return [type]
     */
    public function getHotSpotHost($where = null)
    {
        if ($this->isConnected()) {
            if ($where == null) {
                return $this->routerOs->comm("/ip/hotspot/host/print");
            } else {
                return $this->routerOs->comm("/ip/hotspot/host/print", $where);
            }
        } else {
            return array();
        }
    }

    /**
     * getHotSpotLog
     *
     * @return array
     */
    public function getHotSpotLog()
    {
        if ($this->isConnected()) {
            $getLog1 = $this->routerOs->comm("/log/print", array(
                "?topics" => "hotspot,info,debug",

            ));

            $getLog2 = $this->routerOs->comm("/log/print", array(
                "?topics" => "hotspot,account,info,debug",

            ));

            $mergeLog = array_merge(array_reverse($getLog1), array_reverse($getLog2));
            return $mergeLog;
        } else {
            return array();
        }
    }




    /**
     * getHotSpotUserMacLog
     *
     * @return array
     */

    public function getHotSpotUserMacLog()
    {
        if ($this->isConnected()) {
            $getLog1 = $this->routerOs->comm("/log/print", array(
                "?topics" => "script,info",

            ));

            $logs = array_reverse($getLog1);
            $logResult = array();
            $validLogIndex = 0;
            foreach ($logs as $log) {
                $dataExtract = explode(" ", $log['message']);
                if ($dataExtract[0] == 'UserLogin->' && $dataExtract[6] == 'Device') {
                    $logResult[$validLogIndex] = array(
                        'time'   => $log['time'],
                        'user'   => $dataExtract[1],
                        'mac'    => $dataExtract[3],
                        'ip'     => $dataExtract[5],
                        'device' => substr($log['message'], strripos($log['message'], 'Device') + 7),
                    );
                    $validLogIndex++;
                }
            }
            return $logResult;
        } else {
            return array();
        }
    }


    /**
     * getHotSpotUserMacLogForStore
     *
     * @return [type]
     */
    public function getHotSpotUserMacLogForStore()
    {
        if ($this->isConnected()) {
            $getLog1 = $this->routerOs->comm("/log/print", array(
                "?topics" => "script,info",

            ));

            $logs = array_reverse($getLog1);
            $logResult = array();
            $validLogIndex = 0;
            foreach ($logs as $log) {
                $dataExtract = explode(" ", $log['message']);
                if (strlen($log['time']) == 8 && $dataExtract[0] == 'UserLogin->' && $dataExtract[6] == 'Device') {
                    $logTime = $log['time'];
                    date_default_timezone_set('Asia/Dhaka');
                    $nowDate = date("Y-m-d");
                    $mergeTime = "" . $nowDate . " " . $logTime . "";
                    $newFormat = date('Y-m-d H:i:s', strtotime($mergeTime));
                    $logResult[$validLogIndex] = array(
                        'time'   => $newFormat,
                        'user'   => $dataExtract[1],
                        'mac'    => $dataExtract[3],
                        'ip'     => $dataExtract[5],
                        'device' => substr($log['message'], strripos($log['message'], 'Device') + 7),
                    );
                    $validLogIndex++;
                }
            }
            return $logResult;
        } else {
            return array();
        }
    }






    /**
     * getHotSpotUserChangeLog
     *
     * @return [type]
     */
    public function getHotSpotUserChangeLog()
    {
        if ($this->isConnected()) {
            $getLog = $this->routerOs->comm("/log/print", array(
                "?topics" => "system,info",

            ));

            $logs = array_reverse($getLog);
            $logResult = array();
            $validLogIndex = 0;
            foreach ($logs as $log) {
                $dataExtract = explode(" ", $log['message']);
                if (count($dataExtract) == 6 && $dataExtract[0] == 'hotspot' && $dataExtract[4] == 'by') {

                    if ($dataExtract[2] == 'rule') {
                        continue;
                    }

                    $logResult[$validLogIndex] = array(
                        'time'         => $log['time'],
                        'hotspot_user' => $dataExtract[2],
                        'admin_user'   => $dataExtract[5],
                        'task'         => $dataExtract[3],

                    );
                    $validLogIndex++;
                }
            }
            return $logResult;
        } else {
            return array();
        }
    }



    /**
     * getHotSpotUserChangeLogForStore
     *
     * @return [type]
     */
    public function getHotSpotUserChangeLogForStore()
    {
        if ($this->isConnected()) {
            $getLog = $this->routerOs->comm("/log/print", array(
                "?topics" => "system,info",

            ));

            $logs = array_reverse($getLog);
            $logResult = array();
            $validLogIndex = 0;
            foreach ($logs as $log) {
                $dataExtract = explode(" ", $log['message']);
                if (strlen($log['time']) == 8 && count($dataExtract) == 6 && $dataExtract[0] == 'hotspot' && $dataExtract[4] == 'by') {
                    $logTime = $log['time'];
                    date_default_timezone_set('Asia/Dhaka');
                    $nowDate = date("Y-m-d");
                    $mergeTime = "" . $nowDate . " " . $logTime . "";
                    $newFormat = date('Y-m-d H:i:s', strtotime($mergeTime));
                    if ($dataExtract[2] == 'rule') {
                        continue;
                    }
                    $logResult[$validLogIndex] = array(
                        'time'         => $newFormat,
                        'hotspot_user' => $dataExtract[2],
                        'admin_user'   => $dataExtract[5],
                        'task'         => $dataExtract[3],

                    );
                    $validLogIndex++;
                }
            }
            return $logResult;
        } else {
            return array();
        }
    }







    /**************************
     * 
     * 
     * Testing Function
     * 
     * 
     * 
     * *****************************/

    public function getTest()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/interface/monitor-traffic", array("?user" => "01751381026"));
        } else return array();
    }


    public function status()
    {
        if ($this->isConnected()) {
            echo "Connected router";
        } else {
            echo "Disconnected router";
        }
    }




    public function __destruct()
    {
        //echo "disconnect";
        $this->routerOs->disconnect();
    }



    /**
     * getPPPoEProfiles
     *
     * @return [type]
     */


    public function getPPPoEProfiles()
    {
        if ($this->isConnected()) {
            $profiles = $this->routerOs->comm("/ppp/profile/print");

            return $this->removeDefaultData($profiles);
            // foreach ($profiles as $x => $profile) {
            //     if ($profile['name'] == 'default' || $profile['name'] == 'default-encryption') {
            //         unset($profiles[$x]);
            //     }
            // }
            // return $profiles;
        } else return array();
    }


    public function removePPPoEProfiles($profileName)
    {


        if ($this->isConnected()) {
            $profile = $this->routerOs->comm("/ppp/profile/print", array(
                "?name" => $profileName,
            ));

            if ($profile != null) {
                $userId = $profile[0]['.id'];
                $this->routerOs->comm("/ppp/profile/remove", array(
                    ".id" => $userId,
                ));
                return true;
            } else return false;

        }
    }




    /****************************************************************
     *****
    $clientData = array(
        "service" => "$server",
        "name" => "$name",
        "password" => "$password",
        "profile" => "$profile",
        "disabled" => "no",
        "limit-bytes-in" => "$timelimit",
        "limit-bytes-out" => "$datalimit",
        "comment" => "$comment",
      );
     **************
     ***************************************/


    /**
     * addHotSpotUser
     *
     * @param array $dataCom
     * 
     * @return [type]
     */
    public function addPPPoEUser($clientData)
    {
        if ($this->isConnected()) {
            $activeUser = $this->routerOs->comm("/ppp/active/print", array(
                "?name" => $clientData['name'],
            ));

            if ($activeUser == null) {
                if (!isset($clientData['limit-bytes-in'])) {
                    $clientData['limit-bytes-in'] = 0;
                }
                if (!isset($clientData['limit-bytes-out'])) {
                    $clientData['limit-bytes-out'] = 0;
                }
                if (!isset($clientData['service'])) {
                    $clientData['service'] = 'pppoe';
                }
                $this->routerOs->comm("/ppp/secret/add", $clientData);
                return true;
            } else return false;
        } else return false;
    }




    public function updatePPPoEUser($clientId, $password, $package, $comment = null, $disabled = 'no')
    {

        if ($this->isConnected()) {
            $user = $this->routerOs->comm("/ppp/secret/print", array(
                "?name" => $clientId,
            ));

            if ($comment == null) {
                $comment = $user[0]['comment'];
            }

            if ($user != null) {
                $this->routerOs->comm("/ppp/secret/set", array(
                    ".id" => $user[0]['.id'],
                    /* "server" => 'all',*/
                    "name" => $clientId,
                    "profile" => $package,
                    "password" => $password,
                    "disabled" => $disabled,
                    "comment" => $comment,
                ));
                return true;
            } else return false;
        } else return false;
    }





    /**
     * getPPPoEUserSearch
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function getPPPoEUserSearch($clientId = null)
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/ppp/secret/print", array(
                "?name" => $clientId,
            ));
        } else return array();
    }



    /**
     * getHotSpotEnabledUsers
     *
     * @return [type]
     */
    public function getPPPoEUsers()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/ppp/secret/print");
        } else return array();
    }



    /**
     * getHotSpotEnabledUsers
     *
     * @return [type]
     */
    public function getPPPoEEnabledUsers()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/ppp/secret/print", array(
                "?disabled" => "no",
            ));
        } else return array();
    }


    /**
     * getHotSpotDisabledUsers
     *
     * @return [type]
     */
    public function getPPPoEDisabledUsers()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/ppp/secret/print", array(
                "?disabled" => "yes",
            ));
        } else return array();
    }



    /**
     * removeHotSpotUserFromActive
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function removePPPoEUserFromActive($clientId = null)
    {
        if ($this->isConnected()) {
            $activeUser = $this->routerOs->comm("/ppp/active/print", array(
                "?name" => $clientId,
            ));

            if ($activeUser != null) {
                $userId = $activeUser[0]['.id'];
                $this->routerOs->comm("/ppp/active/remove", array(
                    ".id" => $userId,
                ));
                return true;
            } else return false;
        } else return false;
    }



    /**
     * deleteHotSpotUser
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function deletePPPoEUser($clientId = null)
    {
        $this->removePPPoEUserFromActive($clientId);
        //$this->removeHotSpotUserFromCookies($clientId);
        if ($this->isConnected()) {
            $this->routerOs->comm("/ppp/secret/remove", array(
                ".id" => $clientId,
            ));
            return true;
        } else return false;
    }






    /**
     * enableHotSpotUser
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function enablePPPoEUser($clientId = null)
    {
        if ($this->isConnected()) {
            $activeUser = $this->routerOs->comm("/ppp/secret/print", array(
                "?name" => $clientId,
            ));

            if ($activeUser != null) {
                $userId = $activeUser[0]['.id'];
                $this->routerOs->comm("/ppp/secret/set", array(
                    ".id" => $userId,
                    "disabled"   => "no",

                ));
                //$this->resetHotSpotUserCounter($clientId);
                return true;
            } else return false;
        } else return false;
    }


    /**
     * disableHotSpotUser
     *
     * @param null $clientId
     * 
     * @return [type]
     */
    public function disablePPPoEUser($clientId = null)
    {
        $this->removePPPoEUserFromActive($clientId);
        //$this->removeHotSpotUserFromCookies($clientId);
        if ($this->isConnected()) {
            $user = $this->routerOs->comm("/ppp/secret/print", array(
                "?name" => $clientId,
            ));

            if ($user != null) {
                $userId = $user[0]['.id'];
                $this->routerOs->comm("/ppp/secret/set", array(
                    ".id" => $userId,
                    "disabled" => "yes",
                ));
                return true;
            } else return false;
        } else return false;
    }


    /**
     * getHotSpotActiveUsers
     *
     * @return [type]
     */
    public function getPPPoEActiveUsers()
    {
        if ($this->isConnected()) {
            return $this->routerOs->comm("/ppp/active/print");
        } else return array();
    }




    public function bindPPPoEUserMac($clientId = null)
    {
        if ($this->isConnected()) {
            $user = $this->routerOs->comm("/ppp/secret/print", array(
                "?name" => $clientId,
            ));

            if ($user != null) {
                $this->routerOs->comm("/ppp/secret/set", array(
                    ".id" => $user[0]['.id'],
                    "caller-id" => $user[0]['last-caller-id'],
                ));
                return true;
            } else return false;
        } else return false;
    }

    public function unbindPPPoEUserMac($clientId = null)
    {
        if ($this->isConnected()) {
            $user = $this->routerOs->comm("/ppp/secret/print", array(
                "?name" => $clientId,
            ));

            if ($user != null) {
                $this->routerOs->comm("/ppp/secret/set", array(
                    ".id" => $user[0]['.id'],
                    "caller-id" => "",
                ));
                return true;
            } else return false;
        } else return false;
    }


    /**
     * 
	 
	* "action" => 'dst-nat',
	*"chain" => "dstnat",
	*"protocol" => 'tcp',
	*"dst-port" => '2072',						
	*"to-addresses" => "10.9.0.72",
	*"to-ports" => "80",
	*"comment" => "shahed",
     *
     * @return [type]
     */




    public function addIpFirewallNat($data)
    {
        if ($this->isConnected()) {
            $this->routerOs->comm("/ip/firewall/nat/add", $data);
            return true;
        } else return false;
    }
}
