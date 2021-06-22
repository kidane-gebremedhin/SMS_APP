<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class message extends Authenticatable
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
    protected $table="messages";

    public function senders(){
      return $this->belongsToMany('App\User', 'user_messages', 'messageId', 'senderId')->where('isDeleted', 'false');
    }
    public function recipients(){
      return $this->belongsToMany('App\User', 'user_messages', 'messageId', 'recipientId')->where('isDeleted', 'false')->orderBy('id', 'desc');
    }
}
