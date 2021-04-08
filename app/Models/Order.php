<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'address', 'rate', 'delivery_day',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
