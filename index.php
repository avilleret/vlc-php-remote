<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Les futurs de l'écrit</title>
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
	width:200px;
	padding:10px;
	float:center;
}
figure {
	float:center;
}
h1	{
	text-align:center;
}
</style>
 <body>
 	<h1>Les futurs de l'écrit</h1>
	 	<?php
	 		$dir = 'data';
		 	$files = array_diff(scandir($dir),array('..','.'));

			foreach ( $files as $value )
			{
				if(is_dir($dir.'/'.$value))
				{
					//echo '<figure>';
					echo '<a href="video.php?dir='.$value.'">' . '<img src="data/'.$value.'/face.jpg" /></a>';
					// echo '<img src="data/'.$value.'/face.jpg" />';
					// echo '<figcaption>' . str_replace("_"," ",$value) . '</figcaption>';
					//echo '</figure>';
				}
			}
	 	?>
 </body>
</html>