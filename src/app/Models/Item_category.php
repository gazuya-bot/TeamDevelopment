<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item_category extends Model
{
    protected $table = 'item_categories';

    protected $fillable = [ 
        'category_name',
    ];

    public $timestamps = false;

    public function point()
    {
        return $this->belongsTo('App\Models\Point_sale');
    }
}
