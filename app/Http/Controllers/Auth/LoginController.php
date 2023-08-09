<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Role;
use App\Resource;
use App\Action_index_data;
use App\Setting;
use Carbon\Carbon;
use App\General;
use App\saving_categories;
use App\subscription_plan;
use App\logo;
use Auth;
use Illuminate\Http\Request;
use Session;
use DB;

class LoginController extends Controller
{

protected $userName;

    public function __construct(){
        $this->middleware('guest')->except(['logout', 'choose_subscription_plan_form', 'choose_subscription_plan']);
        $this->userName=$this->findUsername();
    }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function choose_subscription_plan_form($userId, Request $request){
        $user=User::find($userId);
        $subscription_plans=subscription_plan::where("isDeleted", "=", "false")->get();
        if($request->ajax())
        return view("users.ajax.choose_subscription_plan")->with('user', $user)->with('subscription_plans', $subscription_plans);

       return view("users.http.choose_subscription_plan")->with('user', $user)->with('subscription_plans', $subscription_plans);
    }
    public function choose_subscription_plan($userId, Request $request){
        $subscriptionPlanId=$request->subscriptionPlanId;
        $user=User::find($userId);
        $user->subscriptionPlanId=$subscriptionPlanId;
        $user->userName=$request->username;
        $user->save();

        \App\Global_var::logAction($request, 'User ID: '.$userId.' choosed subscription plan id: '.$subscriptionPlanId);
        
        Session::flash('success', 'Your account and subscription plan created successfully. You will be allowed to login after approval.');

        return redirect()->route('public_login');
    }    
public function findUsername(){
    $login=request()->input('email');
    $fieldType=filter_var($login, FILTER_VALIDATE_EMAIL)? 'email': 'userName';

    request()->merge([$fieldType=>$login]);
    return $fieldType;
}
public function public_login_form()
    {
        Auth::logout();
        $languages=\App\Global_var::languages();
        return view('auth.login')->with('languages', $languages);
        //return view('auth.public-login')->with('languages', $languages);
    }
public function sign_up_form()
    {
        Auth::logout();
        $business_categories=DB::table('business_categories')->where("isDeleted", "=", "false")->pluck("name", "id")->toArray();
        $subscription_plans=DB::table('subscription_plan')->where("isDeleted", "=", "false")->where('name', '!=', 'Public')->pluck("name", "id")->toArray();
        return view('auth.public-signup')->with('business_categories', $business_categories)->with('subscription_plans', $subscription_plans);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function public_login(Request $request)
    {
        $lang=$request->selectedLang;
        if($lang!=null){
            \Cookie::queue('selectedLang', $lang, 6);
            \App\Global_var::$selectedLang=$lang;
        }
        
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
                    return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        Auth::logout();
        $languages=\App\Global_var::languages();
        return view('auth.login')->with('languages', $languages);
        //return view('auth.public-login')->with('languages', $languages);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $lang=$request->selectedLang;
        if($lang!=null){
            \Cookie::queue('selectedLang', $lang, 60*24*7);
            \App\Global_var::$selectedLang=$lang;
        }
        
        $this->validateLogin($request);

        \App\Global_var::logAction($request, 'Login Attempt');

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
        /*--KG preceed into inner method sendLoginResponse */
                    return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        \App\Global_var::logAction($request, 'Unsuccessful login attempt.');
        \Session::flash('danger', 'Unsuccessful login attempt.');
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
             
            $roleName=$user->role!=null? $user->role->roleName:'';
            Session::put('role', $roleName);

            if($user->status!='active'){
        \App\Global_var::logAction($request, 'Inactive account login attempt.');
                Auth::logout();
                $message='Your account is not activated. Please contact your administrator for activation';
             if($request->ajax())
                    return ['error', $message];
                Session::flash('danger', $message);
                return back()->withInput($request->only($this->username()));
            }
            /*if($user->changedPassword!='true'){
             
                Session::flash('danger', 'You have to change your default password.');
                return redirect()->route('users.manageAccounts', $user->id);
            }*/

        Session::flash('success', 'Login successful.');
        \App\Global_var::logAction($request, 'Login successful.');

        if($user!=null){
            /*if($user->isUser() || $user->isPublic())
                return redirect()->route('welcome');*/

            return redirect()->route("home");
            }
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return $this->userName;//'email';//'name';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

}
