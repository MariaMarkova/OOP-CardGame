<?php

namespace Cards;

use Player\Player;

abstract class Card 
{
	const TYPE_DAMAGE = 'D';
	
	const TYPE_HEALTH = 'H';
	
	const TYPE_SHIELD = 'S';
	
	const DAMAGE_CARD_VALUE = 20;
	
	const HEALTH_CARD_VALUE = 10;
	
	const SHIELD_CARD_VALUE = 10;
	
	protected $value;
	
	protected $type;
	
	public function __construct($value, $type)
	{
		$this->value = $value;
		$this->type = $type;
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	abstract public function applyToPlayer(Player $player);
}