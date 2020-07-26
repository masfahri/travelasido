<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutSiteModel extends Model
{
    protected $table = 'about_site';
    protected $fillable = [
        'name', 
        'email',
        'telf',
        'fax',
        'meta_social',
    ];
}
