<?php

namespace GamerMJay\BetterGM\commands;

use GamerMJay\BetterGM\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class gm2 extends PluginBase
{
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool 
    {
        if ($cmd->getName() === "gm2") {
            if (!$sender->hasPermission("gm2.use")) {
                $sender->sendMessage("§cYou do not have permission to use this command!");
                return false;
            }
            $sender->setGamemode(GameMode:: ADVENTURE());
            $message = $config->get("gamemode2-message");
            return false;
        }
        
        return true;
    }
}
