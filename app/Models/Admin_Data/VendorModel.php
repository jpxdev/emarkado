<?php

namespace App\Models\Admin_Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorModel extends Model
{
    use HasFactory;
    protected $table = 'vendors';
    protected $fillable = [
        'id',
        'user_id',
        'authorized_representative',
        'coop_name',
        'address',
        'contact_number',
        'email',
        'profile_picture',
        'valid_id_picture',
        'agency_affiliation',
        'agency_affiliation_name',
        'username',
        'password',
        'user_role',
        'status',
        'approved_by',
        'date',
        'created_at',
        'updated_at'
    ];
}
