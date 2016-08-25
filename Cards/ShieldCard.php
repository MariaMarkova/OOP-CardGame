<?php
namespace Cards;

use Player\Player;

class ShieldCard extends Card
{
	public function __construct()
	{
		parent::__construct(Card::SHIELD_CARD_VALUE, Card::TYPE_SHIELD);
	}
	
	public function applyToPlayer(Player $player)
	{
		$player->increaseShield($this->value);
	}
}
