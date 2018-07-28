<?php

// complete the following via the Elo algorithm
// https://en.wikipedia.org/wiki/Elo_rating_system

// calculate the expected outcome (out of 1)
function expected($Rb, $Ra) {
	return 1/(1 + pow(10, ($Rb-$Ra)/400));
}

// calculate the Elo of new winner
function win($score, $expected, $k = 8) {
	return $score + $k * (1-$expected);
}

// calculate the Elo of new loser
function loss($score, $expected, $k = 8) {
	return $score + $k * (0-$expected);
}

?>
