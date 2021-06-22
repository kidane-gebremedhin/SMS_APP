<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class document extends Authenticatable
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
    protected $table="documents";

    public function views_per_role($roleId){
      $view_count=0;
      foreach ($this->editions as $edition) {
        $view_count+=$edition->views_per_role($roleId);
      }
      return $view_count;
    }
    
    public function views(){
      $view_count=0;
      foreach ($this->editions as $edition) {
        $view_count+=$edition->views_count();
      }
      return $view_count;
    }

    public function shares(){
      return $this->hasMany('App\shared_document_edition', 'documentId', 'id')->orderBy('id', 'desc');
    }

    public function isVideo_Audio(){
        return $this->category=='Audio' || $this->category=='Video';
    }
    public function isVideo(){
        if($this->document==null)
            return false;

        return $this->document->category=='Video';
    }
    public function isAudio(){
        if($this->document==null)
            return false;

        return $this->document->category=='Audio';
    }
    public function isText_Image(){
        return $this->category=='News_Paper' || $this->category=='Magazine' || $this->category=='Book' || $this->category=='Text_Document' || $this->category=='Image';
    }
    public function editions(){
      return $this->hasMany('App\document_edition', 'documentId', 'id')->where('isDeleted', 'false')->orderBy('id', 'desc');
    }
    public function publishers(){
      return $this->hasMany('App\publisher', 'documentId', 'id')->where('isDeleted', 'false')->orderBy('id', 'desc');
    }

    public function configuredRole_Resources(){
        return $this->hasMany('App\role_document_permission', 'documentId', 'id');
    }

    public function hasFull_Permission($actionType){
            $roles=Role::where('isDeleted', '=', 'false')->get();
            $configuredResources=$this->configuredRole_Resources;
       
        if(count($configuredResources->where($actionType, '=', 1))>=count($roles))
            return true;
        return false;
    }

    public function createdByUser(){
        return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
    public function author(){
        return $this->belongsTo('App\author', 'authorId', 'id');
    }
    public function updatedByUser(){
        return $this->belongsTo('App\User', 'updatedByUserId', 'id');
    }
    public function approvedByUser(){
        return $this->belongsTo('App\User', 'approvedByUserId', 'id');
    }
    public function archivedByUser(){
        return $this->belongsTo('App\User', 'archivedByUserId', 'id');
    }
    public function deletedByUser(){
        return $this->belongsTo('App\User', 'deletedByUserId', 'id');
    }
}
