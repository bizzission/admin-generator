<?php

namespace Brackets\AdminGenerator\Generate\Traits;

use Nwidart\Modules\Facades\Module;

trait Modules
{
    public function getModulePath($moduleName)
    {
        $modulesPath = $this->laravel['modules']->config('paths');

        return $modulesPath['modules']
            . DIRECTORY_SEPARATOR
            .  $moduleName;
    }

    public function getModuleDirPath($moduleName, $dir)
    {
        $modulesPath = $this->laravel['modules']->config('paths');

        return $this->getModulePath($moduleName)
            . DIRECTORY_SEPARATOR
            . $modulesPath['generator'][$dir]['path'];
    }

    public function getViewNamespace($routes = false)
    {
        if ($this->hasOption('module-name')) {
            $module = Module::findOrFail($this->option('module-name'));
            return $module->getLowerName() . ($routes ? '/' : '::');
        }

        return '';
    }
}
