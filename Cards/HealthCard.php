<?php
namespace Cards;

use Player\Player;

class HealthCard extends Card
{
	public function __construct()
	{
		parent::__construct(Card::HEALTH_CARD_VALUE, Card::TYPE_HEALTH);
	}
	
	public function applyToPlayer(Player $player)
	{
		$player->increaseHealth($this->value);
	}
}