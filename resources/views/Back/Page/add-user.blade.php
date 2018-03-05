@extends($appType.'.Layouts.master')
    @section('content')
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <h1><i class="glyphicon glyphicon-user"></i> Add Users</h1>
                    <hr>
                    @include($appType.'.Include.validation')
                    <div class="row">
                        <form action="{{route('add')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="uname">User Name</label>
                                    <input type="text" name="name" id="uname" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="utype">User Types</label>
                                    <select name="utype" id="utype" class="form-control">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="upload">Profile Picture</label>
                                    <input type="file" name="image" id="upload" class="btn btn-default">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" name="password" id="pass" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpass">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="cpass" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skill">Skills</label><br>
                                    <select name="skill" id="skill" class="form-control">
                                        @foreach($userData as $data)
                                                <option value="{{$data->id}}" >{{$data->skills}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="glyphicon glyphicon-plus">Add User</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endsection