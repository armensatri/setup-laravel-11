<?php

namespace App\Models\Manageuser;

use App\Helpers\RandomUrl;
use App\Models\Manageuser\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Permission extends Model
{
  protected $table = 'permissions';

  protected $fillable = [
    'name',
    'url',
    'guard_name'
  ];

  public function getRouteKeyName()
  {
    return 'url';
  }

  public function roles()
  {
    return $this->belongsToMany(
      Role::class,
      'role_has_permission',
      'role_id',
      'permission_id'
    );
  }

  protected static function boot()
  {
    parent::boot();

    static::saving(function ($permission) {
      if (empty($permission->url)) {
        do {
          $url = RandomUrl::GenerateUrl();
        } while (Permission::where('url', $url)->exists());

        $permission->url = $url;
      }
    });
  }

  public function scopeSearch(Builder $query, array $filters): void
  {
    $fields = ['name'];

    $query->when(
      $filters['search'] ?? false,
      fn($query, $search) =>
      $query->where(function ($query) use ($search, $fields) {
        foreach ($fields as $field) {
          $query->orWhere($field, 'like', '%' . $search . '%');
        }
      })
    );
  }
}
