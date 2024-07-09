<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'quantity'
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(categories::class, 'category_id');
    }
}
