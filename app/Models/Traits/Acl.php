<?php

namespace App\Models\Traits;

trait Acl
{
    /**
     * This method accepts an array of arrays, i.e: ['p1', ['p2','p3']]
     * Also it accepts something like the following: ['p1', 'p2|p3']
     * Also it accepts something like the following: 'p1', 'p2|p3'
     * In all cases above, p1 is required and also p2 or p3 is required.
     * So, think that as: if(user::hasPermissions(p1 && (p2 || p3))
     * @param  Array  $permissions
     * @return boolean If user has required permission(s).
     */
    public function hasPermission($permissions)
    {
        if($this->isSuperMan()) return true;

        $userPermissions = $this->getPermissionNames();
        $permissions = is_array($permissions) ? $permissions : func_get_args();
        foreach($permissions as $permission) {
            $permission = is_array($permission) ? $permission : explode('|', $permission);
            $permission = array_map('trim', $permission);
            $result[] = array_intersect($permission, $userPermissions);
        }
        return count(array_filter($result)) === count($permissions);
    }

    /**
     * Get all assigned permissions of the user.
     * @return Array Unique Permissions
     */
    public function getPermissionNames()
    {
        $slugsArray = array_map(function ($permission) {
            return array_pluck($permission, 'name');
        }, $this->roles->pluck('permissions')->toArray());

        return array_map('strtolower', array_unique(array_flatten($slugsArray)));
    }

    public function getPermissions()
    {
        return $this->roles->pluck('permissions')->first();
    }
}