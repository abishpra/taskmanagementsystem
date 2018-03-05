<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',$title)</title>
    <link rel="stylesheet" href="{{URL::to('css/bootstrap.css')}}">
</head>
<style>
    .loginPage{
        margin-top: 50px;
    }
</style>
<body>
<div class="container">
    <div class="row">
        <div class="loginPage col-md-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Create a TMS Account</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>  {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('register')}}" method="post" >
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="uname">User Name</label>
                                <input type="text" name="name" id="uname" class="form-control" placeholder="eg:Ram thapa">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="eg:ram@gmail.com">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="eg:..........">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cpass">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="cpass" class="form-control" placeholder="eg:..........">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg">Create New Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>