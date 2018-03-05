<?php

namespace App\Console\Commands;

use App\Model\Notification;
use App\Model\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PoolExpriy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pool:expiry';

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
        $expiryTask =    Task::whereNotNull('assigned_to')->where('deadline','<',Carbon::now())->get();
        foreach ($expiryTask as $expiry) {
            $data['user_id'] = $expiry->assigned_to;
            $data['task_id'] = $expiry->id;
            $check  =Notification::where('user_id',$expiry->assigned_to)->where('task_id',$expiry->id)->first();
           if (!$check){
            Notification::create($data);
           }

        }
    }
}
