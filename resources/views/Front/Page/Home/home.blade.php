@extends('Front.Layouts.master')
@section('content')


<header class="header" id="header"><!--header-start-->
    <div class="container">
        <figure class="logo animated fadeInDown delay-03s">
            <a href="#"><img src="img/1.png" alt=""></a>
        </figure>
        <h1 class="animated fadeInDown delay-07s">Welcome To TMS</h1>
        <ul class="we-create animated fadeInUp delay-1s">
            <li>TMS is simple task management and task assignment system. </li>
        </ul>
        <a class="link animated fadeInUp delay-1s servicelink" href="{{route('login')}}">Login</a>
        <a class="link1 animated fadeInUp delay-1s servicelink" href="{{route('register')}}">Register</a>
    </div>
</header>

<nav class="main-nav-outer" id="test">
    <div class="container">
        <ul class="main-nav">
            <li><a href="#header">Home</a></li>
            <li class="small-logo"><a href="#header"><img src="img/12.png" alt=""></a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav>
<div class="container">
    <section class="main-section contact" id="contact">

        <div class="row">
            <div class="col-lg-6 col-sm-7 wow fadeInLeft">
                <div class="contact-info-box address clearfix">
                    <h3><i class=" icon-map-marker"></i>Address:</h3>
                    <span>Kathmandu,Bagmati,Nepal</span>
                </div>
                <div class="contact-info-box phone clearfix">
                    <h3><i class="fa-phone"></i>Phone:</h3>
                    <span>9812345678</span>
                </div>
                <div class="contact-info-box email clearfix">
                    <h3><i class="fa-pencil"></i>email:</h3>
                    <span>dummy23email@gmail.com</span>
                </div>


            </div>

            </div>
    </section>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer-logo"><a href="#"><img src="img/1.png" alt=""></a></div>
        <span class="copyright">&copy; 2017 Task Management System. All Rights Reserved</span>

    </div>
</footer>
@endsection