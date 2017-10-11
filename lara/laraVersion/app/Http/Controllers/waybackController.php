<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class waybackController extends Controller
{
	var $client;
	public function __construct()
	{
		$this->client = new Client();
	}
    public function getDomainInfo(Request $domains)
    {
    	$client = $this->client; # get client variable ready
    	$domains = $domains->input('txtarea'); # get input from textarea 

    	$filter = $this->filter($domains); # filter domains with regEx
    	$counter = 0; // counter for the looping of arrays
    	$response = array(); # response array as output
    	foreach ($filter as $domain) # split multiple domains into single domain names
    	{
    		if(!empty($domain))
    		{
    			$url = "http://archive.org/wayback/available?url={$domain}";
    			$request = $client->request('GET', $url);
    			$result = json_decode($request->getBody());

    			$domainResult = $result->archived_snapshots;

    			if(($domainResult->closest == null) ) {
					array_push($response, ['domain'=>$domain,
						'archived'=> "no data for {$domain}"]);
				}
				else {
					$available = $domainResult->closest;
					$date = date_create($available->timestamp);
					$time = date_format($date, "Y-m-d, H:i:s");
					array_push($response, ['domain'=>$domain,
						'archived'=>$time]);
    			}
    			# return result in array variable $array.
    			//$array[$counter] = $response;
    		}
    		//$counter++;
    	}
    	//print_r($response);
    	return view('result')->with('response', $response);
    }

    private function filter($urlStrings)
    {
    	# clean up the string
    	$urlClean = str_replace("http:", '', str_replace("www.", '', stripslashes(strtolower($urlStrings))));
    	# split into array
		$urlClean = preg_split("/,|:|\s/", $urlClean);
		$urlClean = str_replace(array("\r", "\n", ""), ' ', $urlClean);

		return $urlClean;
    }
}
