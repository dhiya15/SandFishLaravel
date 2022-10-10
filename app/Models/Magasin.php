<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'logo',
        'name',
        'title',
        'description',
        'footer_short_des',
        'phone',
        'fax',
        'email',
        'country',
        'post_code',
        'address',
        'website',
        'twitter',
        'facebook',
        'instagram',
        'google_plus',
        'latitude',
        'longitude',
        'working_days',
        'working_hours',
        'website_under_maintenance'
    ];

}
