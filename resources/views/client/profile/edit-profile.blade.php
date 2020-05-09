@extends('Client.master')

@section('home-content')
    <section class="contact client-profile">
        <h3 class="text-success text-center">{{Session::get('message')}}</h3>
        <div class="container page-bgc">

            <div class="row">

                <!--profile view with img-->
                <div class="col-6 col-sm-6 shadow border border-warning">
                    <div class="content">
                        <div class="row profile text-center">
                            <div class="col-12 col-md-12">
                                <div class="profile-sidebar">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic mt-4">
                                        <img src="{{asset('/')}}client/assets/images/user.jpg" alt="my_img">
                                    </div>

                                    <div class="profile-usertitle ">
                                        <div class="profile-usertitle-name">
                                            {{Session::get('client_name')}}
                                        </div>


                                        <button type="submit" class="btn btn-robot mt-4" id="update">Edit Profile
                                        </button>
                                    </div>


                                    <!-- END SIDEBAR BUTTONS -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--profile view with img ends-->


                <!--Data input form-->
                <div class="user-data col-6 col-sm-6 shadow border border-warning">
                    <h4 class="text-center"><b>Please fill up the form</b></h4>
                    <form action="{{route('client-update-profile')}}" class="contact-form" id="contactForm"
                          method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{Session::get('client_id')}}">
                                    <label class="text-body">Full Name:</label>
                                    <input type="text" class="form-control"
                                           name="full_name" placeholder="Full Name" value="{{Session::get('client_name')}}" required>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <!-- /.col-sm-6 -->

                            <div class="col-sm-12 mt-3">
                                <div class="form-group">
                                    <label class="text-body">Contact Number:</label>
                                    <input type="text" class="form-control"
                                           name="contact_no" placeholder="Full Name" value="{{Session::get('client_contact_no')}}" required>
                                </div> <!-- /.form-group -->
                            </div>

                            <div class="col-sm-12 mt-3">
                                <div class="form-group">
                                    <label class="text-body">Present Address:</label>
                                    <input type="text" class="form-control" required
                                           name="present_address" value="{{Session::get('client_present_address')}}">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-12 -->

                            <div class="col-sm-12 mt-3">
                                <div class="form-group">
                                    <label class="text-body">Permanent Address:</label>
                                    <input type="text" class="form-control"
                                           name="permanent_address" required
                                           value="{{Session::get('client_permanent_address')}}">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-12 -->

                            <!-- /.col-sm-6 -->
                            <!-- /.col-sm-6 -->

                            <div class="col-sm-12 mt-3">
                                <div class="form-group">

                                    <label class="text-body">National ID Card:</label>
                                    <input required type="number" class="form-control" id="nid"
                                           name="nid" value="{{Session::get('client_nid')}}">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-12 -->

                            <div class="text-center mt20 col-sm-12">
                                <button type="submit" class="btn btn-robot">Update Profile</button>
                            </div>
                        </div>
                    </form>
                    <div id="contactFormResponse"></div>
                </div>  <!--Data input form-->
                <!-- /.col-sm-6 -->

            </div>

        </div>
        <!--</div>-->
    </section>
@endsection
