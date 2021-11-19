<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member_list extends Model
{
    protected $table = 'members_lists';

    protected $fillable = [ 
        'club_name',
        'email',
        'address',
        'name',
        'tel',
        'fax',
        'memo'
    ];
}
