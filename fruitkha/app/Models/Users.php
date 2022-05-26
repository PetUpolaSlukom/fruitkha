<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = "user";
    protected $primaryKey = "id_user";
    public $timestamps = false;

    public function roles(){
        return $this->belongsTo(Role::class, "id_role", "id_user");
    }
}
