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

        Server::getInstance()->getCommandMap()->registerAll('BetterGM',[

                 new gm0(),

                 new gm1(),

                 new gm2(),

                 new gm3(),

            ]);

    }
}
