<?php


namespace App\Service;


use App\Entity\ModulesList;
use App\Entity\Module;

class MenuTemplater
{
    public function generateMenu(ModulesList $modulesList) {
        $full_menu_structure = [];
        /**
         * @var Module $module A single Module.
         */
        foreach ($modulesList->getModules() as $module) {
            $menu_structure = $module->getMenuStructure();
            if ($menu_structure) {
                $full_menu_structure = array_merge($full_menu_structure, $menu_structure);
            }
        }
        return $full_menu_structure;
    }
}