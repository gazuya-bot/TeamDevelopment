<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point_sale extends Model
{
    protected $table = 'points';

    protected $fillable = [
        'is_delete',
        'member_id',
        'date',
        'sale',
        'pay_point',
        'get_point',
        'updated_at'
    ];

    public $timestamps = false;

    public function member_list()
    {
        return $this->belongsTo('App\Models\Member_list');
    }
}
