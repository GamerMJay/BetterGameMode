<?php

namespace GamerMJay\BetterGameMode\commands;

use GamerMJay\BetterGameMode\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginOwned;
use pocketmine\utils\Config;

class gm3 extends Command implements PluginOwned
{
    public function __construct(Main $plugin)
    {
        parent::__construct("gm3", "Go to spectator mode", null, []);
        $this->setPermission("gm3.use");
        $this->plugin = $plugin;
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player){
            $sender->sendMessage("§cRun the command ingame");
            return false;
        }
        if(!$sender->hasPermission("gm3.use")){
            $sender->sendMessage("§cNo perms");
        }
        $sender->setGamemode(GameMode::SURVIVAL());
        $sender->sendMessage($this->plugin->config->get("gamemode3-message"));
    }

    public function getOwningPlugin(): Plugin
    {
        return $this->plugin;
    }
}