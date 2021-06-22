<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function likedTenders(){
        return $this->belongsToMany('App\tender', 'tender_likes', 'userId', 'tenderId')->orderBy('id', 'desc');
    }
    public function pinedTenders(){
        return $this->belongsToMany('App\tender', 'tender_pins', 'userId', 'tenderId')->orderBy('id', 'desc');
    }
    public function company(){
        return $this->belongsTo('App\company', 'companyId', 'id');
    }
    public function businessCategory(){
        return $this->belongsTo('App\business_category', 'businessCategoryId', 'id');
    }
    public function subscriptionPlan(){
        return $this->belongsTo('App\subscription_plan', 'subscriptionPlanId', 'id');
    }

    public function sendEmail($request){
        $to_name = $request->firstName.' '.$request->lastName;
        $to_email = $request->email;
        /*$data = array('name'=>$to_name, "body" => "<a href='".route('users.manageAccounts', $request->id)."' target='_blank'>".$request->password."</a> is your password and make sure to change it.");*/
        $data = array('name'=>$to_name, "body" => "<h3><u>".$request->password."</u> is your password and make sure to change it!</h3>");
        Mail::send('emails.mail', $data, function($message) use ($to_name,
        $to_email) {
        $message->to($to_email, $to_name)
        ->subject('TREB Registration Mail');
        $message->from('kidane10g@gmail.com','Account Registration Mail');
        });

        if( count(Mail::failures()) > 0 ) {

           $errorData="Email to ".$request->email." failed due to:  ";
           foreach(Mail::failures() as $email_failure) {
                $errorData=$errorData."<br".$email_failure;
                }

            \App\Global_var::logAction($request, $errorData);
        return false;
        } 

        return true;

    }
    public function unviwedInboxMessages(){
      return $this->belongsToMany('App\message', 'user_messages', 'recipientId', 'messageId')->where('isViewed', 'false')->orderBy('id', 'desc');
    }
    public function inboxMessages(){
      return $this->belongsToMany('App\message', 'user_messages', 'recipientId', 'messageId')->orderBy('id', 'desc');
    }
    public function outboxMessages(){
      return $this->belongsToMany('App\message', 'user_messages', 'senderId', 'messageId')->orderBy('id', 'desc');
    }

    public function sharedInbox_document_editions(){
      return $this->hasMany('App\shared_document_edition', 'sharedToUserId', 'id')->where('isViewed', 'false')->orderBy('id', 'desc');
    }
    public function sharedInbox_documents(){
      return $this->belongsToMany('App\document', 'shared_document_editions', 'sharedToUserId', 'documentId')->where('isViewed', 'false')->orderBy('id', 'desc');
    }
    public function sharedOutbox_document_editions(){
      return $this->belongsToMany('App\document', 'shared_document_editions', 'sharedToUserId', 'documentId')->orderBy('id', 'desc');
    }
    public function logs(){
        return $this->hasMany('App\log', 'userId', 'id');
    }
    public function documents(){
      return $this->hasMany('App\document', 'createdByUserId', 'id')->orderBy('id', 'desc');
    }
   public static function currentUser(){
        return Auth::guard('web')->user();
   }

//for documents
   public function isGranted_ID($routeName=null, $documentId){
        if($this->isAdmin())
            return true;

        $actionType=substr($routeName, strpos($routeName, '.')+1);
        $entityName="";

        if($actionType=='create_edition' || $actionType=='edit_edition')
            $actionType='edit';
        if($actionType=='confirm_delete_edition')
            $actionType='destroy';

        if($actionType=='show' || $actionType=='edit' || $actionType=='update' || $actionType=='delete' || $actionType=='destroy' || $actionType=='share' || $actionType=='download'){

            $actionType=$actionType=='edit'? 'update': $actionType;
            $actionType=$actionType=='delete'? 'destroy': $actionType;
$permission=role_document_permission::where('roleId', $this->roleId)->where('documentId', $documentId)->where($actionType, 1)->first();//1 for allowed
return $permission!=null;
}

    
    return false;
   }

