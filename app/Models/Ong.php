<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ong extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'cif';

    protected $fillable = [
        'cif',
        'nom',
        'adreca',
        'poblacio',
        'comarca',
        'tipus_ong',
        'utilpublicgencat',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];
}
