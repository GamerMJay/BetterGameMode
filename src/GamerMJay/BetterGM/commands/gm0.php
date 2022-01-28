<?php

namespace GamerMJay\BetterGM\commands;

use GamerMJay\BetterGM\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class gm0 extends PluginBase
{
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool 
    {
        if ($cmd->getName() === "gm0") {
            if (!$sender->hasPermission("gm0.use")) {
                $sender->sendMessage("§cYou do not have permission to use this command!");
                return false;
            }
            $sender->setGamemode(GameMode:: SURVIVAL());
            $message = $config->get("gamemode0-message");
            $sender->sendMessage($message);
            return false;
        }
        
        return true;
    }
}
