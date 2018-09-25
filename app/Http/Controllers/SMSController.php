<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Nexmo\Client\Exception\Exception;
use Nexmo\Client\Exception\Server;

class SMSController extends Controller
{
    const NEXMO_API_KEY = "2847817d";
    const NEXMO_API_SECRET = "vtXkaUPQ7ORiLCUj";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function smsGateway(){
        $basic  = new \Nexmo\Client\Credentials\Basic(self::NEXMO_API_KEY, self::NEXMO_API_SECRET);
        $client = new \Nexmo\Client($basic);
        try {
            $message = $client->message()->send([
                'to'   => "628884841479",
                'from'   => "Mehisa",
                'text'   => "Hello Bro Test"
            ]);
            dd($message);
        } catch (\Nexmo\Client\Exception\Request $e) {
            dd($e);
        } catch (Server $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
