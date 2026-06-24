<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Str;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;


class CustomerController extends Controller
{
    public function signin(){

        $lang = [
            'az' => '/customer-sign-in',
            'en' => '/en/customer-sign-in',
            'ru' => '/ru/customer-sign-in',
        ];
        return view('site.customer.login',compact('lang'));
    }

    public function login(Request $request){

        
        $credentials = $request->only('email', 'password');

        

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->back();
        }
        return redirect()->back()->with('error', 'Daxil etdiyiniz məlumatlar yanlışdır.');   
        
    }

    public function logout(){
        Auth::guard('customer')->logout();

        return redirect()->route('homepage');
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => [
                'required',
                'regex:/^\+994\(\d{2}\)\d{3}-\d{2}-\d{2}$/'
            ],
            'password' => 'required|min:5',
            'confirm_password' => 'required',
        ], [
            'phone.regex' => 'Telefon nömrəsi düzgün formatda olmalıdır: +994 (XX) XXX-XX-XX',
        ]);
        if ($validator->fails()) {
            return \Redirect::back()
                ->with('errormessage', 'Zəhmət olmasa bütün xanaları doldurun.');
        }
        if ($request['password'] == $request['confirm_password']) {

            $controlemail = Customer::where('email', $request['email'])->first();
            $controlPhone = Customer::where('phone', $request['phone'])->first();
            if ($controlemail or $controlPhone) {
                return \Redirect::back()
                    ->with('errormessage', 'Bu istifadəçi artıq mövcuddur.');
            } else {

                
                $customer = Customer::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'password' => Hash::make($request['password']),
                    'status' => 1,
                ]);
                
                // İstifadəçini login et
                Auth::guard('customer')->login($customer);

                // Ana səhifəyə yönləndir və bildiriş göndər
                return redirect()->route('homepage')
                    ->with('successmessage', 'İstifadəçi əlavə edildi və login olundu.');

            }

            
        }
        
        else {
            return \Redirect::back()
                ->with('errormessage','Şifrə və şifrənin təkrarı eyni deyil.');
        }
    }

    public function panel(){

        $orders = Order::where('user_id',Auth::guard('customer')->user()->id)->orderby('id','desc')->get();

        $lang = [
            'az' => '/kabinet',
            'ru' => '/ru/kabinet',
        ];
        return view('site.customer.panel',compact('orders','lang'));
    }


   public function information(){
       $lang = [
            'az' => '/melumatlarim',
            'ru' => '/ru/melumatlarim',
        ];
    return view('site.customer.information',compact('lang'));
   }

   public function informationPost(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => [
                'required',
                'regex:/^\+994\(\d{2}\)\d{3}-\d{2}-\d{2}$/'
            ],
        ], [
            'phone.regex' => 'Telefon nömrəsi düzgün formatda olmalıdır: +994 (XX) XXX-XX-XX',
        ]);
        if ($validator->fails()) {
            return \Redirect::back()
                ->with('errormessage', 'Zəhmət olmasa bütün xanaları doldurun.');
        }

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('customers', $imageName, 'public');
        }else{
            $imageName = $request->old_img;
        }
        Auth::guard('customer')->user()->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'img' => $imageName,
        ]);

        return back();



   }

   public function passwordEdit(){
       
       $lang = [
            'az' => '/sifreni-yenile',
            'ru' => '/ru/sifreni-yenile',
        ];
     return view('site.customer.passwordEdit',compact('lang'));
   }

   public function passwordUpdate(Request $request){

    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
    ],[
        'old_password.required' => 'Köhnə şifrəni daxil edin.',
        'new_password.required' => 'Yeni şifrəni daxil edin.',
        'new_password.min' => 'Yeni şifrə ən az 6 simvol olmalıdır.',
        'confirm_password.required' => 'Təkrar şifrəni daxil edin.',
        'confirm_password.same' => 'Yeni şifrə və təkrar eyni olmalıdır.',
    ]);

    
    $customer = Auth::guard('customer')->user();

    
    if (!Hash::check($request->old_password, $customer->password)) {
        return back()->withErrors(['old_password' => 'Köhnə şifrə düzgün deyil!']);
    }

    
    $customer->password = Hash::make($request->new_password);
    $customer->save();

    return back()->with('success', 'Şifrəniz uğurla yeniləndi.');
   }
   
   
   public function forgotPassword(){
       
       $lang = [
            'az' => '/forgot-password',
            'ru' => '/ru/forgot-password',
        ];
       return view('site.customer.forgot',compact('lang'));
   }
   
   public function forgotPasswordPost(Request $request){
       
       $request->validate([
            'email' => 'required|email|exists:customers,email',
        ]);

       $customer = Customer::where('email',$request->email)->first();
       
       if($customer){
           
           do {
                $token = Str::random(20);
            } while (Customer::where('token', $token)->exists());
            
            $customer->update([
                'token' => $token,
            ]);
           $resetLink = url('customer/password/reset/' . $token . '?email=' . urlencode($customer->email));
           
           Mail::to($customer->email)->send(new ResetPasswordMail($resetLink));
    
            return redirect()->back()->with('successmessage', 'Şifrə yeniləmək üçün link email ünvanınıza göndərildi.');
       }else{
           return redirect()->back()
                    ->with('errormessage', 'İstifadəçi tapılmadı.');
       }
   }
   
   public function passwordReset($token){
       
       $checkCustomer = Customer::where('token',$token)->first();
       
       if(!$checkCustomer){
           return redirect()->route('customer_signin')->with(['customererrormessage' => 'Şifrə yeniləmə linki səhvdir.']);
       }
       
       $lang = [
            'az' => '/customer/password/reset/'.$token,
            'ru' => '/ru/customer/password/reset/'.$token,
        ];
       return view('site.customer.password_reset',compact('token','lang'));
   }
   
   public function passwordResetUpdate(Request $request){
       if($request->email){

            $token = $request->input('token');
            $passwordReset = Customer::where('token',$token)->first();
            
            

            if ($passwordReset) {
                
                if($request->new_password == $request->confirm_password){
                    Customer::where('email',$request->input('email'))->update([
                        'password' => Hash::make($request['new_password']),
                        'token' => null,
                    ]);
    
                    return redirect()->route('customer_signin')->with(['customersuccessmessage' => 'Şifrəniz uğurla yeniləndi.']);
                }else{
                    return redirect()->back()->with(['errormessage' => 'Şifrə yanlışdır.']);
                }
                
            } else {
                return redirect()->back()->with(['errormessage' => 'Şifrə yeniləmə linki səhvdir.']);
            }
        }else{
            return redirect()->back()->with(['errormessage' => 'Email ünvanı yoxdur']);
        }
   }

    

    
}
