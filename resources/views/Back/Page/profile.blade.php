@extends($appType.'.Layouts.master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-5">
                <label for="upload">Profile Picture</label>
                <img src="{{URL::to('userImage/'.$userData->image)}}" class="img-responsive thumbnail"  >
            </div>
<div class="col-md-5">
     <div class="form-group">
            <label for="uname">User Name</label>
            <input type="text" name="name" value="{{$userData->name}}" id="uname" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="text" name="email" value="{{$userData->email}}" id="email" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="user_type">User Type</label>
            <input type="text" name="user_type" value="{{$userData->utype}}" id="user_type" class="form-control" readonly>
        </div>
    {{--<div class="form-group">--}}
        {{--<label for="user_skill">User Skills</label>--}}
        {{--<input type="text" name="user_skill" value="{{$userData->skill}}" id="user_skill" class="form-control" readonly>--}}
    {{--</div>--}}
        </div>
        </div>
    </div>
    @endsection