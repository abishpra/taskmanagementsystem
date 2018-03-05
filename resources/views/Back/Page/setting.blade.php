@extends($appType.'.Layouts.master')
    @section('content')
        <div class="content">
            <div class="row">
                <h1><i class="glyphicon glyphicon-edit"></i> Update Users</h1>
                <hr>
                @include($appType.'.Include.validation')
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <div class="col-md-4">
                    <img src="{{URL::to('userImage/'.$userData->image)}}" class="img-responsive thumbnail"  >
                </div>
                <div class="col-md-8">
                    <form action="{{route('setting')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$userData->id}}">
                            <div class="form-group">
                                <label for="uname">User Name</label>
                                <input type="text" name="name" value="{{$userData->name}}" id="uname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="text" name="email" value="{{$userData->email}}" id="email" class="form-control">
                            </div>
                        <div class="form-group">
                                <label for="upload">Profile Picture</label>
                                <input type="file" name="image" id="upload" class="btn btn-default">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="glyphicon glyphicon-plus"></i> Update Info</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3><i class="glyphicon glyphicon-lock"></i> Update Password</h3>
                        <hr>
                        <form action="{{route('change-password')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$userData->id}}">
                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pass">Old Password</label>
                                    <input type="password" name="opassword" id="pass" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cpass">New Password</label>
                                    <input type="password" name="password" id="cpass" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cpass">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="cpass" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Update Password</button>
                            </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>


           </div>
       </div>
    @endsection