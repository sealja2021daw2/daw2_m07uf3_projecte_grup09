<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntari extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'nif';

    protected $fillable = [
        'nif',
        'edat',
        'professio',
        'h_dedicades'
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
