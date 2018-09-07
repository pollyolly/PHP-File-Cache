<?php
$cache_time = 86400;
$cache_path = realpath(dirname(__FILE__))."/cache/";
$html = "<p>Sample again asd s</p>";

echo file_caching($html, $cache_time, $cache_path);

function file_caching($html, $cache_time, $cache_path){
$cache_file = "cache-".date('Y-m-d').".php";
$cache_path_file = $cache_path.$cache_file;
$html2 = "";
if(file_exists($cache_path_file) && ((time() - $cache_time) < filemtime($cache_path_file))){
	$html2 = file_get_contents($cache_path_file);
	return $html2;
} else {
	$cache_file_open = fopen($cache_path_file, 'w');
	fwrite($cache_file_open, $html);
	fclose($cache_file_open);
}
}
