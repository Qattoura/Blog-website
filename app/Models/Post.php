<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name' , 'quotation' , 'description' , 'last_update' ,'state' , 'email' , 'phone_number' , 'country_id'
    ];

    //with same name of related table
    public function country()
    {
        return $this->belongsTo(country::class);
    }

    public function postCreator()
    {
        return $this->belongsTo(country::class ,'country_id');
    }
}
