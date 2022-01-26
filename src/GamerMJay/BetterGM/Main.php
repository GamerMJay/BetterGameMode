<?php

namespace GamerMJay2008\BetterGM;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class main extends PluginBase
{
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        if ($cmd->getName() === "gm0") {
            if (!$sender->hasPermission("gm0.use")) {
                $sender->sendMessage("§cYou do not have permission to use this command!");
                return false;
            }
            $sender->setGamemode(GameMode::SURVIVAL());
            $sender->sendMessage("§6§lBetterGameMode §r§8» §aYour gamemode has been changed to Survival");
            return false;
        }
        if ($cmd->getName() === "gm1") {
            if (!$sender->hasPermission("gm1.use")) {
                $sender->sendMessage("§cYou do not have permission to use this command!");
                return false;
            }
            $sender->setGamemode(GameMode::CREATIVE());
            $sender->sendMessage("§6§lBetterGameMode §r§8» §aYour gamemode has been changed to Creative");
            return false;
        }
        if ($cmd->getName() === "gm2") {
            if (!$sender->hasPermission("gm2.use")) {
                $sender->sendMessage("§cYou do not have permission to use this command!");
                return false;
            }
            $sender->setGamemode(GameMode::ADVENTURE());
            $sender->sendMessage("§6§lBetterGameMode §r§8» §aYour gamemode has been changed to Adventure");
            return false;
        }
        if ($cmd->getName() === "gm3") {
            if (!$sender->hasPermission("gm3.use")) {
                $sender->sendMessage("§cYou do not have permission to use this command!");
                return false;
            }
            $sender->setGamemode(GameMode::SPECTATOR());
            $sender->sendMessage("§6§lBetterGameMode §r§8» §aYour gamemode has been changed to Spectator");
            return false;
        }
        return true;
    }
}
