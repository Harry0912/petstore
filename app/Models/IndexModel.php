<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndexModel extends Model
{
    use HasFactory;

    protected $table = 'main';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'title', 'tel', 'fax', 'email', 'address'
    ];
}