//for crud resources
   public function isGranted($routeName){
        if($this->isAdmin())
            return true;

        $actionType=substr($routeName, strpos($routeName, '.')+1);
        $entityName="";

        if($actionType=='create_edition' || $actionType=='edit_edition')
            $actionType='edit';
        if($actionType=='confirm_delete_edition')
            $actionType='destroy';

        if($actionType=='create' || $actionType=='show' || $actionType=='edit' || $actionType=='update' || $actionType=='index' || $actionType=='store' || $actionType=='destroy'){
            
            $entityName=substr($routeName, 0, strpos($routeName, '.'));
            $pathUrl=str_replace('.', '-', $routeName);

        }
        else{
            $resource=Resource::where('routeName', '=', $routeName)->first();
            if($resource!=null){
                $pathUrl=$resource->entityName;
                if(!$this->isAllowed_ToAccess(null, $pathUrl))
                    return false;
            }
        }

    $resource=Resource::where('routeName', '=', $entityName)->first();
    if($resource!=null){
        if(!$this->isAllowed_ToAccess(null, $pathUrl))
            return false;
    }
    
    return true;
   }

    public function resources(){
        return $this->belongsToMany('App\Resource', 'user_resource', 'userId', 'resourceId')->withPivot('roleId');
    }

    public function role(){
        return $this->belongsTo('App\Role', 'roleId', 'id');
    }
    public function username(){
        return $this->userName;
    }

    public function region(){
        return $this->belongsTo('App\region', 'regionId', 'id');
    }
    public function zone(){
        return $this->belongsTo('App\zone', 'zoneId', 'id');
    }
    public function wereda(){
        return $this->belongsTo('App\wereda', 'weredaId', 'id');
    }
    public function school(){
        return $this->belongsTo('App\school', 'schoolId', 'id');
    }
    public function department(){
        return $this->belongsTo('App\department', 'departmentId', 'id');
    }



    public function isPriceEntry(){
        return $this->role!=null && $this->role->isPriceEntry();
    }
    public function isAdmin(){
        return $this->role!=null && $this->role->isAdmin();
    }
    public function isZoneAdmin(){
        return $this->role!=null && $this->role->isZoneAdmin();
    }
    public function isWeredaAdmin(){
        return $this->role!=null && $this->role->isWeredaAdmin();
    }
    public function isSchoolAdmin(){
        return $this->role!=null && $this->role->isSchoolAdmin();
    }
    public function isEducationalLeadership(){
        return $this->role!=null && $this->role->isEducationalLeadership();
    }
    public function isTeacher(){
        return $this->role!=null && $this->role->isTeacher();
    }
    public function isPublic(){
        return $this->role!=null && $this->role->isPublic();
    }

    public function isRegion(){
        return $this->adminLevel=="Regional Admin";
    }
    public function isZone(){
        return $this->adminLevel=="Zone Admin";
    }
    public function isWereda(){
        return $this->adminLevel=="Wereda Admin";
    }
    public function isSchool(){
        return $this->adminLevel=="School Admin";
    }
            
    public function zones(){
        if($this->isRegion())
            return $this->region->zones;
        if($this->isZone())
            return zone::where('id', $this->zoneId)->get();//single item
        
        return zone::where('id', '<', 0)->get();//empty collection
    }
    public function weredas(){
        if($this->isRegion())
            return $this->region->weredas;
        if($this->isZone())
            return $this->zone->weredas;
        if($this->isWereda())
            return wereda::where('id', $this->weredaId)->get();//single item
        
        return wereda::where('id', '<', 0)->get();//empty collection
    }
    public function schools(){
        if($this->isRegion())
            return $this->region->schools;
        if($this->isZone())
            return $this->zone->schools;
        if($this->isWereda())
            return $this->wereda->schools;
        if($this->isSchool())
            return school::where('id', $this->schoolId)->get();//single item
        
        return school::where('id', '<', 0)->get();//empty collection
    }

    public function createdByUser(){
        return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }
    public function updatedByUser(){
        return $this->belongsTo('App\User', 'updatedByUserId', 'id');
    }
    

// Access control
    public function isAllowed_ToAccess($request, $pathUrl=""){
        return true;
        
    if($this->role==null)
        return false;
    if($this->isAdmin())
        return true;

   if($pathUrl==""){
     if($request==null)
        return false; 
      $pathUrl=$request->path(); //$request->url();  
        }


    $separatorPos=strpos($pathUrl, '-');
    if($separatorPos>0){
    $entityName=substr($pathUrl, 0, $separatorPos);
            $slashPos=strpos($pathUrl, '/')>0? strpos($pathUrl, '/'): strlen($pathUrl);

            $actionType=substr($pathUrl, $separatorPos+1, $slashPos-$separatorPos-1);

        if($actionType=='create_edition' || $actionType=='edit_edition')
            $actionType='edit';
        if($actionType=='confirm_delete_edition')
            $actionType='destroy';


            $actionType=$actionType=='create'? 'store': $actionType;
            $actionType=$actionType=='edit'? 'update': $actionType;
            $actionType=$actionType=='confirm_delete'? 'destroy': $actionType;


            if($request!=null){
            if($entityName=='documents'){
                return $this->canAccessDocument($request, $actionType);
                }
            }

            $resource=Resource::where('entityName', '=', $entityName)->first();
            if($resource!=null){
            if(!$this->role->hasPermission($resource->id, $actionType)){
               return false;
            }
            }

        }
        else{
            $actionType='allow_action';
            $slashPos=strpos($pathUrl, '/')>0? strpos($pathUrl, '/'): strlen($pathUrl);
            $entityName=substr($pathUrl, 0, $slashPos);
            
            $resource=Resource::where('entityName', '=', $entityName)->first();
            if($resource!=null){
            if(!$this->role->hasPermission($resource->id, $actionType)){
               return false;
            }
            }
        }
        return true;
    }

    public function canAccessDocument($request, $actionType){
        return true;
 if($actionType!='show' && $actionType!='share' && $actionType!='edit' && $actionType!='update' && $actionType!='delete' && $actionType!='destroy' && $actionType!='download' && $actionType!='play'){
            return true;
            }

            $actionType=$actionType=='edit'? 'update': $actionType;
            $actionType=$actionType=='delete'? 'destroy': $actionType;
    
            $documentId=$request->route('id');
        if($actionType=='download'|| $actionType=='play'){  
            if($actionType=='play')
                $actionType='show';

            $editionId=$request->route('editionId');
            $document_edition=document_edition::find($editionId);
            if($document_edition!=null){
                $document=$document_edition->document;
                if($document!=null){
                    $documentId=$document->id;
                }
            }
        }

            if($documentId!=null){
                return $this->isGranted_ID('documents.'.$actionType, $documentId);
                /*$permitted=role_document_permission::where('roleId', $this->roleId)->where('documentId', $documentId)->where($actionType, 1)->first();
                return $permitted!=null;*/
            }

        return false;
    }

}
