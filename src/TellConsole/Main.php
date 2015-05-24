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
			if(!$sender->hasPermission("tc.command.tc")){
				$sender->sendMessage("You don't have permission to do that!");
				return false;
			}else{
				if(!isset($args[0])){
					$sender->sendMessage("Usage: /tc <message>");
					return true;
				}else{
					$message = implode(" ", $args);
					$player = $sender->getDisplayName();
					$this->getLogger()->info(TextFormat::GREEN . "[TellConsole] " .$player. ": " .$message);
					$sender->sendMessage("[TellConsole] Me -> CONSOLE: " .$message);
					return true;
				}
			}
		}
	}
}
