<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\message;
use App\user_message;
use App\User;
use Auth;
use DB;
use Session;

class messageController extends Controller
{
    public $paginationSize;

    public function __construct(){
        $this->middleware('auth:web');
    
     $this->paginationSize=DB::table('settings')->first()!=null? DB::table('settings')->first()->paginationSize: 10;        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function inbox(Request $request, $userId)
    {
    $user=User::find($userId);
    $inboxMessages=message::whereIn('id', $user->inboxMessages->pluck('id'))->orderBy('id', 'desc')->paginate($this->paginationSize);
    $outboxMessages=message::whereIn('id', $user->outboxMessages->pluck('id'))->orderBy('id', 'desc')->paginate($this->paginationSize);

    $currentUser=Auth::guard('web')->user();
    $user_messages=user_message::where('recipientId', $currentUser->id)->where('isViewed', 'false')->orderBy('id', 'desc')->get();
    foreach ($user_messages as $user_message) {
        $user_message->isViewed='true';
        $user_message->save();  
    }

    \App\Global_var::logAction($request, 'Viewed inbox messages of user: '.$user->email);
    if($request->ajax())
        return view("messages.ajax.inbox")->with('inboxMessages', $inboxMessages)->with('outboxMessages', $outboxMessages);

       return view("messages.http.inbox")->with('inboxMessages', $inboxMessages)->with('outboxMessages', $outboxMessages);
    }

    public function outbox(Request $request, $userId)
    {
    $user=User::find($userId);
    $inboxMessages=message::whereIn('id', $user->inboxMessages->pluck('id'))->orderBy('id', 'desc')->paginate($this->paginationSize);
    $outboxMessages=message::whereIn('id', $user->outboxMessages->pluck('id'))->orderBy('id', 'desc')->paginate($this->paginationSize);

    \App\Global_var::logAction($request, 'Viewed outbox messages of user: '.$user->email);
    if($request->ajax())
        return view("messages.ajax.outbox")->with('inboxMessages', $inboxMessages)->with('outboxMessages', $outboxMessages);

       return view("messages.http.outbox")->with('inboxMessages', $inboxMessages)->with('outboxMessages', $outboxMessages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Request $request){
    $currentUser=Auth::guard('web')->user();

        $users=User::where('isDeleted', 'false')->where('isApproved', 'true')->where('id', '!=', $currentUser->id)->orderBy("id", "desc")->pluck('email', 'id')->toArray();
        if($request->ajax())
            return view("messages.ajax.create")->with('users', $users);

           return view("messages.http.create")->with('users', $users);
    }


    /**
     * Stock a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject'=>'required',
            'body'=>'required',
            'userIds'=>'required',
            ]);
        $message=new message;
        $message->subject=$request->subject;
        $message->body=$request->body;
        $message->save();

        $userIds=$request->userIds;
        foreach ($userIds as $userId) {
            $user_message=new user_message;
            $user_message->messageId=$message->id;
            $user_message->recipientId=$userId;
            $user_message->senderId=Auth::guard('web')->user()->id;
            $user_message->save();
        }
        
    \App\Global_var::logAction($request, 'Message sent to '.count($userIds).' users. User IDs: '.print_r($userIds));

    Session::flash("success", "Message sent successfully ");

    return redirect()->route('messages.outbox', Auth::guard('web')->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_inbox($id, Request $request)
    {
        $message=message::find($id);

        $currentUser=Auth::guard('web')->user();
        $user_message=user_message::where('messageId', $id)->where('recipientId', $currentUser->id)->orderBy('id', 'desc')->first();
        if($user_message!=null){
            $user_message->isViewed='true';
            $user_message->save();            
        }

    \App\Global_var::logAction($request, 'Viewed inbox message ID '.$message->id.' details');
        if($request->ajax())
            return view("messages.ajax.show_inbox")->with('message', $message);
        return view("messages.http.show_inbox")->with('message', $message);
    }
    public function show_outbox($id, Request $request)
    {
        $message=message::find($id);

    \App\Global_var::logAction($request, 'Viewed outbox message ID '.$message->id.' details');
        if($request->ajax())
            return view("messages.ajax.show_outbox")->with('message', $message);
        return view("messages.http.show_outbox")->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
    $message=message::find($id);
        
    if($request->ajax())
        return view('messages.ajax.edit')->with('message', $message);

        return view('messages.http.edit')->with('message', $message);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=message::where('name', '=', $request->name)->first();
        if($message!=null && $message->id!=$id){
            if($request->ajax())
                return ['error', "Duplicate_Entry"];
            return back();
        }

       $this->validate($request, [
            'name'=>'required'
            ]);
        $message=message::find($id);
        $message->name=$request->name;
        $message->remark=$request->remark;
        $message->updatedByUserId=Auth::guard('web')->user()->id;
        $message->save();

    \App\Global_var::logAction($request, 'Updated message ID '.$message->id.'');
   return redirect()->route("messages.show", $id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       $message=message::find($id);
       if($request->ajax())
        return view('messages.ajax.delete-confirm')->with('message', $message);
        
        return view('messages.http.delete-confirm')->with('message', $message);
    }
    public function destroy($id)
    {
        $message=message::find($id);
        $message->delete();

    \App\Global_var::logAction($request, 'Deleted message ID '.$message->id);
        return redirect()->route('messages.index');
    }

}
