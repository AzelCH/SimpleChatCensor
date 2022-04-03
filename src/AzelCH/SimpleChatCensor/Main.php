<?php

namespace AzelCH\SimpleChatCensor;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

use function str_replace;

class Main extends PluginBase implements Listener {
  
  public function onEnable(): void{
    $this->saveResource("config.yml");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onChat(PlayerChatEvent $e){
    $p = $e->getPlayer();
    $allcfg = $this->getConfig()->getAll();
    $msg = str_replace($allcfg["badwords"], $this->getConfig()->get("replace-format"), $e->getMessage());
    $e->setMessage($msg);

  }
  
}
