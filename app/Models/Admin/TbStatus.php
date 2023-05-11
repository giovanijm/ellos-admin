<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Carbon\Carbon;

class TbStatus extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tbstatus';

    protected $fillable = ['name', 'description', 'create_at', 'updated_at'];

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

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
