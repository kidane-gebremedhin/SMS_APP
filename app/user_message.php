<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user_message extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table="user_messages";

    public function sentByUser(){
        return $this->belongsTo('App\user', 'senderId', 'id');
    }
    public function sentToUser(){
        return $this->belongsTo('App\user', 'recipientId', 'id');
    }
}
