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
                <div class="panel-heading">Login to Task Management System</div>
                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}
                        </div>
                    @endif
                    <form action="{{route('login')}}" method="post" >
                        {{csrf_field()}}

                        <div class="form-group input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="email" placeholder="Email" aria-describedby="sizing-addon2">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="sizing-addon2">
                        </div>
                        <div class=" input-group">
                            <input type="checkbox" id="rem" name="remember" >
                            <label for="rem">Remember me</label>
                        </div>
                        <div class="input-group pull-right">
                            <button type="submit" class="btn btn-primary"> Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>