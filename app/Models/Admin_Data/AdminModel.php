<?php

namespace App\Models\Admin_Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AdminModel extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'user_role',
        'created_at',
    ];

}
