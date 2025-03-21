<?php

namespace Database\Seeders\Pivot;

use App\Models\Managemenu\Submenu;
use Illuminate\Database\Seeder;
use App\Models\Manageuser\Role;

class RoleHasSubmenuSeeder extends Seeder
{
  public function run(): void
  {
    $roles = Role::whereIn('name', [
      'owner',
      'superadmin',
      'admin',
      'member'
    ])->get()->keyBy('name');

    $submenus = Submenu::whereIn('name', [
      'profile',
      'edit profile',
      'change password',

      'menu',
      'submenu',
      'permission',

      'device',

      'users',
      'roles',
      'permissions',

      'menus',
      'submenus'
    ])->get()->keyBy('name');

    $rolHasSubmenus = [
      'owner' => [
        'profile',
        'edit profile',
        'change password',

        'menu',
        'submenu',
        'permission',

        'device',

        'users',
        'roles',
        'permissions',

        'menus',
        'submenus'
      ],

      'superadmin' => [
        'profile',
        'edit profile',
        'change password',

        'menu',
        'submenu',
        'permission',

        'device',

        'users',
        'roles',
        'permissions',

        'menus',
        'submenus'
      ],

      'admin' => [
        'profile',
        'edit profile',
        'change password',
      ],

      'member' => [
        'profile',
        'edit profile',
        'change password',
      ],
    ];

    foreach ($rolHasSubmenus as $roleName => $submenuNames) {
      if (isset($roles[$roleName])) {
        $roles[$roleName]->submenus()->attach(
          collect($submenuNames)->mapWithKeys(
            fn($name) => [$submenus[$name]->id => []]
          )
        );
      }
    }
  }
}
