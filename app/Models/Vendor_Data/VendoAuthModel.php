<?php

namespace App\Models\Vendor_Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendoAuthModel extends Model
{

    use HasFactory;
    protected $table = "vendors";
    protected $fillable = [
        'username',
        'password',
    ];

}
