@extends('Front.Layouts.master')
{{--@extends('Front.Layouts.master')--}}
<header class="header" id="header"><!--header-start-->
    <div class="container">
        <figure class="logo animated fadeInDown delay-07s">
            <a href="#header"><img src="img/logo.png" alt=""></a>
        </figure>
        <h1 class="animated fadeInDown delay-07s">Welcome To TMS</h1>
        <ul class="we-create animated fadeInUp delay-1s">
            <li>We are a digital agency that loves crafting beautiful websites.</li>
        </ul>
        <a class="link animated fadeInUp delay-1s servicelink" href="#header">Sign In</a>
        <a class="link1 animated fadeInUp delay-1s servicelink" href="#header">Register</a>
    </div>
</header><!--header-end-->

<nav class="main-nav-outer" id="test"><!--main-nav-start-->
    <div class="container">
        <ul class="main-nav">
            <li><a href="#header">Home</a></li>
            <li><a href="#service">Services</a></li>
            <li><a href="#Portfolio">Portfolio</a></li>
            <li class="small-logo"><a href="#header"><img src="img/small-logo.png" alt=""></a></li>
            <li><a href="#client">Clients</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->