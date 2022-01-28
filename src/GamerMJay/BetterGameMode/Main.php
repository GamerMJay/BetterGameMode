<?php

namespace GamerMJay\BetterGameMode;

#commands


#pocketmine
use GamerMJay\BetterGameMode\commands\gm0;
use GamerMJay\BetterGameMode\commands\gm1;
use GamerMJay\BetterGameMode\commands\gm2;
use GamerMJay\BetterGameMode\commands\gm3;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\tile\Tile;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\player\Player;

class Main extends PluginBase {
    public $config;

    public function onEnable(): void {
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml", 2);
        $this->getServer()->getCommandMap()->register("gm0", new gm0($this));
        $this->getServer()->getCommandMap()->register("gm1", new gm1($this));
        $this->getServer()->getCommandMap()->register("gm2", new gm2($this));
        $this->getServer()->getCommandMap()->register("gm3", new gm3($this));
    }
}
