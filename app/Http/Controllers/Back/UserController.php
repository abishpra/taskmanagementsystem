<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\UserRequest;
use App\Model\Priority;
use App\Model\Skill;
use App\Model\Status;
use App\Model\Task;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Input;

class UserController extends BackController
{
    public function index(){
        try{
            $userData=Skill::all();
            $this->data('userData',$userData);
        }catch (\Exception $e){
            die($e->getMessage());
         }finally{
            return view($this->page . '.add-user',$this->data);
        }
    }
    public function user(){
        try{
            $users=User::paginate(6);
            $this->data('users',$users);
            $this->data('title',$this->title('Users'));
        }catch (\Exception $e){
            die($e->getMessage());
        }finally{
            return view($this->page . '.user',$this->data);
        }
    }

    public function userAction(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:4|max:15',
            'image'=>'required|mimes:jpeg,jpg,gif,png,bmp|max:5000'

        ]);
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['password'] = bcrypt($request['password']);
        $data['utype'] = $request->utype;
        $data['skill_id'] = $request->skill;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uploadPath = public_path('userImage/');
            $ext = $image->getClientOriginalExtension();
            $imageName = str_random() . '.' . $ext;
            $make = Image::make($image);
            $save = $make->resize(500, null, function ($ar) {
                $ar->aspectRatio();
            })->crop(300, 250)->save($uploadPath . $imageName);
            if ($save) {
                $data['image'] = $imageName;
            }
        }

        if (User::create($data)) {
            return redirect()->route('admin-user')->with('success', 'User was inserted');
        } else {
            return redirect()->back()->with('error', 'There was a problems');
        }
    }


    public function login(){
        try{
            $this->data('title',$this->title('Login'));
        }catch (\Exception $e){
            die($e->getMessage());
        }finally{
            return view($this->page .'.Login.login',$this->data);
        }
    }
    public function loginAction(Request $request){

        $email=$request->email;
        $password=$request->password;
        $remember=isset($request->remember)?true:false;
        if (Auth::attempt(['email'=>$email,'password'=>$password,'status'=>1],$remember)){
           $user= Auth::User()->utype;
            if ($user=='admin') {
                return redirect()->to(route('dashboard'));
            }else{
                return redirect()->to(route('user-dashboard'));
            }
        }else{
            return redirect()->back()->with('error','Email and password doesnot match');
        }
    }
    public function updateUserStatus(Request $request){
        $userId=$request->_uid;
        if (empty($userId)) throw new \Exception('id not set');
        if (isset($request['enable'])){
            $data['status']=1;
            $message='User was Enable';
        }
        if (isset($request['disable'])){
            $data['status']=0;
            $message='User was Disable';
        }
        $users=User::find($userId);
        if ($users::where('id',$userId )->update($data)){
            return redirect()->route('admin-user')->with('success',$message);
        }else{
            return redirect()->back();
        }
    }
    public function logOut(){
       Auth::logout();
       return redirect()->route('login');
    }
    public function setting(){
       try{
           $id=Auth::user()->id;
           $userData=User::find($id);
           $this->data('userData',$userData);
           $this->data('title',$this->title('setting'));
       }catch (\Exception $e){
           die($e->getMessage());
       }finally{
           return view($this->page.'.setting',$this->data);
       }
    }
