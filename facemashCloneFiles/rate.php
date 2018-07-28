<?php


include('mysql.php');
include('functions.php');


// If rating - update the database
if ($_GET['winner'] && $_GET['loser']) {


	// Get the winner
	$result = mysqli_query($link, "SELECT * FROM images WHERE image_id = ".$_GET['winner']." ");
	$winner = mysqli_fetch_object($result);


	// Get the loser
	$result = mysqli_query($link, "SELECT * FROM images WHERE image_id = ".$_GET['loser']." ");
	$loser = mysqli_fetch_object($result);


	// Update the winner score
	$winner_expected = expected($loser->score, $winner->score);
	$winner_new_score = win($winner->score, $winner_expected);
		//test print "Winner: ".$winner->score." - ".$winner_new_score." - ".$winner_expected."<br>";
	mysqli_query($link, "UPDATE images SET score = ".$winner_new_score.", wins = wins+1 WHERE image_id = ".$_GET['winner']);


	// Update the loser score
	$loser_expected = expected($winner->score, $loser->score);
	$loser_new_score = loss($loser->score, $loser_expected);
		//test print "Loser: ".$loser->score." - ".$loser_new_score." - ".$loser_expected."<br>";
	mysqli_query($link, "UPDATE images SET score = ".$loser_new_score.", losses = losses+1  WHERE image_id = ".$_GET['loser']);


	// Insert battle
	mysqli_query($link, "INSERT INTO battles SET winner = ".$_GET['winner'].", loser = ".$_GET['loser']." ");


	// Back to the frontpage
	header('location: /');
	
}


?>