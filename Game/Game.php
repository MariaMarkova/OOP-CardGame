<?php

namespace Game;

use Cards\DamageCard;
use Cards\HealthCard;
use Cards\ShieldCard;
use Player\Player;

class Game 
{
	protected $p1;
	protected $p2;
	protected $deck;
	protected $isOver;
	
	public function __construct(Player $player1, Player $player2)
	{
		$this->p1 = $player1;
		$this->p2 = $player2;
		$this->isOver = false;
		$this->deck = $this->makeDeck();
		$this->deal();
	}
	
	protected function makeDeck(){
		$deck = [];
		for ($i =0; $i < 33; $i++){
			$deck[] = new DamageCard();
		}
		for ($i = 33; $i < 66; $i++){
			$deck[] = new HealthCard();
		}
		for ($i = 66; $i < 100; $i++){
			$deck[] = new ShieldCard();
		}
		
		//shuffle deck
		shuffle($deck);
		
		return $deck;
	}
	
// 	public function getDeck(){
// 		return $this->deck;
// 	}
	
	protected function deal()
	{
		//deal 10 cards per person
		for($i = 0; $i < 20; $i++){
			if ($i % 2 == 0){
				$this->p1->setCards($this->deck[$i]);
			}else {
				$this->p2->setCards($this->deck[$i]);
			}
		}
	}
	
	public function play()
	{
		$counter = 0;
		while ( !$this->isOver) {
			
			if($counter % 2 == 0){
				$this->p1->displayCards();
				$playedCard = $this->p1->chooseCardNumber();				
				
				if($playedCard->getType() == 'H'){
					$playedCard->applyToPlayer($this->p1);
				}else if ($playedCard->getType() == 'S'){
					$playedCard->applyToPlayer($this->p1);
				}else {
					if($this->p2->getShield() > 0){
						if($this->p2->getShield() > 20){
							$this->p2->setShield($this->p2->getShield() - 20);
						} else {
							$this->p2->setShield(0);
							$this->p2->takeDamage(10);
						}
					}else{
						$playedCard->applyToPlayer($this->p2);
					}
					
				}
				
			}else{
				$this->p2->displayCards();
				$playedCard = $this->p2->chooseCardNumber();
				
				if($playedCard->getType() == 'H'){
					$playedCard->applyToPlayer($this->p2);
				}else if ($playedCard->getType() == 'S'){
					$playedCard->applyToPlayer($this->p2);
				}else {
					if($this->p1->getShield() > 0){
						if($this->p1->getShield() > 20){
							$this->p1->setShield($this->p1->getShield() - 20);
						} else {
							$this->p1->setShield(0);
							$this->p1->takeDamage(10);
						}
					}else{
						$playedCard->applyToPlayer($this->p1);
					}
					
				}			
			}
			
			echo $this->p1->displayPlayerInfo();
			echo $this->p2->displayPlayerInfo();
			$counter++;
			
			if ( empty($this->p1->getCards()) 
					|| empty($this->p2->getCards()) 
					|| $this->p1->getHealth() == 0 
					|| $this->p2->getHealth() == 0){
				
				$this->isOver = true;
				
				echo "GAME OVER " . PHP_EOL . 'Player1: ' . $this->p1->displayPlayerInfo() . 'Player2: ' . $this->p2->displayPlayerInfo();
			}
		}
		
		
	}
}