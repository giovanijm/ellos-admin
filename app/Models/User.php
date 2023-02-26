<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Admin\ManagerUser\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role_id',
        'active',
        'create_at',
        'updated_at',
    ];

    public $sortable = [
        'id',
        'name',
        'email',
        'role_id',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('d/m/Y - H:i:s');
    }

    public function getUpdatedAtAttribute($updated_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $updated_at)->format('d/m/Y - H:i:s');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($name): bool
    {
        return $this->role()->where('name', $name)->exists();
    }
}
