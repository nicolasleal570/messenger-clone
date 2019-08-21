<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{

    protected $appends = ['contact_name', 'contact_image'];
    
    public function getContactImageAttribute()
    {
        return '/users/'.$this->contact->avatar;
    }

    public function getContactNameAttribute()
    {
        return $this->contact->name;
    }

    public function contact()
    {
        return $this->belongsTo(User::class, 'contact_id');
    }

}
