<?php

/*
 * Title: Skinmash
 * Author: Matthew Anderson
 * Version: 1.1
 * 
 * Elo performance evaluation
 * Performance rating = [(Total of opponents' ratings + 400 * (Wins - Losses)) / score].
 */

include('mysql.php');
include('functions.php');

// Get random 2
$query = "SELECT * FROM images ORDER BY RAND() LIMIT 0,2";
$result = mysqli_query($link, $query);

if($row = mysqli_fetch_object($result)) {
	$images[0] = (object) $row;
}

$query = "SELECT * FROM images ORDER BY RAND() LIMIT 0,2";
$res = mysqli_query($link, $query);

if($row = mysqli_fetch_object(mysqli_query($link, $query))) {
	$images[1] = (object) $row;
}


// Get the top10
// $result = mysqli_query($link, "SELECT *, ROUND(score/(1+(losses/wins))) AS performance FROM images ORDER BY ROUND(score/(1+(losses/wins))) DESC LIMIT 0,10");
// while($row = mysqli_fetch_object($result)) $top_ratings[] = (object) $row;

$result = mysqli_query($link, "SELECT filename FROM images ORDER BY (1/score) LIMIT 5");
while($row = mysqli_fetch_object($result)) {
    $top_ratings[] = (object) $row;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Skinmash</title>
<style type="text/css">

body, html {font-family:Arial, Helvetica, sans-serif;width:100%;margin:0;padding:0;text-align:center;}
h1 {background-color:#600;color:#fff;padding:20px 0;margin:0;}
a img {border:0;}
td {font-size:11px;}

</style>
</head>

<body>


<a href="https://fontmeme.com/fortnite-video-game-font/"><img src="https://fontmeme.com/permalink/180626/7b127d5f40d61934ad9330cbbc6f42e7.png" alt="fortnite-video-game-font"></a>

<center>
    <a href="https://fontmeme.com/fortnite-video-game-font/"><img src="https://fontmeme.com/permalink/180626/2198d339104ff4d05a8b68eda8665534.png" alt="fortnite-video-game-font" border="0"></a>
<table>
	<tr>
		<td valign="top"><a href="rate.php?winner=<?=$images[0]->image_id?>&loser=<?=$images[1]->image_id?>"><img src="images/<?=$images[0]->filename?>" width="500"/></a></td>
		<td valign="top"><a href="rate.php?winner=<?=$images[1]->image_id?>&loser=<?=$images[0]->image_id?>"><img src="images/<?=$images[1]->filename?>" width="500"/></a></td>
	</tr>
</table>
</center>

<center>
<table>
    <tr><a href="https://fontmeme.com/fortnite-video-game-font/"><img src="https://fontmeme.com/permalink/180626/421f172628b706f44591f0bca385a06b.png" alt="fortnite-video-game-font" border="0"></a></tr>
    <tr>
        <td valign="top"><img src="images/<?=$top_ratings[0]->filename?>" width="180"></img></td>
        <td valign="top"><img src="images/<?=$top_ratings[1]->filename?>" width="180"></img></td>
        <td valign="top"><img src="images/<?=$top_ratings[2]->filename?>" width="180"></img></td>
        <td valign="top"><img src="images/<?=$top_ratings[3]->filename?>" width="180"></img></td>
        <td valign="top"><img src="images/<?=$top_ratings[4]->filename?>" width="180"></img></td>
	</tr>
</table>
</center>

<?// Close the connection
mysqli_close($link);?>

</body>
</html>
