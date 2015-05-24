<?php

namespace TellConsole;

use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
	public function onEnable(){
		$this->getLogger()->info(TextFormat::BLUE . "TellConsole enabled");
	}
	public function onDisable(){
		$this->getLogger()->info(TextFormat::RED . "TellConsole disabled");
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		if(strtolower($command->getName()) === "tc"){
			if($sender instanceof Player){
				if($sender->hasPermission("tc") || $sender->hasPermission("tc.command") || $sender->hasPermission("tc.command.tc")){
					if($args[0] isset){
						$message = implode($args[0]);
						$this->getLogger()->info(TextFormat::GREEN . "[TellConsole] " .$sender. ": " .$message);
						return true;
					}else{
						$sender->sendMessage("Usage: /tc <message>");
						return true;
					}
				}else{
					$sender->sendMessage("You don't have permission to do that!");
					return true;
				}
			}else{
				$sender->sendMessage(TextFormat::YELLOW . "Please run that command in-game");
				return true;
			}
		}
	}
}
