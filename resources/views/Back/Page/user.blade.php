@extends($appType.'.Layouts.master')
    @section('content')
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <h1><i class="glyphicon glyphicon-user"></i> Users</h1>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @if(count($users)>0)
                                @forelse($users as $key=> $user)
                                <tbody>
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <form action="{{route('updateStatus')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_uid" value="{{$user->id}}">
                                            @if($user->status==0)
                                                <button class="btn btn-success btn-sm" name="enable">Enable</button>
                                                @else
                                                <button class="btn btn-danger btn-sm" name="disable">Disable</button>
                                            @endif
                                        </form>
                                    </td>
                                    <td><img src="{{URL::to('userImage/'.$user->image)}}" width="40" alt=""></td>
                                    <td><a href="{{url('admin/delete/' . $user -> id)}}" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                                </tbody>
                                    @empty
                                @endforelse
                                @else
                                <tr>
                                    <td colspan="6">Data not Found</td>
                                </tr>

                            @endif
                        </table>
                        {!! $users->render()!!}
                    </div>
                    </div>
            </div>
        </div>
    @endsection
