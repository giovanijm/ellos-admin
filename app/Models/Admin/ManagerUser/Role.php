<?php

namespace App\Models\Admin\ManagerUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Kyslik\ColumnSortable\Sortable;

class Role extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['name', 'create_at', 'updated_at'];

    public $sortable = [
        'id',
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($name): bool
    {
        return $this->permissions()->where('name', $name)->exists();
    }
}
