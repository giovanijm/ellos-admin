<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Carbon\Carbon;

class ProviderContacts extends Model
{
    use HasFactory, Sortable;

    protected $table = 'provider_contacts';

    protected $fillable = ['typeContactId', 'providerId', 'contactName', 'contact', 'create_at', 'updated_at'];

    public $sortable = [
        'id',
        'typeContactId',
        'providerId',
        'contactName',
        'contact',
    ];

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('d/m/Y - H:i:s');
    }

    public function getUpdatedAtAttribute($updated_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $updated_at)->format('d/m/Y - H:i:s');
    }

    public function typeContact()
    {
        return $this->belongsTo(TypeContact::class, 'typeContactId', 'id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'providerId', 'id');
    }
}
