<?php

use App\Models\Permission;
/**
 * Register Route Permissions
 */

Artisan::command('register-permissions', function () {

    $isProtectedByAcl = function($route) {
        foreach ($route->gatherMiddleware() as $middleware) {
            if(strpos($middleware, 'acl') !== false) {
                return true;
            }
        }
    };

    foreach(app('router')->getRoutes()->getIterator() as $route) {
        if($isProtectedByAcl($route)) {
            $actions[] = $route->getName();
        }
    }

    $actions = array_filter($actions);

    $actions = array_map(function($name) {
        return [
            'name' => $name,
            'title' => ucwords(str_replace(['.', '-', '_'], ' ', $name))
        ];
    }, $values = array_values($actions));

    foreach ($actions as $action) {
        $permission = Permission::updateOrCreate($action);
    }

    $this->comment("Permissions Generated!");

})->describe('Registers route permissions.');



