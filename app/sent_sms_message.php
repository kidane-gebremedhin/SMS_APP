<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Session;

class sent_sms_message extends Model
{
    protected $table="sent_sms_messages";

  public function category(){
    	return $this->belongsTo('App\recipient_category', 'categoryId', 'id');
    }

  public function recipient(){
    	return $this->belongsTo('App\recipient', 'recipientId', 'id');
    }

  public function createdByUser(){
    	return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
    
}
