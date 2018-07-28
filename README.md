# Facemash Clone
How to make your own Facemash website.

## What is facemash? An example.
[Skinmash](skinmash.000webhostapp.com) is a website I created that works for [Fortnite](https://www.epicgames.com/fortnite/en-US/battle-pass/season-5) skins (Fortnite is a popular video game and skins are what a player may wear).  My spinoff of Facemash, dubbed Skinmash, behaves almost the exact same to the original Facemash website, which was programmed by Mark Zuckerberg in his Harvard dorm room as a prank.

His website asked users to choose who was "hotter" between two girls who attended Harvard.  On the backend, the website would rate the women using an algorithm called [Elo](https://en.wikipedia.org/wiki/Elo_rating_system), which is used to rate 1v1-based games such as chess or [football](https://fivethirtyeight.com/features/nfl-elo-ratings-are-back/) and rank those respective players/teams.  The rankings would appear at the bottom.

An image of a clone of the original website can be viewed [here](https://codepen.io/yigitbiber/pen/LpBfi/image/large.png).

## Elo Rating System
Named after its creator, the famed Chess player Arpad Elo, the Elo rating system is a rating system for zero-sum 1-on-1 games such as chess or [football](https://fivethirtyeight.com/features/nfl-elo-ratings-are-back/).  Today, it's used in lots of common applications, such as multiplayer video games (XBOX, Scrabble both use Elo).

The difference in the ratings between two players serves as a predictor of the outcome of a match. Two players with equal ratings who play against each other are expected to score an equal number of wins. For example, a player whose rating is 100 points greater than their opponent's is expected to win 64% of matches; if the difference is 200 points, then the expected win rate for the stronger player is 76%.[<sup>1<sup>](https://en.wikipedia.org/wiki/Elo_rating_system)

A player's Elo rating is represented by a number which increases or decreases depending on the outcome of games between rated players. After every game, the winning player takes points from the losing one. The difference between the ratings of the winner and loser determines the total number of points gained or lost after a game. In a series of games between a high-rated player and a low-rated player, the high-rated player is expected to score more wins. If the high-rated player wins, then only a few rating points will be taken from the low-rated player. However, if the lower rated player scores an upset win, many rating points will be transferred. The lower rated player will also gain a few points from the higher rated player in the event of a draw. This means that this rating system is self-correcting. A player whose rating is too low should, in the long run, do better than the rating system predicts, and thus gain rating points until the rating reflects their true playing strength.[<sup>1<sup>](https://en.wikipedia.org/wiki/Elo_rating_system)
  
[functions.php](/facemashCloneFiles/functions.php) is the .php file responsible for all Elo-based algorithmic functions.  The formulas:

Expected win percentage of teamA where Ra is rating of teamA and Rb is rating of teamB:

<a href="https://www.codecogs.com/eqnedit.php?latex=\frac{1}{1&plus;10^{\frac{Rb-Ra}{400}}}" target="_blank"><img src="https://latex.codecogs.com/gif.latex?\frac{1}{1&plus;10^{\frac{Rb-Ra}{400}}}" title="\frac{1}{1+10^{\frac{Rb-Ra}{400}}}" /></a>

Updated Elo of teamA after it loses a game where E is old Elo score, k is a set value, and X is the expected win rate given by the former equation:

<a href="https://www.codecogs.com/eqnedit.php?latex=E&space;&plus;&space;K*(1-X)" target="_blank"><img src="https://latex.codecogs.com/gif.latex?E&space;&plus;&space;K*(1-X)" title="E + K*(1-X)" /></a>

## How to Create Your Own Site
Head over to the repositories wiki to find out how to create and maintain your own website like this one.
