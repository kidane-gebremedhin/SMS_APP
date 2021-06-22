<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kebelle extends Model
{
    protected $table='kebelles';

    public function region(){
        return $this->belongsTo('App\region', 'regionId', 'id');
    }
    public function zone(){
        return $this->belongsTo('App\zone', 'zoneId', 'id');
    }
    
    public function wereda(){
        return $this->belongsTo('App\wereda', 'weredaId', 'id');
    }
    public function tabya(){
        return $this->belongsTo('App\tabya', 'tabyaId', 'id');
    }
    
  public function createdByUser(){
      return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }

    public function ksi_mezgebat(){
      return $this->hasMany('App\ksi_mezgeb', 'kebelleId', 'id')->orderBy('id', 'desc');
    }
}
