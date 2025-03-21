<?php

namespace Database\Seeders\Managemenu;

use Illuminate\Database\Seeder;
use App\Models\Managemenu\Submenu;

class SubmenuSeeder extends Seeder
{
  public function run(): void
  {
    $submenus = [
      [
        'menu_id' => 1,
        'ssm' => 1,
        'name' => 'owner',
        'route' => '/owner',
        'active' => 'owner',
        'routename' => '/owner',
        'description' => 'submenu dashboard owner'
      ],

      [
        'menu_id' => 2,
        'ssm' => 1,
        'name' => 'superadmin',
        'route' => '/superadmin',
        'active' => 'superadmin',
        'routename' => '/superadmin',
        'description' => 'submenu dashboard superadmin'
      ],

      [
        'menu_id' => 3,
        'ssm' => 1,
        'name' => 'admin',
        'route' => '/admin',
        'active' => 'admin',
        'routename' => '/admin',
        'description' => 'submenu dashboard admin'
      ],

      [
        'menu_id' => 4,
        'ssm' => 1,
        'name' => 'member',
        'route' => '/member',
        'active' => 'member',
        'routename' => '/member',
        'description' => 'submenu dashboard member'
      ],

      [
        'menu_id' => 5,
        'ssm' => 1,
        'name' => 'profile',
        'route' => '/profile',
        'active' => 'profile',
        'routename' => '/profile',
        'description' => 'submenu user profile'
      ],
      [
        'menu_id' => 5,
        'ssm' => 2,
        'name' => 'edit profile',
        'route' => '/profile/edit',
        'active' => 'profile/edit',
        'routename' => '/profile/edit',
        'description' => 'submenu user edit profile'
      ],
      [
        'menu_id' => 5,
        'ssm' => 3,
        'name' => 'change password',
        'route' => '/change/password',
        'active' => 'change/password',
        'routename' => '/change/password',
        'description' => 'submenu user change password'
      ],

      [
        'menu_id' => 6,
        'ssm' => 1,
        'name' => 'menu',
        'route' => '/ma-menu',
        'active' => 'ma-menu',
        'routename' => '/ma-menu',
        'description' => 'submenu access menu'
      ],
      [
        'menu_id' => 6,
        'ssm' => 2,
        'name' => 'submenu',
        'route' => '/ma-submenu',
        'active' => 'ma-submenu',
        'routename' => '/ma-submenu',
        'description' => 'submenu access submenu'
      ],
      [
        'menu_id' => 6,
        'ssm' => 3,
        'name' => 'permission',
        'route' => '/ma-permission',
        'active' => 'ma-permission',
        'routename' => '/ma-permission',
        'description' => 'submenu access permission'
      ],

      [
        'menu_id' => 7,
        'ssm' => 1,
        'name' => 'device',
        'route' => '/device',
        'active' => 'device',
        'routename' => '/device',
        'description' => 'submenu data device'
      ],

      [
        'menu_id' => 8,
        'ssm' => 1,
        'name' => 'users',
        'route' => '/users',
        'active' => 'users',
        'routename' => '/users',
        'description' => 'submenu data user'
      ],
      [
        'menu_id' => 8,
        'ssm' => 2,
        'name' => 'roles',
        'route' => '/roles',
        'active' => 'roles',
        'routename' => '/roles',
        'description' => 'submenu data role'
      ],
      [
        'menu_id' => 8,
        'ssm' => 3,
        'name' => 'permissions',
        'route' => '/permissions',
        'active' => 'permissions',
        'routename' => '/permissions',
        'description' => 'submenu data permission'
      ],

      [
        'menu_id' => 9,
        'ssm' => 1,
        'name' => 'menus',
        'route' => '/menus',
        'active' => 'menus',
        'routename' => '/menus',
        'description' => 'submenu data menu'
      ],

      [
        'menu_id' => 9,
        'ssm' => 2,
        'name' => 'submenus',
        'route' => '/submenus',
        'active' => 'submenus',
        'routename' => '/submenus',
        'description' => 'submenu data submenu'
      ],
    ];

    foreach ($submenus as $submenu) {
      Submenu::create($submenu);
    }
  }
}
