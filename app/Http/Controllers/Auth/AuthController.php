<?php namespace Blog\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Blog\Calendar;
use Blog\Event;
use Blog\Http\Controllers\Controller;
use Blog\Lib\BlogDate;
use Blog\User;
use Validator;
use \Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    protected $redirectPath = '/dashboard';
    protected $loginPath = '/auth/login';
    protected $redirectAfterLogout = '/';


    /**
     * Create a new authentication controller instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->request = $request;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'mobile' => 'digits:11:',
        ], [], \Lang::get('attributes'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $BlogDate = new BlogDate();
        $today = $BlogDate->jalali()->get();
        $user = User::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password']),
        ]);
        $calendar = Calendar::create([
            'type' => 'private',
            'owner_id' => $user->id,
            'color' => 'blue',
            'name' => 'تقویم من',
        ]);

        Event::create([
            'owner_id' => $user->id,
            'calendar_id' => $calendar->id,
            'calendar_type' => 'jalali',
            'title' => 'روز پیوستن شما به گاهنامه خورشیدی',
            'repeat_type' => 'yearly',
            'start_at' => time(),
            'day' => $today->getDay(),
            'month' => $today->getMonth(),
        ]);

        $avatar_path = public_path() . '/img/users/' . $user->id;
        if (!\File::exists($avatar_path)) \File::makeDirectory($avatar_path);
        if ($this->request->hasFile('avatar')) {
            if (\File::exists($avatar_path . '/avatar.jpg')) \File::delete($avatar_path . '/avatar.jpg');
            $this->request->file('avatar')->move($avatar_path, 'avatar.jpg');
        } else {
            if (\File::exists($avatar_path . '/avatar.jpg')) \File::delete($avatar_path . '/avatar.jpg');
            \File::copy(public_path() . '/img/users/avatar.jpg', $avatar_path . '/avatar.jpg');
        }
        return $user;
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ],[],\Lang::get('attributes'));

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }
}
