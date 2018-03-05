<?php

namespace App\Http\Controllers\Front;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Null_;

class AppController extends FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        try{
        }catch (\Exception $e){
            die($e->getMessage());
        }finally{
            return view($this->page.'.Home.home',$this->data);
        }
   }

    public function about()
    {
        try{
            $this->data('title',$this->title('About'));
        }catch (\Exception $e){
            die($e->getMessage());
        }finally{
            return view($this->page.'.About.about',$this->data);
        }
    }
    public function register()
    {
        try {
        } catch (\Exception $e) {
            die($e->getMessage());
        } finally {
            return view($this->page.'.register',$this->data);
        }
    }
    public function registerAction(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:4|max:15',

        ]);
        $data['name']=$request['name'];
        $data['email']=$request['email'];
        $data['password']=bcrypt($request['password']);
//        $data['utype']='user';
        if(User::create($data)){
           return redirect()->to(route('login'));
        }else{
            return redirect()->back()->with('error', 'There was a problems');

        }
    }
}
