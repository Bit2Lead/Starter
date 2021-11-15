<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signin_model extends Model
{
    protected $table = 'users';
    use HasFactory;

    public function user_check()
    {
        echo "user checking";
    }
}
