<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Les Futurs de l'écrit</title>
</head>
<style>
header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px; 
}
nav {
    line-height:30px;
    background-color:#eeeeee;
    height:300px;
    width:100px;
    float:left;
    padding:5px; 
}
section {
    width:350px;
    float:left;
    padding:10px; 
}
footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
    padding:5px; 
}
img {
	width:300px;
	padding:10px;
}
</style>

<script>
 	xmlhttp = new XMLHttpRequest();
		function play(file){;
		// we can't call directly VLC command here since Javascript security setting
		// does not allow xmlhttp to send something to a foreign server
		xmlhttp.open("GET",  "play.php?media="+ file, true);
		xmlhttp.send();
	}
</script>
<body>

		<?php
			$name = str_replace("_"," ",$_GET["dir"]);
	 		$dir = 'data/'.$_GET["dir"].'/';
		 	$files = array_diff(scandir($dir),array('..','.','face.jpg'));

/*
			echo "<script>";
		 	echo 	"xmlhttp = new XMLHttpRequest();\n";
			echo 	"function play(file){\n";
			 		// we can't call directly VLC command here since Javascript security setting
			 		// does not allow xmlhttp to send something to a foreign server
			echo	'xmlhttp.open("GET",  "play.php?media='.$dir.'"+ file, true);';
			echo	"\nxmlhttp.send();}\n";
			echo '</script>';
*/


		 	echo "<header><h1>".$name."</h1></header>\n";

		 	foreach ( $files as $value )
		 	{
		 		// $ext = split('.',$value);
		 		$ext = pathinfo($value, PATHINFO_EXTENSION);
		 		$filename = pathinfo($value, PATHINFO_FILENAME);
		 		// echo $value . '</br>';
		 		// echo 'extension : ' . $ext . '</br>' ;
		 		// echo 'basename : ' . $filename . '</br>';
		 		// print_r($ext);
		 		if ( $ext === 'mov' || $ext === 'mp4' )
		 		{
		 			// echo 'Found a video : ' . $value . '</br>';
		 			// echo "<figure>\n";
		 			// echo $value;
		 			echo  '<a href=# id="vid" onclick="play(\'' . getcwd() . '/' . $dir . $value . '\')"><img src="'.$dir.$filename.'.jpg"/></a>';
		 			//echo  '<a href=# onClick="play()"><img src="'.$dir.'face.jpg" width="300"/></a>';
		 			//echo "\n<figcaption>".$filename."</figcaption>\n";
		 			//echo "</figure>\n";
		 		}
		 		// echo '<a href=# onClick=play("/home/antoine/Documents/test.mp3")><img src="'.$dir.'/face.jpg" width="300"/></a>';
		 	}

	 	?>
	 	<h1><a href=index.php>Retour</a></h1>
</body>