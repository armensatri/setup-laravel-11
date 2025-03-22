<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Backend\Access\AccessController;
use App\Http\Controllers\Backend\Blocked\BlockedController;

use App\Http\Controllers\Auth\{
  LoginController,
  LogoutController,
  RegisterController,
};

use App\Http\Controllers\Backend\Dashboard\{
  AdminController,
  MemberController,
  OwnerController,
  SuperadminController,
};

use App\Http\Controllers\Backend\Managemenu\{
  MenusController,
  SubmenusController
};

use App\Http\Controllers\Backend\Manageuser\{
  UsersController,
  RolesController,
  PermissionsController,
};

use App\Http\Controllers\Backend\Account\{
  ProfileController,
  EditprofileController,
  ChangepasswordController,
};

use App\Http\Controllers\Backend\Manageaccess\{
  MenuController,
  SubmenuController,
  PermissionController,
};

/*---------------------------------------------------------------
// * ROUTE AUTH
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE LOGIN & REGISTER ✅
|---------------------------------------------------------------*/

Route::group(
  ['middleware' => ['guest']],
  function () {
    Route::controller(LoginController::class)->group(
      function () {
        Route::get('/auth/login', 'index')->name('login');
        Route::post('/auth/login', 'store')->name('login.store');
      }
    );

    Route::controller(RegisterController::class)->group(
      function () {
        Route::get('/auth/register', 'index')->name('register');
        Route::post('/auth/register', 'store')->name('register.store');
      }
    );
  }
);

/*---------------------------------------------------------------
| ROUTE LOGOUT ✅
|---------------------------------------------------------------*/

Route::group(
  ['middleware' => ['auth']],
  function () {
    Route::post('/auth/logout', [LogoutController::class, 'logout'])
      ->name('logout');
  }
);

/*---------------------------------------------------------------
// * ROUTE FRONTEND
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE HOME ✅
|---------------------------------------------------------------*/

Route::get('/', [HomeController::class, 'index'])
  ->name('home');

/*---------------------------------------------------------------
// * ROUTE BACKEND
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE DRAFT
|---------------------------------------------------------------*/



/*---------------------------------------------------------------
| ROUTE SLUG
|---------------------------------------------------------------*/

Route::group(
  ['middleware' => ['auth']],
  function () {
    Route::get('/roles/slug', [RolesController::class, 'slug']);
  }
);

/*---------------------------------------------------------------
| ROUTE ACCESS ✅
|---------------------------------------------------------------*/

Route::group(
  ['middleware' => ['auth', 'permission']],
  function () {
    Route::controller(AccessController::class)->group(
      function () {
        Route::get('/access/menu/{id}/{name}', 'amenu')
          ->name('a.menu');
        Route::post('/access/camenu', 'camenu')
          ->name('ca.menu');

        Route::get('/access/submenu/{id}/{name}', 'asubmenu')
          ->name('a.submenu');
        Route::post('/access/casubmenu', 'casubmenu')
          ->name('ca.submenu');

        Route::get('/access/permission/{id}/{name}', 'apermission')
          ->name('a.permission');
        Route::post('/access/capermission', 'capermission')
          ->name('ca.permission');
      }
    );
  }
);

/*---------------------------------------------------------------
| ROUTE ACCOUNT ✅
|---------------------------------------------------------------*/

Route::group(
  ['middleware' => ['auth', 'permission']],
  function () {
    Route::get('/profile', [ProfileController::class, 'show'])
      ->name('profile');

    Route::get('/profile/edit', [EditprofileController::class, 'edit'])
      ->name('profile.edit');
    Route::put('/profile/update', [EditprofileController::class, 'update'])
      ->name('profile.update');

    // Route untuk menampilkan form change password
    Route::get('/password', [ChangepasswordController::class, 'index'])->name('password');

    // Route untuk memproses update password
    Route::patch('/password/update', [ChangepasswordController::class, 'update'])->name('password.update');
  }
);

/*---------------------------------------------------------------
| ROUTE BLOCKED ✅
|---------------------------------------------------------------*/

Route::get('/blocked', [BlockedController::class, 'blocked'])
  ->name('blocked');
Route::get('/permission-blocked', [BlockedController::class, 'blockedpermission'])->name('blocked-permission');

/*---------------------------------------------------------------
| ROUTE DASHBOARD ✅
|---------------------------------------------------------------*/

Route::group(
  ['middleware' => ['auth']],
  function () {
    Route::get('/owner', [OwnerController::class, 'index'])
      ->name('owner');

    Route::get('/superadmin', [SuperadminController::class, 'index'])
      ->name('superadmin');

    Route::get('/admin', [AdminController::class, 'index'])
      ->name('admin');

    Route::get('/member', [MemberController::class, 'index'])
      ->name('member');
  }
);

/*---------------------------------------------------------------
| ROUTE MANAGEACCESS ✅
|---------------------------------------------------------------*/

Route::group(
  ['middleware' => ['auth', 'permission']],
  function () {
    Route::get('/menu', [MenuController::class, 'index'])
      ->name('menu');

    Route::get('/submenu', [SubmenuController::class, 'index'])
      ->name('submenu');

    Route::get('/permission', [PermissionController::class, 'index'])
      ->name('permission');
  }
);

/*---------------------------------------------------------------
| ROUTE MANAGEDATA
|---------------------------------------------------------------*/

Route::group(
  ['middleware' => ['auth']],
  function () {
    //
  }
);

/*---------------------------------------------------------------
| ROUTE MANAGEMENU ✅
|---------------------------------------------------------------*/

Route::group(
  ['middleware' => ['auth', 'permission']],
  function () {
    Route::resources([
      '/menus' => MenusController::class,
      '/submenus' => SubmenusController::class
    ]);
  }
);

/*---------------------------------------------------------------
| ROUTE MANAGEUSER ✅
|---------------------------------------------------------------*/

Route::group(
  ['middleware' => ['auth', 'permission']],
  function () {
    Route::resources([
      '/users' => UsersController::class,
      '/roles' => RolesController::class,
      '/permissions' => PermissionsController::class
    ]);
  }
);
