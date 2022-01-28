<?php

namespace GamerMJay\BetterGM;

use GamerMJay\BetterGM\commands\gm0;
use GamerMJay\BetterGM\commands\gm1;
use GamerMJay\BetterGM\commands\gm2;
use GamerMJay\BetterGM\commands\gm3;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;


class Main extends PluginBase {

    public function onEnable(): void {

        $this->saveResource('config.yml');
	$this->getServer()->getCommandMap()->register("gm0", new gm0($this));
        $this->getServer()->getCommandMap()->register("gm1", new gm1($this));
	$this->getServer()->getCommandMap()->register("gm2", new gm2($this));
        $this->getServer()->getCommandMap()->register("gm3", new gm3($this));

    }
}
