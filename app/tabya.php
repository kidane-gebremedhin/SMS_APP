<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabya extends Model
{
    protected $table='tabyas';

    public function zone(){
        return $this->belongsTo('App\zone', 'zoneId', 'id');
    }
    
    public function wereda(){
        return $this->belongsTo('App\wereda', 'weredaId', 'id');
    }
    
    public function region(){
        return $this->belongsTo('App\region', 'regionId', 'id');
    }
    
    public function kebelles(){
      return $this->hasMany('App\kebelle', 'tabyaId', 'id')->orderBy('id', 'desc');
    }
  public function createdByUser(){
      return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }

    public function ksi_mezgebat(){
      return $this->hasMany('App\ksi_mezgeb', 'tabyaId', 'id')->orderBy('id', 'desc');
    }

}
