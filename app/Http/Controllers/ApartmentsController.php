<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use App\User;
use App\Position;
Use App\UserInfo;
use App\File;
use App\Img;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Resources\ApartmentResource;

class ApartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'index', 'show', 'search'
            ]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apartments = Apartment::all();

        return view('apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $user = Auth::user();

        return view('apartments.create', compact('services', 'user'));
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
        $user = Auth::user();
        $newApartment = new Apartment;

        $newApartment->title = $data['title'];
        $newApartment->user_id = $user->id;
        $newApartment->description = $data['description'];
        $newApartment->rooms = $data['rooms'];
        $newApartment->beds = $data['beds'];
        $newApartment->bathrooms = $data['bathrooms'];
        $newApartment->metri_quadrati = $data['metri_quadrati'];
        $newApartment->active = true;
        $newApartment->views_count = 0;
        $newApartment->price = $data['price'];
        $newApartment->cover_img = $request->file('cover')->store('covers');
        $newApartment->save(); //salva

        $files = $newApartment->imgs; //salvo il file in variabile
        $arrayImgApartment = $request->file('image'); // prendo il file

        if($request->hasFile('image'))
        { //ciclo per salvarlo
            foreach ($arrayImgApartment as $file) {
                $newImg = new Img; // collego la varibile alla tabella img
                $name = Str::random(25); // creo nome random di 25 caratteri
                $file->move(public_path().'/images/', $name);  //salva l'img nella cartella di destinazione
                $newImg->path = 'images/' . $name;  //aggiungo path
                $newImg->apartment_id = $newApartment->id; // aggangio all'appartamento tramite id
                $newImg->save();             // salvo tutto
            }

        }

        return redirect()->route('apartments.index');

        // $newApartment->services()->attach($data['services']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        $user = Auth::user();
        if($user){
            if ($apartment->user->id == Auth::user()->id){
                // ritorno la view del user admin del proprio apartment
                return view('admin.show', compact('apartment', 'user'));
            } else {
                return view('apartments.show', compact('apartment', 'user'));
            }
        } else {
            return view('apartments.show', compact('apartment'));
        }

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

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $elimina = Apartment::find($id);// prendo appartmento per ID
        
        $elimina->position()->delete(); //prendo la posizioneo 
        
        $elimina->messages()->delete();// prendo i messaggi
        $elimina->imgs()->delete(); //prendo le immagini 
        
        $spon = $elimina->sponsors; //prendo solo i sponsor inerenti a questo id
        foreach($spon as $sponsors){
            $elimina->sponsors()->detach($sponsors->id);
        }

        $serv = $elimina->services; //prendo solo i servizi inerenti a questo id
        foreach($serv as $services){
            $elimina->servicess()->detach($services->id);
        }
       
        //dd($elimina);

        $elimina->delete();
        
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $usersearch = $request->city;
        $response = file_get_contents('https://api.tomtom.com/search/2/geocode/'. $usersearch .'.json?limit=1&key=' . env('TOMTOM_KEY'));

        $response = json_decode($response, true);
        $positionSearched = [
            'latit' => $response['results'][0]['position']['lat'],
            'longit' => $response['results'][0]['position']['lon'],
        ];
        $radius = 10;

        $filtered = Position::radius($positionSearched['latit'], $positionSearched['longit'],$radius);
        $arrayId= [];
        foreach ($filtered as $position){
            array_push($arrayId, $position->apartment_id);
        }

        
        $services = Service::all();
        $apartments = Apartment::with('services', 'position', 'imgs')
            ->find($arrayId)
            ->where('beds', '>=', $request->guests)
            ->where('active', '=', 1);
            
        $data = json_encode($usersearch);
        $guests = json_encode($request->guests);
        return view('search', compact('apartments', 'services','data','guests'));
    }
}
