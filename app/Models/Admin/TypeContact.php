<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Carbon\Carbon;

class TypeContact extends Model
{
    use HasFactory, Sortable;

    protected $table = 'type_contacts';

    protected $fillable = ['name', 'create_at', 'updated_at'];

    public $sortable = [
        'id',
        'name',
    ];

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('d/m/Y - H:i:s');
    }

    public function getUpdatedAtAttribute($updated_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $updated_at)->format('d/m/Y - H:i:s');
    }

    public function customer_contacts()
    {
        return $this->hasMany(CustomerContacts::class);
    }
}
