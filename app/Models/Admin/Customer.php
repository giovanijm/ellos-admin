<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory, Sortable;

    protected $table = 'customers';

    protected $fillable = [
        'fullName',
        'socialName',
        'documentNumber',
        'birthDate',
        'postalCode',
        'address',
        'addressNumber',
        'complement',
        'neighborhood',
        'city',
        'state',
        'statusId',
        'origin',
        'observation',
        'photo',
        'create_at',
        'updated_at'
    ];

    public $sortable = [
        'fullName',
        'socialName',
        'documentNumber',
        'birthDate',
        'postalCode',
        'address',
        'addressNumber',
        'neighborhood',
        'city',
        'state',
        'statusId',
        'origin',
    ];

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('d/m/Y - H:i:s');
    }

    public function getUpdatedAtAttribute($updated_at)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $updated_at)->format('d/m/Y - H:i:s');
    }

    public function getBirthDateAttribute($birth_date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $birth_date)->format('d/m/Y');
    }

    public function getDocumentNumberAttribute($document_number)
    {
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/','$1.$2.$3-$4', $document_number);
    }

    public function setDocumentNumberAttribute($document_number)
    {
        return preg_replace("/[^0-9]/", "", $document_number);
    }

    public function getPostalCodeAttribute($postal_code)
    {
        return preg_replace('/(\d{2})(\d{3})(\d{3})/','$1.$2-$3', $postal_code);
    }

    public function setPostalCodeAttribute($postal_code)
    {
        return preg_replace("/[^0-9]/", "", $postal_code);
    }

    public function status()
    {
        return $this->belongsTo(TbStatus::class, 'statusId', 'id');
    }

    public function contacts()
    {
        return $this->hasMany(CustomerContacts::class, 'customerId');
    }
}
