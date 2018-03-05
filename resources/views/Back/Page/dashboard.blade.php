@extends($appType.'.Layouts.master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h3> Welcome to admin panel: <b> {{Auth::User()->name}}</b></h3>
            </div>
            {{--<div class="col-md-6">--}}
            {{--<div class="form-group">--}}
                {{--<table class="table">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>S.N.</th>--}}
                        {{--<th>Users</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--@foreach($users as $key=>$user)--}}
                        {{--<tbody>--}}
                        {{--<tr>--}}
                            {{--<td>{{++$key}}</td>--}}
                            {{--<td>{{$user->name}}</td>--}}

                        {{--</tr>--}}
                        {{--</tbody>--}}
                    {{--@endforeach--}}
                {{--</table>--}}
            {{--</div>--}}
                {{--{!! $users->render()!!}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-6">--}}
                {{--<div class="form-group">--}}
                    {{--<table class="table">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>S.N.</th>--}}
                            {{--<th>Task List</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--@foreach($tasks as $key=>$task)--}}
                        {{--<tbody>--}}
                        {{--<tr>--}}
                            {{--<td>{{++$key}}</td>--}}
                            {{--<td>{{$task->title}}</td>--}}

                        {{--</tr>--}}
                        {{--</tbody>--}}
                        {{--@endforeach--}}
                    {{--</table>--}}

                {{--</div>--}}
                {{--{!! $tasks->render()!!}--}}

            {{--</div>--}}
    </div>

    </div>



@endsection
