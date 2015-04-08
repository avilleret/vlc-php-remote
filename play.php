<!--
	This script send 2 commands to VLC :
	- first to empty the playlist 
	- and then to play the media passed by "media" tag.
	I.E. to play test.mp3 just open in a browser : 
	play.php?media=test.mp3

	You can specify an absolute or relative path to media. 
-->

<?php
echo "Hello world !\n";
echo $_GET["media"];
echo "<h1>empty playlist</h1>";
echo file_get_contents('http://127.0.0.1:8080/requests/status.json?command=pl_empty');
echo '<h1>play</h1></br>';
echo file_get_contents('http://:lua@127.0.0.1:8080/requests/status.json?command=in_play&input=' . $_GET["media"] );
?>