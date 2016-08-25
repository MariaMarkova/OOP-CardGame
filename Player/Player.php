<?php

namespace Player;

use Cards\Card;

require_once 'readline.php';

class Player
{
	const MAX_HEALTH = 100;
	
	protected $health;	
	protected $name;	
	protected $shield;	
	protected $cards;
	
	public function __construct($name) 
	{
		$this->name = $name;
		$this->health = self::MAX_HEALTH;
		$this->shield = 0;
		$this->cards = [];
	}
	
	public function getHealth()
	{
		return $this->health;
	}
	
	public function setHealth($value)
	{
		$this->health = $value;
	}
	
	public function getShield()
	{
		return $this->shield;
	}
	
	public function setShield($value)
	{
		$this->shield = $value;
	}
		
	public function getCards()
	{
		return $this->cards;
	}
	
	public function setCards($value)
	{
		$this->cards[] = $value;
	}
	
	public function takeDamage($value) 
	{
		if ($this->health >= $value) {
			$this->health -= $value;
		} else {
			$this->health = 0;
		}
	}
	
	public function increaseHealth($value)
	{
		$total = $this->health + $value;
		// $this->health = $total > self::MAX_HEALTH ? self::MAX_HEALTH : $otal
		$this->health = min(self::MAX_HEALTH, $total);
	}
	
	public function increaseShield($value)
	{
		$this->shield += $value;
	}
	
	public function chooseCardNumber(){
		$index = readline('Input an index.' , PHP_EOL);
		$cardNow;
		
		if(isset($this->cards[$index])){
			
			$cardNow = $this->cards[$index];
			
		} else {
			do {
				$index = readline('Input an index.' , PHP_EOL);
				
			}while( !isset($this->cards[$index]));
			
			$cardNow = $this->cards[$index];
		}
		
		$this->playCard($index);
		
		return $cardNow;
	}
	
	protected function playCard($index) 
	{
		array_splice($this->cards, $index, 1);
	}
		
	public function displayCards(){
		echo "Player: $this->name " . PHP_EOL;
		foreach ($this->cards as $key=>$value){
			echo $key . ' - ' . $value->getType() , PHP_EOL;
		}
	}
	
	public function displayPlayerInfo(){
		return $this->name . ' HP: ' . $this->health . ' SP: ' . $this->shield . PHP_EOL;
	}
}