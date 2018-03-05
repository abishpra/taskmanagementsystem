<?php

namespace App\Http\Controllers\Back;

use App\Model\Notification;
use App\Model\Task;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends BackController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
       try {
       } catch (\Exception $e) {
            die($e->getMessage());
        } finally {
            return view($this->page.'.dashboard',$this->data);
        }

    }
    public function user()
    {
        try {
            $tasks=Task::where('assigned_to',Auth::id())->get();
            $this -> data('tasks', $tasks);
           $notifications=Notification::where('user_id',Auth::id())->get();
           $this->data('notifications',$notifications);
        } catch (\Exception $e) {
            die($e->getMessage());
        } finally {
            return view($this->page . '.user-dashboard', $this -> data);
        }
    }

    public function content(Request $request, $id)
    {
        try {
            $data = Task::where('id', $id) -> first();
            $this->data('data', $data);
            $this->data('title', $this->title('Pool Description'));
        } catch (\Exception $e) {
            die($e->getMessage());
        } finally {
            return view($this->page . '.info', $this->data);
        }
    }
}
