@extends('Client.master')

@section('home-content')
    <section class="contact">
        <div class="container page-bgc">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h3 class="text-center text-success mb-2">{{Session::get('message')}}</h3>
                        <p>Get in touch</p>
                        <h2 class="title mt0">With us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="boxed">
                    <div class="col-sm-12">
                        <p class="inner-p">
                            Lorem ipsum dolor sit amet event landing template, consectetur adipisicing elit. Suscipit corrupti facilis event landing template, enim earum numquam minus veritatis nobis accusamus similique.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="map" class="col-sm-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.1366199671006!2d91.82450411495553!3d22.34846968529859!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd898b376f82d%3A0x20066e07022e5090!2sKazir%20Dewri%2C%20Chattogram!5e0!3m2!1sen!2sbd!4v1587930338520!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="row">
                <!--<div class="boxed">-->
                <div class="col-sm-8">
                    <h4>Message for us</h4>
                    <form action="{{route('contact-submit')}}" class="contact-form" id="contactForm" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name*" id="fname" name="first_name" required>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input required type="text" class="form-control" placeholder="Last Name" id="lname" name="last_name">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email*" id="email" name="email" required>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input required type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea required class="form-control" rows="6" placeholder="Write something..." name="message"></textarea>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-12 -->
                            <div class="text-center mt20 col-sm-12">
                                <button type="submit" class="btn btn-robot pull-left" id="cfsubmit">Send Message</button>
                            </div>
                        </div>
                    </form>
                    <div id="contactFormResponse"></div>
                </div> <!-- /.col-sm-8 -->

                <div class="col-sm-4">
                    <h4>Contact details</h4>
                    <div class="row">
                        <div class="col-xs-3">
                            <img class="imgresponsive" src="{{asset('/')}}client/assets/images/address.png" alt="con">
                        </div>
                        <div class="col-xs-9">
                            <h5>Address</h5>
                            <p class="contact-detail">
                                Ashkar Dighi,<br>
                                Chittagong, Bangladesh
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <img class="imgresponsive" src="{{asset('/')}}client/assets/images/phone.png" alt="con">
                        </div>
                        <div class="col-xs-9">
                            <h5>Phone</h5>
                            <p class="contact-detail">
                                01515 682746<br>
                                01728 266040
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <img class="imgresponsive" src="{{asset('/')}}client/assets/images/support.png" alt="con">
                        </div>
                        <div class="col-xs-9">
                            <h5>Support</h5>
                            <p class="contact-detail">
                                niloy.barua74@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--</div>-->
    </section>
@endsection
