<?php

namespace App\Http\Controllers\Api\V1;

use App\Business;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Http\Resources\Admin\UserResource;
use App\MailTemplate;
use App\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Hash;
use Validator;

class AuthController extends Controller
{
    //
    // Login
    public function login(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return ResponseBuilder::error($validator->errors()->first(), $this->badRequest);
            }
            $user = User::with('business')->where('email', $request->email)->first();
            if($user){
                // if($user->email_verified_at) {
                if($user->status) {
                    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
                        $user = Auth::user();
                        $user->load('roles');
                        $token = auth()->user()->createToken('API Token')->accessToken;
                        $this->setAuthResponse($user);
                        return ResponseBuilder::successWithToken($token, $this->response, 'Login Successfully');                            
                    }
                    else{
                        return ResponseBuilder::error( __("Your Email or Password does not match."), $this->badRequest);
                    }
                } else {
                    return ResponseBuilder::successMessage( __("Your account is not Verified."), $this->badRequest);
                }
                // }else{
                //     return ResponseBuilder::successMessage( __("Please verify your email."), $this->badRequest);
                // }
            }else{
                return ResponseBuilder::error( __("User not registered"), $this->badRequest);
            }
        } catch (Exception $e) {
            return ResponseBuilder::error(__($e->getMessage()), $this->serverError);
        }
    }

    // register
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'      => 'required',
                'email'     => 'required|email',
                'password'  => 'required|min:8',
                'company_name'      => 'required',
                'phone'      => 'required',
                'address'      => 'required',
                'introduction'      => 'required',
            ]);
            if ($validator->fails()) {   
                return ResponseBuilder::error($validator->errors()->first(), $this->badRequest);  
            }

            $parameters = $request->all();
            extract($parameters);

            $otp = $this->generateOtp(4);
            $user = User::where('email', $email)->first();
            $sendMail = false;
            if($user) {
                // 
                if($user->status) {
                    return ResponseBuilder::error(__("User Already Exist with this Email ID."), $this->badRequest);
                } else{
                    // 
                    $user = User::where('email', $email)->update([
                        'name'      => $name,
                        'password'  => Hash::make($password),
                        'status'    => '0',
                        'is_partner'    => '1',
                        'otp'       => $otp,
                        'phone' => $phone,
                        'address' => $address,
                        'introduction' => $introduction,
                    ]);

                    $data = [
                        'name' => $company_name??'',
                        'email' => $email??'',
                        'phone' => $phone??'',
                        'user_id' => $user->id,
                        'address' => $address??'',
                        'short_description' => $introduction??'',
                    ];
                    
                    Business::updateOrCreate(['id' => $user->business_id], $data);
        
                    $user->roles()->sync(2);

                    $sendMail = true;
                }
            } else {
                $user = User::create([
                    'email'     => $email,
                    'name'      => $name,
                    'password'  => Hash::make($password),
                    'status'    => '0',
                    'is_partner'    => '1',
                    'otp'       => $otp,
                    'phone' => $phone,
                    'address' => $address,
                    'introduction' => $introduction,
                ]);

                if(!empty($user)){
                    $user->roles()->sync(2);

                    $data = [
                        'name' => $company_name??'',
                        'email' => $email??'',
                        'phone' => $phone??'',
                        'user_id' => $user->id,
                        'address' => $address??'',
                        'short_description' => $introduction??'',
                    ];
                    
                    $business = Business::updateOrCreate(['id' => $user->business_id], $data);

                    $user->business_id = $business->id;
                    $user->save();
                }
                $sendMail = true;
            }

            if($sendMail) {
                // 
                // mail to user
                $mailData = MailTemplate::where('category', 'signup-otp')->first();
                $basicInfo = [
                    '{otp}' => $otp,
                    '{siteName}' => '',
                ];
                $mailStatus = $this->SendMail($email, $mailData, $basicInfo);
                if(!$mailStatus['status']) {
                    return ResponseBuilder::error(__($mailStatus['message']), $this->serverError);
                }
            }

            // Assign OTP
            $this->response->email = $email;
            $this->response->otp = $otp;

            return ResponseBuilder::success($this->response, 'Registered Successfully! Please verify your OTP');
            
        }
        catch (exception $e) {
            return ResponseBuilder::error(__($e->getMessage()), $this->serverError);
        }
    }

    public function verifyOtp(Request $request)
    {   
        try{
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users',
                'otp' => 'required|digits:4'
            ]);
           
            if ($validator->fails()) {   
                return ResponseBuilder::error($validator->errors()->first(), $this->badRequest);
            }   
            $parameters = $request->all();
            extract($parameters);
            
            $user = User::where('email', $email)->first();

            if ($user->otp != $otp) {
                return ResponseBuilder::error(__('Invalid OTP'), $this->badRequest);
            }
            // if(strtotime($user->otp_created_at) < strtotime(now())) 
            // {
            //     return ResponseBuilder::error(__('Your OTP is Expired , Please Resend OTP'), $this->badRequest);    
            // }
            if($user->otp == $request->otp){
                $user->otp = null;
                $user->status = 1;
                $user->save();
                
                return ResponseBuilder::successMessage("Your Account Successfully Verified", 200);
            }
        }catch (\Exception $e) {
            return ResponseBuilder::error(__($e->getMessage()), $this->serverError);
        }

    }

    public function ChangePassword(Request $request)
    {
        # code...
        try {
            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'password' => 'required|different:old_password|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
            ], [
                'password.different' => 'New Password and Old Password must be Different.',
                'password.confirmed' => 'Confirm Password not matched!'
            ]);
            if ($validator->fails()) {
                return ResponseBuilder::error($validator->errors()->first(), $this->badRequest);
            }

            if(Auth::guard('api')->check()) {
                $user = Auth::guard('api')->user();
            } else {
                return ResponseBuilder::error("User not found", $this->unauthorized);
            }

            if (Hash::check($request->old_password, $user->password)) { 
                $user->update([
                    'password'  => Hash::make($request->password)
                ]);

                return ResponseBuilder::successMessage('Password Changed Successfully!',  $this->success);

            } else {
                return ResponseBuilder::error(__("Old Password Not Match!"), $this->badRequest);
            }

        } catch (exception $e) {
            return ResponseBuilder::error(__($e->getMessage()), $this->serverError);
        }
    }

    public function changeForgetPassword(Request $request)
    {
        # code...
        try {
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
            ]);
            if ($validator->fails()) {
                return ResponseBuilder::error($validator->errors()->first(), $this->badRequest);
            }
            $parameters = $request->all();
            extract($parameters);

            $user = User::where('email', $email)->first();
            if(!$user) {
                return ResponseBuilder::error(__("Error: Account not found!"), $this->badRequest);
            } 
            $user->update([
                'password'  => Hash::make($password)
            ]);

            return ResponseBuilder::successMessage('Password Changed Successfully!',  $this->success);

        } catch (exception $e) {
            return ResponseBuilder::error(__($e->getMessage()), $this->serverError);
        }
    }


    public function ResendOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users',
            ]);

            if ($validator->fails()) {
                return ResponseBuilder::error($validator->errors()->first(), $this->badRequest);
            }
            $parameters = $request->all();
            extract($parameters);

            $otp = $this->generateOtp(4);
            $user = User::where('email', $email)->first();

            if($user){
                $user->update([
                    'otp' => $otp,
                    'deleted_at' => null
                ]);
            }

            $this->response->email = $email;
            $this->response->otp = $user->otp;
            $sendMail = true; 
            //mail to user
            if($sendMail) {
                // 
                // mail to user
                // $mailData = MailTemplate::where('category', 'resend-otp')->first();
                // $basicInfo = [
                //     '{otp}' => $otp,
                //     '{siteName}' => '',
                // ];
                // $mailStatus = $this->SendMail($user->email, $mailData, $basicInfo);
                // if(!$mailStatus['status']) {
                //     return ResponseBuilder::error(__($mailStatus['message']), $this->serverError);
                // }
            }  
            return ResponseBuilder::success($this->response,'OTP Resend Successfully');
        } catch (exception $e) {
            return ResponseBuilder::error(__($e->getMessage()), $this->serverError);
        }
    }

    public function setAuthResponse($user)
    {
        $this->response->user = new UserResource($user);
    }

    // Update User Profile
    public function updateProfile(Request $request)
    {
        # code...
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email', 
                'phone' => 'required',
            ]);
            if ($validator->fails()) {
                return ResponseBuilder::error($validator->errors()->first(), $this->badRequest);
            }
            if(Auth::guard('api')->check()) {
                $user = Auth::guard('api')->user();
            } else {
                return ResponseBuilder::error("User not found", $this->unauthorized);
            }
            $parameters = $request->all();
            extract($parameters);
            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'dob' => $dob,
                'address' => $address,
                'country' => $country,
                'state' => $state,
                'city' => $city,
                'zip' => $zip,
            ];

            $user = User::updateOrCreate(['id' => $user->id], $data);
            if($request->file('image')) {
                $file = $request->file('image');
                $imageName = $this->UpdateImage($file, 'assets/users/'.$user->id);
                $user->image = $imageName; 
                $user->save(); 
            }
            return ResponseBuilder::successMessage('Account Updated Successfully!',  $this->success);

        } catch (exception $e) {
            return ResponseBuilder::error(__($e->getMessage()), $this->serverError);
        }
    }

    // Get User Data
    public function getUserData()
    {
        # code...
        try {

            if(Auth::guard('api')->check()) {
                $user = Auth::guard('api')->user();
            } else {
                return ResponseBuilder::error("User not found", $this->unauthorized);
            }
            $user = User::with('business')->where('id', $user->id)->first();
            $this->response->user = new UserResource($user);
            return ResponseBuilder::success($this->response, 'User Data',  $this->success);

        } catch (exception $e) {
            return ResponseBuilder::error(__($e->getMessage()), $this->serverError);
        }
    }
    
}
