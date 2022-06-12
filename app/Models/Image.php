<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    public $table = 'images';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'image_file',
        'brand',
        'camera',
        'software',
        'size',
        'width',
        'height',
        'aperture',
        'shutter_speed',
        'iso',
        'focal_length',
        'lens',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}