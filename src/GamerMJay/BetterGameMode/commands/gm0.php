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
use pocketmine\Server;

class gm0 extends Command implements PluginOwned
{
    public function __construct(Main $plugin)
    {
        parent::__construct("gm0", "Go to survival mode", null, []);
        $this->setPermission("gm0.use");
        $this->plugin = $plugin;
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player){
            $sender->sendMessage($this->plugin->config->get("run-ingame"));
            return false;
        }        if (isset($args[0])) {
            $target = Server::getInstance()->getPlayerByPrefix($args[0]);
            if ($target instanceof Player) {
                $target->setGamemode(GameMode::SURVIVAL());
                $target->sendMessage($this->plugin->config->get("player-gm"));
                $sender->sendMessage($this->plugin->config->get("sender-gm"));
            } else {
                $sender->sendMessage($this->plugin->config->get("player-notfound"));
            }
        } else {
            if(!$sender->hasPermission("gm0.use")){
                $sender->sendMessage($this->plugin->config->get("no-permission"));
                return false;
            }
            $sender->setGamemode(GameMode::SURVIVAL());
            $sender->sendMessage($this->plugin->config->get("gamemode0-message"));
        }
    }

    public function getOwningPlugin(): Plugin
    {
        return $this->plugin;
    }
}