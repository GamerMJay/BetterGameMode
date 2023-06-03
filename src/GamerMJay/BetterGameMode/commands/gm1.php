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

class gm1 extends Command implements PluginOwned
{
    private $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
		parent::__construct($this->plugin->getConfig()->get("gm1-command"), $this->plugin->getConfig()->get("gm1-description"), "/gm1", [""]);
        $this->setPermission("bettergamemode.gm1");    
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player){
            $sender->sendMessage($this->plugin->config->get("run-ingame"));
            return false;
        }
        if (isset($args[0])) {
            $target = Server::getInstance()->getPlayerByPrefix($args[0]);
            if ($target instanceof Player) {
                $target->setGamemode(GameMode::CREATIVE());
                $target->sendMessage($this->plugin->config->get("player-gm"));
                $msg = $this->plugin->config->get("sender-gm");
                $msg = str_replace("{name}", $target->getName(), $msg);
                $sender->sendMessage($msg);
            } else {
                $sender->sendMessage($this->plugin->config->get("player-notfound"));
            }
        } else {
            if(!$sender->hasPermission("bettergamemode.gm1")){
                $sender->sendMessage($this->plugin->config->get("no-permission"));
                return false;
            }
            $sender->setGamemode(GameMode::CREATIVE());
            $sender->sendMessage($this->plugin->config->get("gamemode1-message"));
        }
    }

    public function getOwningPlugin(): Plugin
    {
        return $this->plugin;
    }
}