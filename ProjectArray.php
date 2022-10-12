<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Array Project</title>
</head>
<body>

	<?php
	$dir = 'movies';
	$files = scandir($dir);

	function pre_r($array) {
		echo '<pre>';
		print_r($array);
		echo'</pre>';
	}

	$files = array_diff($files, array('..', '.'));

	//pre_r($files);

	$files = array_values($files);

	//pre_r($files);

	$movies = array();

	for ($i = 0; $i < count($files); $i++) {

		preg_match("!(.*?)\((.*?)\)!", $files[$i], $results);
		$movie_name = str_replace('_', ' ', $results[1]);
		$movie_name = ucwords($movie_name);

		$movies[$movie_name]['image'] = $files[$i];
		$movies[$movie_name]['year'] = $results[2];

	}

	echo "<table id = 'movies' cellpadding = 50>";
	echo "<tr class = 'odd'>";

	foreach ($movies as $movie_name => $info) {
		$content = "<td><span class = 'name'>$movie_name</span><br />"
		. "<img src = 'movies/$info[image]'><br />"
		. "<span class = 'year'>( $info[year] )</span></td>";
		echo $content;
	}


	echo "</tr></table>";
	?>

	<style>
		#movies {
			backgroud-color:  #000;
			color:  #fff;
			font:  11pt Calibri;
		}
		tr.header {
			background-color: #111f4e;
			color: #fff;
			font: bold 11pt Calibri;
		}
		tr.odd {
			background-color: #18182b;
		}
		tr.even {
			background-color: #141423;
		}
		img {
			height: 1000px;
			width: 1000px;
			padding:  10px;
		}
		td {
			text-align: center;
		}
		span.year {
			color: #ccc;
			font-size: 18px;
		}
		span.name {
			font-size: 18px;
			font-weight: bolder;
		}
		body {
			margin: 0;
			padding: 0;
		}
	</style>

</body>
</html>