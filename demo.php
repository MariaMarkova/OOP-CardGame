<?php


use Game\Game;
use Player\Player;

require_once 'autoload.php';

$p1= new Player('Mimi');
$p2 = new Player('Bobi');

$game = new Game($p1, $p2);

$game->play();

//$p1->displayCards();
//$p1->chooseCardNumber();
//  var_dump($game->getDeck());

// var_dump($p1->getCards());
// var_dump($p2->getCards());