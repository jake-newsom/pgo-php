<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use App\Models\Http\Client;
use App\Models\Trainer;

class TrainerController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function index(){

        $service = env('AUTH_SERVICE');
        $username = env('AUTH_USERNAME');

        $client = new Client;
        $accessToken = $client->accessToken;
        $apiUrl = $client->apiEndpoint;

		$trainer = new Trainer($client);
        $profile = $trainer->profile();

    	//update this once you figure out what code populates the trainer profile
    	//$trainer = array("testuser"=>"testvalue");

    	return response()->json($profile);
    }
}
