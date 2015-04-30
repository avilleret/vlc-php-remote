<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Visages Sonores</title>
<link rel="stylesheet" type="text/css" href="visagessonores.css">
</head>

<body align="center" bgcolor=black>

<div id="header">
 	<h1>Visages Sonores</h1>
</div>
 	
<div id="section">
	<?php
		$dir = 'data';
	 	$files = array_diff(scandir($dir),array('..','.'));

		foreach ( $files as $value )
		{
			if(is_dir($dir.'/'.$value))
			{
				echo '<div class="box">';
				// echo '<figure>';
				echo '<a href="video.php?dir=' . $value . '">' ;
				echo '<img width="120px" src="data/'.$value.'/'.$value.'.jpg" /></a>';
				$caption = substr($value, 3);
				$caption = str_replace("_"," ",$caption);

				// uncomment the next line to display Surname and Name
				//$caption_list = explode("_",$value);
				//$caption=$caption_list[1];	
				echo '</br>';
				echo $caption;
				// echo '<figcaption align="center">' . $caption . '</figcaption>';
				// echo '</figure>';
				echo '</div>';
			}
		}
	?>
</div>

</body>

</html>