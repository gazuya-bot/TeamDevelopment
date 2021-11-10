<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point_sale extends Model
{
    protected $table = 'points';

    protected $fillable = [
        'member_id',
        'category_id',
        'date',
        'sale',
        'get_point',
        'delete_flag',
        'updated_at'
    ];

    public $timestamps = false;

    public function member_list()
    {
        return $this->belongsTo('App\Models\Member_list');
    }
}
