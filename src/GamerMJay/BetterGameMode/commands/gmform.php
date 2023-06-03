<?php

namespace GamerMJay\BetterGameMode\commands;

use GamerMJay\BetterGameMode\Main;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\utils\CommandException;
use pocketmine\lang\Translatable;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginOwned;
use pocketmine\utils\Config;

class gmform extends Command implements PluginOwned
{
    private $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
		parent::__construct($this->plugin->getConfig()->get("gm-command"), $this->plugin->getConfig()->get("gm-description"), "/gm", [""]);        
        $this->setPermission("bettergamemode.gmform");    
    }
    public function onGMUI(Player $player){
        $form = new SimpleForm(function (Player $player, int $data = null){
            if($data === null){
                return;
            }
            { $sender = $player;
                switch ($data) {
                    case 0:
                        if (!$sender->hasPermission("bettergamemode.gm0")) {
                            $sender->sendMessage($this->plugin->config->get("nopermission"));
                        } else {
                            $sender->setGamemode(GameMode::SURVIVAL());
                            $sender->sendMessage($this->plugin->config->get("gamemodeform0-message"));
                        }
                        break;
                    case 1:
                        if (!$sender->hasPermission("bettergamemode.gm1")) {
                            $sender->sendMessage($this->plugin->config->get("nopermission"));
                        } else {
                            $sender->setGamemode(GameMode::CREATIVE());
                            $sender->sendMessage($this->plugin->config->get("gamemodeform1-message"));
                        }
                        break;
                    case 2:
                        if (!$sender->hasPermission("bettergamemode.gm2")) {
                            $sender->sendMessage($this->plugin->config->get("nopermission"));
                        } else {
                            $sender->setGamemode(GameMode::ADVENTURE());
                            $sender->sendMessage($this->plugin->config->get("gamemodeform2-message"));
                        }
                        break;
                    case 3:
                        if (!$sender->hasPermission("bettergamemode.gm3")) {
                            $sender->sendMessage($this->plugin->config->get("nopermission"));
                        } else {
                            $sender->setGamemode(GameMode::SPECTATOR());
                            $sender->sendMessage($this->plugin->config->get("gamemodeform3-message"));
                        }
                        break;
                }
                return true;
            }
        });
        $form->setTitle($this->plugin->config->get("form-title"));
        $form->setContent($this->plugin->config->get("description"));
        $form->addButton($this->plugin->config->get("gm0-button"));
        $form->addButton($this->plugin->config->get("gm1-button"));
        $form->addButton($this->plugin->config->get("gm2-button"));
        $form->addButton($this->plugin->config->get("gm3-button"));
        $player->sendForm($form);
        return $form;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player){
            $sender->sendMessage($this->plugin->config->get("run-ingame"));
            return false;
        }
        if (!$sender->hasPermission("bettergamemode.gmform")){
             $sender->sendMessage($this->plugin->config->get("no-permission"));
            return false;
        }
        if ($sender instanceof Player) {
            $this->onGMUI($sender);
        }
    }

    public function getOwningPlugin(): Plugin
    {
        return $this->plugin;
    }
}