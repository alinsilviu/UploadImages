<?php
$name = FALSE;
if (isset($_GET['image'])) {
	$ext = strtolower (substr($_GET['image'], -4));
	if (($ext == '.jpg') OR ($ext == 'jpeg') OR ($ext == '.png')) {
		$image = "/var/www/html/uploadphp/uploads/{$_GET['image']}";
		if (file_exists($image) && (is_file($image))) {
			$name = $_GET['image'];
		}
	}
}
if (!$name) {
	$image = 'images/unavailable.jpg';
	$name = 'unavailable.jpg';
}
$info = getimagesize($image);
$fs = filesize($image);

header("Content-Type: {$info['mime']}\n");
header("Content-Disposition: inline; filename=\"$name\"\n");
header("Content-Length: $fs\n");

readfile ($image);