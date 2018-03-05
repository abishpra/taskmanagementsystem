<?php

namespace App\Console\Commands;

use App\Model\Priority;
use App\Model\Status;
use App\Model\Task;
use App\Model\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PoolScheduling extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pool:schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $check=Task::whereNull('assigned_to')->first();
        if ($check){
            $tasks=Task::whereNull('assigned_to')->orderBy('priority_id','asc')->orderBy('deadline','asc')->get();
            $users = User::select('id')->where('utype','user')->whereNotIn('id',function($query){
                    $query->select('assigned_to')->from('tasks')->whereNotNull('assigned_to')->whereIn('status_id',[3,4]);
                })->get();
            $userids = [];
            foreach ($users as $user) {
                $userid= $user->id;
                array_push($userids, $userid);
            }
            $status   =   Status::where('status','Pending')->first();
            foreach ($tasks as $task){
                if(empty($userids)) {
                    break;
                }
                $num        = array_rand($userids,1);
                $assignto   = $userids[$num];
                $updated = Task::where('id', $task -> id) -> update(['assigned_to' => $assignto,'status_id'=>$status->id]);
                unset($userids[$num]);
            }
        }else{
            echo "Task not availbale";
        }
    }
}
