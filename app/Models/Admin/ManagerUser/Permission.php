<?php

namespace App\Models\Admin\ManagerUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Carbon\Carbon;

class Permission extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name',
        'description',
    ];

    public $sortable = [
        'id',
        'name',
        'description',
    ];

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('d/m/Y - H:i:s');
    }

    public function getUpdatedAtAttribute($updated_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $updated_at)->format('d/m/Y - H:i:s');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
