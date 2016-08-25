<?php
namespace Cards;

use Player\Player;

class DamageCard extends Card 
{
	public function __construct()
	{
		parent::__construct(Card::DAMAGE_CARD_VALUE, Card::TYPE_DAMAGE);	
	}
	
	public function applyToPlayer(Player $player) 
	{
		$player->takeDamage($this->value);
	}
}