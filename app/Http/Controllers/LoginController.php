<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use \App\User;
class LoginController extends Controller
{
    //
       public function login()
    {
    	return view('pages.account');
    }


    public function postlogin(Request $Request)
    {
    	$this->validate($Request,[
           'username'=>'required',
           'password'=>'required|min:3|max:32'
           ],[
           'username.required'=>'bạn chưa nhập username',
           'password.required'=>'bạn chưa nhập password',
           'password.min'=>'password không được nhỏ hơn 3 kí tự',
           'password.max'=>'password không được lớn hơn 32 ký tự'
            ]);

        $username = $Request['username'];
        $password = $Request['password'];
        //login(model)
        // $user = \App\User::find(2);
        // Auth::login($user);
        // return view('thanhcong',['user'=>Auth::user()]);


        if ((Auth::attempt(['name'=>$username,'password'=>$password])) or (Auth::attempt(['email'=>$username,'password'=>$password]) )) {
             $user = Auth::User();
       
   
         $_SESSION['username'] = $username;
         $_SESSION['role'] = $user->role;
         if($_SESSION['role']==0)
         {
              return redirect('');
         }
         else
         {
            return redirect('admin/index');
         }
            

            //,['share_user'=>Auth::user()]);
        }
        else
        {

           return redirect('login')->with('thongbao','Đăng nhập thất bại vui lòng kiểm tra lại tài khoản hoặc mật khẩu');
        }
    }
  




      public function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        return redirect('');
    }





    public function postregister(Request $Request)
    {
    	$this->validate($Request,
                 [
                    'name' => 'required|min:5|max:255|unique:users,name',
                    'email' => 'required|email|max:255|unique:users,email',
                    'password' => 'required|min:6|max:32|confirmed',
                    //'phone' => 'required|max:14',
                    //'address' => 'required|max:255',
                ],
                [
           
                    'name.required' => 'Hãy nhập vào họ tên của bạn',
                    'name.min'=>'Họ tên tối thiểu 5 ký tự',
                    'name.max' => 'Họ tên tối đa 255 ký tự',
                    'email.required' => 'Hãy nhập vào địa chỉ Email',
                    'email.email' => 'Địa chỉ Email không đúng định dạng',
                    'email.max' => 'Địa chỉ Email tối đa 255 ký tự',
                    'email.unique' => 'Địa chỉ Email đã tồn tại',
                     'name.unique' => 'username đã tồn tại',
                    'password.required' => 'Hãy nhập mật khẩu',
                    'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
                    'password.confirmed' => 'Xác nhận mật khẩu không đúng',
                    //'phone.required' => 'Hãy nhập số điện thoại',
                    //'phone.max' => 'Số điện thoại tối đa 14 ký tự',
                    //'address.required' => 'Hãy nhập vào địa chỉ của bạn',
                    //'address.max' => 'Địa chỉ được phép nhập tối đa 255 ký tự',
                ]
            );

           try{
                $user = new User;
                $user->name=$Request->name;
                $user->email=$Request->email;
                $user->password=bcrypt($Request->password);
               // $user->phone=$Request->phone;
                //$user->address=$Request->address;
                $user->role=0;
                $user->save();
                return redirect('login')->with('thongbao','Đăng ký thành công');
              }
            catch(Exception $e) 
              {
                return redirect('login')->with('thongbao','Đăng ký k thành công');
              } 
            
            }

  public function cart()
    {
        return view('pages.cart');
    }
}
