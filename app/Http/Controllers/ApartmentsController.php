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
use App\Sponsor;
use Illuminate\Support\Facades\Http;
use App\SponsorType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function GuzzleHttp\json_encode;

class ApartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'show', 'search'
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
        $user = Auth::user();
        $apartments = $user->apartments;
        $sponsors = Sponsor::active();
        $array_sponsored = [];
        foreach ($sponsors as $sponsor) {
            array_push($array_sponsored, $sponsor->apartment_id);
        }

        return view('apartments.index', compact('apartments', 'array_sponsored'));
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
        // $validation = $request->validate([
        // 'title' => 'required | min:3 | string | max:100',
        // 'description' => 'required | string | min:3 |max:250',
        // 'rooms' => 'required | numeric | min:1',
        // 'beds' =>  'required| min:1 | numeric',
        // 'bathrooms' =>  'required | numeric | min:1',
        // 'metri_quadri'  => 'required | numeric | min:10',
        // 'price' => 'required | numeric | min:5',
        // 'cover' => 'file',
        // 'image' => 'file',
        // ]);
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


        // cover_img
        if($request->file('cover')){
            $name = Str::random(25);
            $imgEst = $request->file('cover')->extension();
            $path = $name . '.' . $imgEst;
            $ImgApartament = $request->file('cover')->move(public_path().'/images/', $path);
            $newApartment->cover_img = 'images/' . $path;
        }
        //$request->file('cover')->store('covers');


        $newApartment->save(); //salva
        // services

        if(isset($data['services'])){
            $newApartment->services()->attach($data['services']);
        }

        // locations

        $newApAddress = $request->city . ', ' . $request->address;

        $response = file_get_contents('https://api.tomtom.com/search/2/geocode/' . $newApAddress . '.json?limit=1&key=' . env('TOMTOM_KEY'));

        $response = json_decode($response, true);
        $latit = $response['results'][0]['position']['lat'];
        $longit = $response['results'][0]['position']['lon'];


        $newPosition = new Position;
        $newPosition->create([
            'apartment_id' => $newApartment->id,
            'latitude' => $latit,
            'longitude' => $longit,
            'address' => $newApAddress,
        ]);


         $files = $newApartment->imgs; //salvo il file in variabile
         $arrayImgApartment = $request->file('image'); // prendo il file

         if($request->hasFile('image'))
         { //ciclo per salvarlo
             foreach ($arrayImgApartment as $file) {
                 $newImg = new Img; // collego la varibile alla tabella img
                 $name = Str::random(25); // creo nome random di 25 caratteri
                 $imgEst = $file->extension();
                 $path = $name . '.' . $imgEst;
                 $file->move(public_path().'/images/', $path);  //salva l'img nella cartella di destinazione
                 $newImg->path = 'images/' . $path;  //aggiungo path
                 $newImg->apartment_id = $newApartment->id; // aggangio all'appartamento tramite id
                 $newImg->save();             // salvo tutto
             }

         }

        return redirect()->route('apartments.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Apartment $apartment)
    {
        $services = Service::all();
        $array = ['fa-wifi', 'fa-car','fa-swimmer', 'fa-concierge-bell','fa-hot-tub','fa-water'];
        $user = Auth::user();
        $apartment
            ->increment('views_count', 1);

            return view('apartments.show', compact('apartment', 'user', 'services'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $apartment = Apartment::find($id);
        $services = Service::all();
        return view('apartments.edit', compact('apartment','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Apartment $apartment)
    {
        // $validator = Apartment::make($request->all(), [
        //     'title' => 'required',
        //     'description' => 'required',
        //     'rooms' => 'required',
        //     'beds' =>  'required',
        //     'bathrooms' =>  'required',
        //     'metri_quadri'  => 'required',

        //     'price' => 'required',
        //     'cover_img' => '',
        //     'image'=> '',
        // ]);


        $services = Service::all();
        $user = Auth::user();

        $apartment->update([
            'title' => $request['title'],
            'user_id' => $user->id,
            'description' => $request['description'],
            'rooms' => $request['rooms'],
            'beds' => $request['beds'],
            'bathrooms' => $request['bathrooms'],
            'metri_quadrati' => $request['metri_quadrati'],
            'active' => true,
            'price' => $request['price'],
            'cover_img' => $apartment->cover_img,
        ]);

        if($request['cover']){
            //cancellazione foto cover vecchia
            $imgEst = $request->file('cover')->extension();
            $name = Str::random(25);
            $path = $name . '.' . $imgEst;
            $ImgApartament = $request->file('cover')->move(public_path().'/images/', $path);
            $apartment->cover_img = 'images/' . $path;
            $apartment->save();
        }


        // update services
        $apartment->services()->sync($request['services']);


        // locations
        if($request->city <> ''){
            $newApAddress = $request->city . ', ' . $request->address;

            $response = file_get_contents('https://api.tomtom.com/search/2/geocode/' . $newApAddress . '.json?limit=1&key=' . env('TOMTOM_KEY'));

            $response = json_decode(
                $response,
                true
            );
            $latit = $response['results'][0]['position']['lat'];
            $longit = $response['results'][0]['position']['lon'];

            $apartment->position()->update([
                'apartment_id' => $apartment->id,
                'latitude' => $latit,
                'longitude' => $longit,
                'address' => $newApAddress,
            ]);
        }

         $files = $apartment->imgs; //salvo il file in variabile
         $arrayImgApartment = $request->file('image'); // prendo i file
         //cancellazione imgs vecchie
         if($request->hasFile('image'))
         { //ciclo per salvarlo
             foreach ($arrayImgApartment as $file) {
                 $newImg = new Img; // collego la varibile alla tabella img
                 $imgEst = $file->extension();
                 $name = Str::random(25);
                 $path = $name . '.' . $imgEst;// creo nome random di 25 caratteri
                 $file->move(public_path().'/images/', $path);  //salva l'img nella cartella di destinazione
                 $newImg->path = 'images/' . $path;  //aggiungo path
                 $newImg->apartment_id = $apartment->id; // aggangio all'appartamento tramite id
                 $newImg->save();             // salvo tutto
             }

         }
        return view('apartments.show', compact('apartment', 'services'));
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $elimina = Apartment::find($id);// seleziono appartmento per ID

        $elimina->position()->delete(); //elimino la posizioneo
        $elimina->messages()->delete(); // elimino i messaggi
        $elimina->sponsors()->delete(); //elimino gli sponsor legati a questo appartamento
        // $elimina->imgs()->delete(); //elimino le immagini

        $serv = $elimina->services; //elimino solo i servizi inerenti a questo id
        foreach($serv as $services){
            $elimina->services()->detach($services->id);
        }
        //dd($elimina);
        $elimina->delete(); // elimino l'appartamento

        return redirect()->back(); //reindirizzo alla pagina precedente.
    }

    public function search(Request $request)
    {

        $usersearch = $request->input('city');
        $response = file_get_contents('https://api.tomtom.com/search/2/geocode/'. $usersearch .'.json?limit=1&key=' . env('TOMTOM_KEY'));

        $response = json_decode($response, true);
        $positionSearched = [
            'latit' => $response['results'][0]['position']['lat'],
            'longit' => $response['results'][0]['position']['lon'],
        ];
        $radius = 30;

        $sponsors = Sponsor::active();

        $filtered = Position::radius($positionSearched['latit'], $positionSearched['longit'],$radius);
        $arrayId= [];
        foreach ($filtered as $position){
            array_push($arrayId, $position->apartment_id);
        }


        $services = Service::all();
        $apartments = Apartment::with('services', 'position', 'imgs')
            ->find($arrayId)
            ->where('beds', '>=', $request->guests);
        if($positionSearched){
            $positionSearched = json_encode($positionSearched);
        } else {
            $positionSearched = json_encode($positionSearched = [
                'latit' => 41,9109,
                'longit' => 12,4818,
            ]);

        }
        $data = json_encode($usersearch);
        $guests = json_encode($request->guests);
        return view('search', compact('apartments', 'services','data','guests', 'positionSearched'));
    }


    public function sponsor($id)
    {
        $apartment = Apartment::find($id);
        $sponsortypes = SponsorType::all();
        return view('sponsor', compact('apartment', 'sponsortypes'));
    }


}
