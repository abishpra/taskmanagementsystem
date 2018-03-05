@extends($appType.'.Layouts.master')
@section('content')
    <div class="content">
    <div class="row">
    <div class="col-md-12">
        <h2>Welcome to user panel: <b>{{ Auth::User() -> name }}</b></h2>
        <hr>
<div class="col-md-12">
    @foreach($notifications as $notification)
        Task <b> {{$notification->task->title }} </b>is expired.
        <hr>
       @endforeach

</div>
        <div class="form-group">
            <table class="table">
                <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Started Date</th>
                    <th>Deadline</th>
                    <th>Completed Date</th>
                    <th style="text-align: center;display: inline-block"  >Action</th>
                </tr>
                </thead>
                @if(count($tasks)>0)
                @forelse($tasks as $key=>$task)
                <tbody>
                <tr>
                <td>{{++$key}}</td>
                    <td><a href="{{ url('info/' . $task -> id)}}">{{$task->title}}</a></td>
                    <td>{{$task->priority->priority}}</td>
                    <td>{{$task->status->status}}</td>
                    <td>{{$task->started_at}}</td>
                    <td>{{$task->deadline}}</td>
                    <td>{{$task->completed_at}}</td>
                    <td>
                    <td>@if($task->status->status=='Pending')
                        <a href="{{url('user/accept/' . $task -> id)}}"><button class="btn btn-success btn-sm" name="accept"> Accept</button> </a>
                        @elseif($task->status->status=='Inprogress')
                        <a href="{{url('user/complete/' . $task -> id)}}"><button class="btn btn-primary btn-sm" name="complete"> Complete</button></a>
                        @endif
                    @if($task->status->status=='Pending' || $task->status->status=='Inprogress')
                    <a href="{{ url('user/cancel/' . $task -> id)}}"><button class="btn btn-danger btn-sm" name="cancel"> Cancel</button></a></td>
                     @endif
                </tr></tbody>
                @empty
                @endforelse
                @else
                    <tr>
                        <td colspan="6">Task not Found</td>
                    </tr>
                @endif

            </table>

        </div>

    </div>
</div>
</div>


@endsection


