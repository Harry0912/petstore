<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'type';
    protected $primaryKey = 'type_id';

    public $timestamps = false;

    protected $fillable = ['type_name'];

    public function product()
    {
        return $this->hasMany(ProductModel::class, 'type_id', 'type_id');
    }
}
