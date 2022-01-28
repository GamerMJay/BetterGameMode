<?php

namespace GamerMJay\BetterGM;

#commands
use GamerMJay\BetterGM\commands\gm0;
use GamerMJay\BetterGM\commands\gm1;
use GamerMJay\BetterGM\commands\gm2;
use GamerMJay\BetterGM\commands\gm3;

#pocketmine
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\tile\Tile;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\Player;

class Main extends PluginBase {

    public function onEnable(): void {



	$this->getServer()->getCommandMap()->register("gm0", new gm0($this));
        $this->getServer()->getCommandMap()->register("gm1", new gm1($this));
	$this->getServer()->getCommandMap()->register("gm2", new gm2($this));
        $this->getServer()->getCommandMap()->register("gm3", new gm3($this));

    }
}
