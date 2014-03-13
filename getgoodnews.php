<?
	// parameter from input url
	$url = $_REQUEST['s'];
	
	// get replacement dictionary
	require_once('library.php');
	
	// get requested url
	//$html = file_get_contents($url);
	$ch = curl_init($url);
    //curl_setopt($ch, CURLOPT_HEADER, 0);
    //curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, false); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    $html = curl_exec($ch);
    curl_close($ch);


	// get reference domain for that site
	$parsedURL = parse_url($url);
	$path = $parsedURL['path'];
/*
	$path = explode("/", $path);
	$path = array_slice($path, 0, -1);
	$path = implode("/", $path);
*/
	$actualHost = $parsedURL['scheme'] . "://" . $parsedURL['host'] . "/" ;

	// add hostname to all reference links in the doc
	$html = str_ireplace('<title>', '<base href="'. $actualHost .'" target="_blank"><title>', $html);

	
	// BAD NEWS CONVERTER!
	$old = Array();
	$new = Array();
	foreach ($lib as $o => $n){
		array_push($old, $o);
		array_push($new, $n);
	}
	$html = str_ireplace($old, $new, $html);

	echo $html;	
?>