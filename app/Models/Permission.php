<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Permission extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['name', 'description', 'create_at', 'updated_at'];

    public $sortable = ['id',
                        'name',
                        'description',
                        'created_at',
                        'updated_at'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
