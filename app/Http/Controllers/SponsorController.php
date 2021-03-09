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
    public function create(Apartment $apartment)
    {
        $sponsortypes = SponsorType::all();
        return view('apartments.sponsor', compact('apartment', 'sponsortypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apartment)
    {
        $data = $request->all();
        $sponsortype = SponsorType::find($data['sponsortype']);
        $user = Auth::user();
        $apartments = $user->apartments;
        $date = Carbon::now();
        Sponsor::create([
            'apartment_id' => $apartment->id,
            'type_id' => $sponsortype->id,
            'date_start' => $date,
            'date_end' => $date->addDays($sponsortype->days),
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



    