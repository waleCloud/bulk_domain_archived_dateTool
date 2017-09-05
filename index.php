<?php error_reporting(0);
ini_set('max_execution_time', 0); // to get unlimited php script execution time
if (isset($_POST['btn'])) {

	$response = ''; // to return the response
	$array = array();
		# get the text in the text area
		$dn = $_POST['domain_names'];
		# clean up the string
		$dn = str_replace("http:", '', str_replace("www.", '', stripslashes(strtolower($dn))));
		# split into array
		$str = preg_split("/,|:|\s/", $dn);

		# run through each array element
		$i=0;
		foreach ($str as $domain) {
			if(!empty($domain)) {
				$url = "http://archive.org/wayback/available?url={$domain}";
				require "vendor/autoload.php";
				$client = new GuzzleHttp\Client();
				$request = $client->request('GET', $url);

				$result = json_decode($request->getBody());
				$d = $result->archived_snapshots;
				if(($d->closest == null) ) {
					$response = "no data for {$domain}";
				}
				else {
					$f = $d->closest;
					$response = $domain." => ".$f->timestamp;
				}
				//$data['message'] = $response;
				//array_push($data, $response);
				$array[$i] = $response;
			}
			$i++;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Archived Timestamp</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="public/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="submit.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h3 class="text-center">Get Archived date of domains (Active or inactive)</h3>
			<form method="post" class="form" action="">
				<div id="errors">
					
				</div>
				<div class="form-group">
					<label>Enter Domains here</label>
					<textarea cols="5" name="domain_names" required="true" class="form-control" id="dn"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" name="btn" class="form-control btn btn-warning">Go-></button>
				</div>
				<div id="progress" class="progress">
    			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:10%">
    			</div>
  			</div>
			</form>
			
		</div>
		<div>
			<textarea cols="7" rows="7" id="result" readonly="true" class="form-control" >
				<?php
				if(isset($array)) {
					for($j=0; $j<=count($array); $j++) {
						echo $array[$j]."\n";
					}
				}
				?>
			</textarea>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('#progress').hide();
		});
	</script>
</body>
</html>