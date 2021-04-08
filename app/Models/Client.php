<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone', 'name',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
