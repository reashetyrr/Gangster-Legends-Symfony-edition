<?php


namespace App\Entity;


class ModulesList
{
    private $modules = [];

    public function addModule(Module $module): self
    {
        if (!in_array($module, $this->modules))
            $this->modules []= $module;
        return $this;
    }

    public function removeModule(Module $module): self
    {
        foreach ($this->modules as $key => $mod) {
            if ($mod == $module)
                unset($this->modules[$key]);
        }
        return $this;
    }

    /**
     * @var Module[] $modules_list The array of modules fetched from the db to merge
     * @return ModulesList
     */
    public function mergeModules($modules_list): self
    {
        $this->modules = array_merge($this->modules, $modules_list);
        return $this;
    }

    public function getModules() {
        return $this->modules;
    }
}