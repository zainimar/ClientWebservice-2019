<form method="post" action="">
	<div> Film ID : <input type="text" name="idd"> </div>
	<div> <input type="submit" value="Cari" ></div>
</form>

<?php

	//client web service
	//to call film web service
	if (isset($_POST['idd'])) {
		# code...
		require 'vendor/autoload.php';
		$client = new GuzzleHttp\Client();
		//call url page web service api
		$url_api = 'http://localhost:8080/webservice/sakila/film_detail.php';
		$id = $_POST['idd'];
		//kena pass token di sini
		$param = ['query' => ['idd' => $id, 'token' => 'wssdff222555555eedffg']];

		$result = $client->request('GET', $url_api, $param);

		$detail_film = json_decode($result->getBody()->getContents());
		if (isset($detail_film->err))
		{
			echo $detail_film->err;
		} 
		else
		{
			echo "ID : ". $detail_film->film_id . "<br>";
			echo "TITLE :". $detail_film->title . "<br>";
			echo "DESCRIPTION :". $detail_film->description . "<br>";
		}
		
	}
	
?>