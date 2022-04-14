<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'product';
    protected $primaryKey = 'product_id';

    public $timestamps = false;

    protected $fillable = [
        'type_id', 'product_name', 'product_intro', 'product_content', 'on_sale', 'product_price', 'product_sale', 'product_image'
    ];

    public function type()
    {
        return $this->belongsTo(TypeModel::class, 'type_id', 'type_id');
    }
}