//tala ko $request same hunu parne bhane chaina
    public function settingAction(UserRequest $request){
        $data['name']=$request->name;
        $data['email']=$request->email;
        $Id=$request->id;
        $user=User::find($Id);
        $userImage=$user->image;
        if ($request->hasFile('image')){
            $image=$request->file('image');
            $uploadPath=public_path('userImage/');
            $ext=$image->getClientOriginalExtension();
            $imageName=str_random().'.'.$ext;
            $make=Image::make($image);
            $save=$make->resize(500,null,function ($ar){
                $ar->aspectRatio();
            })->crop(300,250)->save($uploadPath.$imageName);
            if ($save){
                if (!empty($userImage)){
                    $userImage=public_path('userImage/' .$userImage);
                    unlink($userImage);
                }
                $data['image']=$imageName;
            }
        }

        if (User::where('id',$Id)->update($data))
        {
            return redirect()->route('setting')->with('success','User was updated');
        }
        return redirect()->back()->with('error','There was a problem');
    }
    public function changePassword(Request $request){
            $oldPassword=$request->opassword;
            $id=Auth::user()->id;
            $user=User::find($id);
            $userOldPassword =$user->password;
            $this ->validate($request,[
                'opassword'=>'required|old_password:'.$userOldPassword,
                'password'=>'required|confirmed|min:4|max:15'
            ],[
                'opassword.old_password'=>'Old Password doesnot match'
            ]
        );
        $data['password']=bcrypt($request->password);
       if ( User::where('id',$id)->update($data)){
           return redirect()->route('setting')->with('success','User was updated');
       }
        return redirect()->back()->with('error','There was a problem');
    }

    public function task(){
        try{
           $userData=User::all();
           $this->data('userData',$userData);

            $priorityData=Priority::all();
            $this->data('priorityData',$priorityData);

            $statusData=Status::all();
            $this->data('statusData',$statusData);

            $this->data('title',$this->title('Task'));
        }catch (\Exception $e){
            die($e->getMessage());
        }finally{
            return view($this->page . '.Task.create-task',$this->data);
        }
    }

    public function showTask()
    {
        try {
        $userTask=Task::whereNotNull('assigned_to')->paginate(6);
        $this->data('userTask',$userTask);

            $this->data('title', $this->title('Tasks'));
        } catch (\Exception $e) {
            die($e->getMessage());
        } finally {
            return view($this->page . '.Task.task', $this->data);
        }
    }

    public function taskAction(Request $request)
    {
        $this->validate($request, [
            'assign' => 'required',
            'title' => 'required|min:3|max:100',
            'deadline' => 'required|date|after:today',
            'priority' => 'required',
            'status'=>'required',
            'description' => 'required'

        ],[
            'deadline.required'=>'Deadline of task is required'
        ]);

        $data['assigned_to'] = $request['assign'];
        $data['title'] = $request['title'];
        $data['priority_id'] = $request['priority'];
        $data['deadline'] = $request['deadline'];
        $data['status_id']=$request['status'];
        $data['description'] = $request['description'];
        $data['comment'] = $request['comment'];

        $file = Input::file('att');
        if($file) {
            $filename = $file -> getClientOriginalName();
            //$filename = timestamp() . $file -> getClientOriginalExtension();
            $file->move(storage_path('attachment'),$file->getClientOriginalName());
            $data['attachment'] = $filename;
        }

        if (Task::create($data)) {
            return redirect()->route('admin-task')->with('success', 'Task was added');
        } else {
            return view($this->page . '.Task.create-task',$this->data);
        }
    }

    public function pool(){
       try{
           $userData=User::all();
           $this->data('userData',$userData);
           $priorityData=Priority::all();
           $this->data('priorityData',$priorityData);

           $statusData=Status::all();
           $this->data('statusData',$statusData);

           $this->data('title',$this->title('Pool'));
       }catch (\Exception $e){
           die($e->getMessage());
       }finally{
           return view($this->page.'.Pool.create_pool_task',$this->data);
       }
    }
    public function showPool(){
        try{
            $userTask=Task::whereNull('assigned_to')->paginate(6);
            $this->data('userTask',$userTask);

            $this->data('title', $this->title('Pool Tasks'));
        }catch (\Exception $e){
            die($e->getMessage());
        }finally{
            return view($this->page. '.Pool.pool_task',$this->data);
        }
    }
    public function poolAction(Request $request){

        $this->validate($request, [
            'title' => 'required|min:3|max:100',
            'deadline' => 'required|date|after:today',
            'priority' => 'required',
            'status'=>'required',
            'description' => 'required'

        ],[
            'deadline.required'=>'Deadline of task is required'
        ]);

        $data['title'] = $request['title'];
        $data['priority'] = $request['priority'];
        $data['deadline'] = $request['deadline'];
        $data['priority_id']=$request['priority'];
        $data['status_id']=$request['status'];
        $data['description'] = $request['description'];
        $data['comment'] = $request['comment'];
        $file = Input::file('att');
        if($file) {
            $filename = $file -> getClientOriginalName();
            //$filename = timestamp() . $file -> getClientOriginalExtension();
            $file->move(storage_path('attachment'),$filename);
            $data['attachment'] = $filename;
        }

        if (Task::create($data)) {
            return redirect()->route('show-pool')->with('success', 'Task was added');
        } else {
            return view($this->page . '.Pool.create_pool_task',$this->data);
        }

    }
    public function profile(){
        try{
            $id=Auth::user()->id;
            $userData=User::find($id);
            $this->data('userData',$userData);
            $this->data('title',$this->title('profile'));
        }catch (\Exception $e){
            die($e->getMessage());
        }finally{
            return view($this->page.'.profile',$this->data);
        }
    }
    public function cancel($id){
        $status   =   Status::where('status','Ready')->first();
        $tasks= Task:: where('id',$id)->update(['assigned_to' => null,'status_id'=>$status->id,'started_at'=> null]);
       if ($tasks) {
           return redirect()->to('user/userDashboard');
       }
    }

    public function accept($id){
        $status   =   Status::where('status','Inprogress')->first();
        $tasks= Task:: where('id',$id)->update(['status_id' => $status->id,'started_at'=>Carbon::now()]);

        if ($tasks) {
            return redirect()->to('user/userDashboard');
        }

    }
    public function complete($id){
        $status   =   Status::where('status','Complete')->first();
        $tasks= Task:: where('id',$id)->update(['status_id' => $status->id,'completed_at'=>Carbon::now()]);
        if ($tasks) {
            return redirect()->to('user/userDashboard');
        }
    }

    public function download($id){
        $downloads=Task::where('id',$id)->first();
        $file= storage_path('attachment').'/'. $downloads->attachment;
        $headers = [
            'Content-Type: application/txt',
            ];
        return response()->download($file, $downloads->attachment, $headers);
    }
    public function delete($id){
        User::destroy($id);
        return redirect()->back();

    }

}
