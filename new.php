<?php
include "config.php";
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$url = "https://www.xvideos.com/video$id/$name";
$result = file_get_contents($url);
preg_match_all('#<meta property="og:image" content="(.*)" />#', $result, $ppp);
$low = str_replace("('","",$ppp[1][0]);
$lowmp = str_replace("');","",$low);
$img = $ppp[1][0];
$imginfo = getimagesize($img);
header("Content-type: {$imginfo['mime']}");
readfile($img);
?>
