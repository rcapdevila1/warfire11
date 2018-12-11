<?php namespace ALttP\Region\Inverted\DarkWorld;

use ALttP\Item;
use ALttP\Location;
use ALttP\Region;
use ALttP\Shop;
use ALttP\Support\LocationCollection;
use ALttP\Support\ShopCollection;
use ALttP\World;

/**
 * South Dark World Region and it's Locations contained within
 */
class South extends Region\Standard\DarkWorld\South {
	/**
	 * Create a new South Dark World Region and initalize it's locations
	 *
	 * @param World $world World this Region is part of
	 *
	 * @return void
	 */
	public function __construct(World $world) {
		parent::__construct($world);

		$this->shops["Dark World Lake Hylia Shop"]->clearInventory()
			->addInventory(0, Item::get('BluePotion'), 160)
			->addInventory(1, Item::get('BlueShield'), 50)
			->addInventory(2, Item::get('TenBombs'), 50);

		$this->locations->addItem(new Location\Chest("Link's House", 0xE9BC, null, $this));
	}

	/**
	 * Initalize the requirements for Entry and Completetion of the Region as well as access to all Locations contained
	 * within for No Glitches
	 *
	 * @return $this
	 */
	public function initNoGlitches() {
		$this->shops["Bonk Fairy (Dark)"]->setRequirements(function($locations, $items) {
			return $items->has('PegasusBoots');
		});

		$this->shops["Dark Lake Hylia Ledge Fairy"]->setRequirements(function($locations, $items) {
			return ($items->has('Flippers') || $items->canFly()) && $items->canBombThings();
		});

		$this->shops["Dark Lake Hylia Ledge Hint"]->setRequirements(function($locations, $items) {
			return ($items->has('Flippers') || $items->canFly()) && $items->canLiftRocks();
		});

		$this->shops["Dark Lake Hylia Ledge Spike Cave"]->setRequirements(function($locations, $items) {
			return ($items->has('Flippers') || $items->canFly()) && $items->canLiftRocks();
		});

		$this->locations["Hype Cave - Top"]->setRequirements(function($locations, $items) {
			return $items->canBombThings();
		});

		$this->locations["Hype Cave - Middle Right"]->setRequirements(function($locations, $items) {
			return $items->canBombThings();
		});

		$this->locations["Hype Cave - Middle Left"]->setRequirements(function($locations, $items) {
			return $items->canBombThings();
		});

		$this->locations["Hype Cave - Bottom"]->setRequirements(function($locations, $items) {
			return $items->canBombThings();
		});

		$this->locations["Hype Cave - NPC"]->setRequirements(function($locations, $items) {
			return $items->canBombThings();
		});

		return $this;
	}
}
