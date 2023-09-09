<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\str;
use Illuminate\Support\Carbon;
use Mail;

use App\Models\User;
use App\Models\Student;
use App\Models\PasswordReset;

class AuthController extends Controller
{
  public function loadLogin(){
    return view('login');
  }

  public function loginUser(Request $request){
    $request->validate([
      'username' => 'required|string',
      'password' => 'required|min:6|max:15',
    ]);

    $userCredentials = $request->only('username','password');
 
    if(Auth::attempt($userCredentials)){
		if (Auth::user() && Auth::user()->login_status == 1) {
    		if(Auth::user() && Auth::user()->is_admin == 1){
				return redirect('/coordinator/dashboard');
			}elseif(Auth::user() && Auth::user()->is_admin == 0){
				return redirect('/student/home');
			}elseif(Auth::user() && Auth::user()->is_admin == 2){
				return redirect('/supervisor/home');
			}
		}else {
			return redirect('/change/password');
		}
		
    }else{
      return back()->with('fail','Wrong Username or Password');
    }

  }
	public function loadChangePasswordGeneral(){
    	return view('change-password');
	}
	public function ChangePasswordGeneral(Request $request){
		$request->validate([
      		'password' => 'required|confirmed'
		]);
		 $user_data = Auth::user();
		try {
		$user = User::find($user_data->id);
		$user->password = Hash::make($request->password);
		$user->login_status = 1;
		$user->save();

		return redirect('/change/password')->with('success','Password changed Successfully, use your new password to login!');
		} catch (\Exception $e) {
		return $e->getMessage();
		}

	}

  public function logout(Request $request){
    $request->session()->flush();
    Auth::logout();
    return redirect('/login');
  }

  public function loadforgot(){
    return view('forgot');
  }

  public function forgot(Request $request){
    try {
      $user = User::where('email',$request->email)->get();

      foreach ($user as $key) {
        # code...
      }

      if (count($user) > 0) {
        $token = Str::random(40);
        $domain = URL::to('/');
        $url = $domain.'/reset-password?token='.$token;

        $data['url'] = $url;
        $data['email'] = $request->email;
        $data['title'] = 'Password Reset';
        $data['body'] = 'Please Click on link below to reset your password';

        Mail::send('forgetPasswordMail',['data'=>$data],function($message) use ($data){
          $message->to($data['email'])->subject($data['title']);
        });
        $dateTime = Carbon::now()->format('Y-m-d H:i:s');

        $passreset = new PasswordReset;
        $passreset->email = $request->email;
        $passreset->token = $token;
        $passreset->user_id = $key->id;
        $passreset->created_at = $dateTime;
        $passreset->save();

        return back()->with('success','please check Your Mail Inbox to reset Your password');
        // }
      }else{
        return back()->with('fail','Email Does Not Exist');
      }
    } catch (Exception $e) {
      return back()->with('fail',$e->getMessage());
    }
  }

  public function resetpasswordLoad(Request $request){
    $resetData = PasswordReset::where('token',$request->token)->get();
    if(isset($request->token) && count($resetData) > 0){
      $user = User::where('id',$resetData[0]['user_id'])->get();
      foreach ($user as $datas) {
        # code...
      }
      return view('resetPassword',compact('datas'));
    }else{
      return view('404');
    }
  }
  public function ResetPassword(Request $request){
    $request->validate([
      'password' => 'required|string|min:6|max:9|confirmed'
    ]);
    try {
      $user = User::find($request->id);
      $user->password = Hash::make($request->password);
      $user->save();

      PasswordReset::where('email',$user->email)->delete();
      // return "<h2>Your password has Resetted Successfully<h2>";
      return redirect('/login')->with('success','Password changed Successfully');

    } catch (\Exception $e) {
      return $e->getMessage();
    }


  }
}
