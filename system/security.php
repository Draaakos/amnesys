<?php 
function escape($data) {
	return addslashes(str_replace(chr(0xbf).chr(0x27), '', $data ));
}

foreach($_POST as $key=>$value) {
	$_POST[$key.'Original'] = $value;
	$_POST[$key] = escape($value);
}
if($config['engine']['enable_query_strings']) {
	foreach($_GET as $key=>$value) {
		$_GET[$key.'Original'] = $value;
		$_GET[$key] = escape($value);
	}
	$_REQUEST = array_merge($_GET, $_POST);
} else {
	$_REQUEST = $_POST;
}


?>