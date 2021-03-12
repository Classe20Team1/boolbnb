<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use App\User;
use App\Position;
use App\UserInfo;
use App\File;
use App\Img;
use App\SponsorType;
use App\Sponsor;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SponsorController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($apartment)
    {
        //$apartment = Apartment::find($apart_id);
        $sponsortypes = SponsorType::all();
        dd($apartment);
        return view('sponsor', compact('apartment', 'sponsortypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->all();
        $apartment = Apartment::find($request->apartment_id);
        $sponsortype = SponsorType::find($request->sponsortype_id);
        $date = Carbon::now();
        $today = $date->format('Y-m-d H:i:s');
        $expire = $date->addDays($sponsortype->days)->format('Y-m-d H:i:s');

        Sponsor::create([
            'apartment_id' => $apartment->id,
            'type_id' => $sponsortype->id,
            'date_start' => $today,
            'date_end' => $expire,
        ]);
        return view('apartments.index', compact('apartments'));
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
