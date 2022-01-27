<?php

namespace GamerMJay\BetterGM\commands;

use GamerMJay\BetterGM\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool 
    {
        if ($cmd->getName() === "gm1") {
            if (!$sender->hasPermission("gm1.use")) {
                $sender->sendMessage("§cYou do not have permission to use this command!");
                return false;
            }
            $sender->setGamemode(GameMode::CREATIVE());
            $message = $config->get("gm1");
            return false;
        }
        
        return true;
    }
}
