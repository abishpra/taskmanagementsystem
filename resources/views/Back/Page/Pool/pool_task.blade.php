@extends($appType.'.Layouts.master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h1><i class="glyphicon glyphicon-user"></i>Pool Tasks</h1>
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
                            <th>Title</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Deadline</th>
                        </tr>
                        </thead>
                        @if(count($userTask)>0)
                            @forelse($userTask as $key=>$data)
                                <tbody>
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><a href="{{ url('info/' . $data -> id)}}">{{$data->title}}</a></td>
                                    <td>{{$data->priority->priority}}</td>
                                    <td>{{$data->status->status}}</td>
                                    <td>{{$data->deadline}}</td>
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
