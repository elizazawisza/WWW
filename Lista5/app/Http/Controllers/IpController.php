<?php


namespace App\Http\Controllers;


use App\Comment;
use App\IPAdress;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class IpController
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     *
     */
    public function store(Request $request)
    {
        $userIp = $request->ip();
        $ipLast = IPAdress::where('ip_address', $userIp)->orderBy('created_at', 'desc')->first();
        try{
            $ipValidTime = strtotime($ipLast->valid_time);
            $now = new DateTime();
            $now = strtotime($now->format('Y-m-d H:i:s'));
            if ($ipValidTime < $now) {
                $date = new DateTime('+1day');
                $validTime = $date->format('Y-m-d H:i:s');
                $ipAddress = new IPAdress();
                $ipAddress->ip_address = $userIp;
                $ipAddress->valid_time = $validTime;
                $ipAddress->save();
            }
        }catch(\Exception $e){
            $date = new DateTime('+1day');
            $validTime = $date->format('Y-m-d H:i:s');
            $ipAddress = new IPAdress();
            $ipAddress->ip_address = $userIp;
            $ipAddress->valid_time = $validTime;

            $ipAddress->save();
        }
    }

    public function getVisitorsAmount(){
        $visitors = IPAdress::count();
        return response()->json(['visitors' => $visitors]);
    }
}