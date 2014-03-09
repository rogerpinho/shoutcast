<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shoutcast Application</title>
</head>
<body>
<?php
require 'shoutcast.class.php';
$ip = "87.98.215.45";
$port = "9088";
$shoutcast = new Shoutcast($ip, $port);


echo $shoutcast->getArtist().'<br />';
echo $shoutcast->getMusic().'<br />';
echo $shoutcast->getState();
?>
</body>
</html>
