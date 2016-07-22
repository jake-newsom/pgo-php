<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Models\Http\Client;
use App\Models\Mapobject;
//use App\Models\Trainer;

class MapController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

function create(Request $request) { $address = $request->input('address'); }

    public function cell(Request $request){

        $location = $request->input("location");

        $service = env('AUTH_SERVICE');
        $username = env('AUTH_USERNAME');

        $client = new Client;
        $latlng = $client->getLocation($location);
        //$accessToken = $client->accessToken;
        //$apiUrl = $client->apiEndpoint;

		//$trainer = new Trainer($client);
        //$profile = $trainer->profile();

    	//update this once you figure out what code populates the trainer profile
    	//$trainer = array("testuser"=>"testvalue");

        $map = array("coords"=>$latlng);
    	return response()->json($map);
    }
}
