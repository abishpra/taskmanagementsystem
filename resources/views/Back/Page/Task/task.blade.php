@extends($appType.'.Layouts.master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h1><i class="glyphicon glyphicon-user"></i> Tasks</h1>
                <hr>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="form-group">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Assignee</th>
                            <th>Title</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Started Date</th>
                            <th>Deadline</th>
                            <th>Completed Date</th>
                            <th>Download Attachment</th>
                        </tr>
                        </thead>
                        @if(count($userTask)>0)
                            @forelse($userTask as $key=>$data)
                        <tbody>
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$data->user->name}}</td>
                            <td><a href="{{
                            url('info/' . $data -> id)}}">{{$data->title}}</a></td>
                            <td>{{$data->priority->priority}}</td>
                            <td>{{$data->status->status}}</td>
                            <td>{{$data->started_at}}</td>
                            <td>{{$data->deadline}}</td>
                            <td>{{$data->completed_at}}</td>
                            <td>@if(!empty($data->attachment))
                                <a href={{url("download/".$data->id)}} >
                                    <button class="btn btn-success btn-sm" name="download">Download</button></a>
                            @endif</td>
                        </tr>
                        </tbody>
                                @empty
                                @endforelse
                        @else
                            <tr>
                                <td colspan="6">Task not Found</td>
                            </tr>

                        @endif
                    </table>
                </div>
                {!! $userTask->render()!!}
            </div>
        </div>
    </div>
@endsection
