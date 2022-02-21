
@extends('layouts.frontend.master')
@section('style')
<style>
    body{
   
}
.contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
</style>
@endsection

@section('content')
<section class="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('frontend/assets/images/banner.png')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2><span>Feeling good</span> about making a difference.</h2>
                                <p>We are here to remove obstacles that consumers often experience when trying to borrow money from a lender. Our highly trained Customer Care team will review important terms and conditions with you.</p>
                                <a href="#">Apply For Home Purchase</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-links">
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
        <div class="num-links">
            <ul>
                <h3>GET IN TOUCH!</h3>
                <li><a href="#">012 - 3456 - 7890</a></li>
                <li><a href="#">info@lorem.com</a></li>
            </ul>
        </div>
    </div>
</section>
<div class="container contact-form">
    <div class="contact-image">
        <img src="{{asset('frontend/assets/images/logo.png')}}" style="width:165px;">
    </div>
    @if(Session::has('message'))
      <p class="alert alert-success">{{Session::get('message')}}</p>
    @endif
    <form method="post" action="{{route('send.message')}}">
        @csrf
        <h3>Drop Us a Message</h3>
       <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *" value="" />
                </div>
                <div class="form-group">
                    <input type="submit"  class="btnContact" value="Send Message" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection