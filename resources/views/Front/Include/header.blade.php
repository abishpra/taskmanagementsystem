@section('header')
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',$title)</title>
    <link rel="stylesheet" href="{{URL::to('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/style.css')}}">

    <link rel="icon" href="{{URL::to('favicon.png')}}" type="image/png">
    <link rel="shortcut icon" href="{{URL::to('favicon.ico')}}" type="img/x-icon">

    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

    <link href="{{URL::to('css/bootstrap1.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('css/style1.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('css/responsive.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('css/animate.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
@endsection