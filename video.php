<!DOCTYPE html>
<?php
			$name = substr($_GET["dir"], 3);
			$name = str_replace("_"," ",$name);
	 		$dir = 'data/'.$_GET["dir"].'/';
		 	$files = array_diff(scandir($dir),array('..','.','face.jpg'));
?>
<html>
<head>
	<meta charset="UTF-8">
	<?php echo '<title>' . $name . '</title>'; ?> 
	<link rel="stylesheet" type="text/css" href="visagessonores.css">
</head>

<script>
 	xmlhttp = new XMLHttpRequest();
 	xmlhttp2 = new XMLHttpRequest();
	function play(video, audio){
		// we can't call directly VLC command here since Javascript security setting
		// does not allow xmlhttp to send something to a foreign server
		if ( video  ){
			xmlhttp.open("GET",  "play.php?video="+ video, true);
			xmlhttp.send();
		}

		if ( audio ){
		 	xmlhttp2.open("GET",  "play.php?audio="+ audio, true);
		 	xmlhttp2.send();
		}
	}
</script>
<body>

<div id="header">
 	<?php echo '<h1>' . $name . '</h1>'; ?>
</div>

<div id="section" max-width="650px">

		<?php
			// $name = str_replace("_"," ",$_GET["dir"]);
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
		 			echo '<div class="box2">';

		 			$video = "'" . getcwd() . "/" . $dir . $value . "'";
		 			// echo $video;
		 			$audio = "'bang'";
		 			if ( $filename == 'V4' ){
		 				$audio = "'" . getcwd() . "/" . $dir . "texte.wav'";
		 			}
		 			// echo $audio;

					echo '<a href=# id="vid" onclick="play('. $video .', '. $audio . ')">';
					echo "\n";

		 			// echo '<a href=# id="vid" onclick="play(\'' . getcwd() . '/' . $dir . $value . '\' )">';
		 			echo '<img width="300px" src="'.$dir.$filename.'.jpg"/></a>';
		 			echo "\n";
		 			//echo  '<a href=# onClick="play()"><img src="'.$dir.'face.jpg" width="300"/></a>';
		 			echo '<h2>';
		 			if ( $filename == 'V1'){
		 				echo "Première écoute";
		 			} elseif ( $filename == 'V2' ){
		 				echo "Deuxième écoute";
		 			} elseif ( $filename == 'V3' ){
		 				echo "Troisième écoute";
		 			} elseif ( $filename == 'V4' ){
		 				echo "Écoute intérieure";
		 			}
		 			echo '</h2>';
		 			echo "\n";

		 			echo '</div>';
		 		}
		 	}

		 	shell_exec('echo "audio '. getcwd() . '/' . $dir . 'son.wav" | pdsend 9999 localhost udp');

	 	?>
	 	</div>
	 	<h1><a href=index.php>Retour</a></h1>
</body>