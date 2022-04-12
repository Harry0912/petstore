<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'feedback';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name', 'tel', 'email', 'notes'
    ];
}
