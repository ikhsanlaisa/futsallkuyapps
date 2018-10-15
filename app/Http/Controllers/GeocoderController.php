<?php

namespace App\Http\Controllers;

use Geocoder\Exception\Exception;
use Geocoder\Query\GeocodeQuery;
use Illuminate\Http\Request;
use maxh\Nominatim\Nominatim;

class GeocoderController extends Controller
{
    public function index(){
//        $httpClient = new \Http\Adapter\Guzzle6\Client();
        $httpClient = new \Http\Adapter\Guzzle6\Client();
        $provider = new \Geocoder\Provider\Nominatim\Nominatim($httpClient,'http://localhost:8300','Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2224.3 Safari/537.36');
        $geocoder = new \Geocoder\StatefulGeocoder($provider, 'en');

        try {
            $result = $geocoder->geocodeQuery(GeocodeQuery::create('Buckingham Palace, London'));
        } catch (Exception $e) {
        }

        dd($result);
    }

    public function get(Request $request)
    {
        $url = "http://nominatim.openstreetmap.org/";
        $nominatim = new Nominatim($url);
        $search = $nominatim->newSearch();
        $search->query('medan')->countryCode('ID')->language('ID')->addressDetails();
        if($request->input('lat') && $request->input('lon')){
            $search = $nominatim->newReverse();
            $search
                ->latlon($request->input('lat'), $request->input('lon'))
                ->addressDetails();
        }

        $result = $nominatim->find($search);
        return response()->json($result);
    }

    public function show(){
        return view('components._openstreetmap');
    }
}
