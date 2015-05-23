<!--
	This script send commands to Puredata :
	to play the media passed by "video" or "audio" tag.
	play.php?video=video.mp4
	play.php?audio=sound.wav

	You can specify an absolute or relative path to media. 
-->

<?php
echo "Hello world !\n";
$video = $_GET["video"];
$audio = $_GET["audio"];

if ( $video != "" ){
	echo "You pass a video as argument !";
	shell_exec('echo "video '.$video.'" | pdsend 8888 localhost udp');
} else {
	echo "you don't pass video as argument !";
}


if ( $audio != "" ){
	echo "You pass an audio file as argument !";
	shell_exec('echo "audio2 '.$audio.'" | pdsend 9999 localhost udp');
} else {
	echo "you don't pass any audio file as argument !";
}
?>