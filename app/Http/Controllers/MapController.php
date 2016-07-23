<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Models\Http\Client;
use App\Models\Map;
//use App\Models\Trainer;
use Protobuf\PokemonGo\RequestEnvelop\Requests;
use Protobuf\PokemonGo\ResponseEnvelop\ProfilePayload;

class MapController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function cell(){

        $location = Input::get("location","monroe park richmond va");

        $service = env('AUTH_SERVICE');
        $username = env('AUTH_USERNAME');

        $client = new Client;
        $map = new Map($client);
        $mapinfo = $map->listObjects();

        //$latlng = $client->getLocation($location);
        //$response = $this->client->request($requestCollection);
        //$accessToken = $client->accessToken;
        //$apiUrl = $client->apiEndpoint;

		//$trainer = new Trainer($client);
        //$profile = $trainer->profile();

    	//update this once you figure out what code populates the trainer profile
    	$map = array("objects"=>$mapinfo);

    	return response()->json($map);
    }
}
