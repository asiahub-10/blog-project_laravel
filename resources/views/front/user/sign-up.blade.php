@extends('front.master')

@section('body')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"></h1>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('new-sign-up') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">First Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="first_name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Last Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="last_name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Email Address</label>
                                <div class="col-md-9">
                                    <input type="email" name="email_address" class="form-control" onblur="emailCheck(this.value);"/>
                                    <span id="res" class="text-success"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Phone Number</label>
                                <div class="col-md-9">
                                    <input type="number" name="phone_number" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Address</label>
                                <div class="col-md-9">
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" name="btn" id="regBtn" class="btn btn-block bg-info text-white" value="Register"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                {{--<div class="card mb-4">--}}
                    {{--<h5 class="card-header">Search</h5>--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                            {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-secondary" type="button">Go!</button>--}}
              {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Categories Widget -->--}}
                {{--<div class="card my-4">--}}
                    {{--<h5 class="card-header">Categories</h5>--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-lg-6">--}}
                                {{--<ul class="list-unstyled mb-0">--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Web Design</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">HTML</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Freebies</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-6">--}}
                                {{--<ul class="list-unstyled mb-0">--}}
                                    {{--<li>--}}
                                        {{--<a href="#">JavaScript</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">CSS</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Tutorials</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>

    <script>

        /******** this is raw AJAX ********/
        /*
        function emailCheck(email) {
            // alert(email);

            // ActiveXObject();                                                             //ActiveXObject = object library
            var xmlHttp = new XMLHttpRequest();                                             //XMLHttpRequest = object library
            var serverPage = 'http://localhost/php-project/public/email-check/'+email ;       //this url is called API (will be discussed later)
            xmlHttp.open('GET', serverPage);                                                //here, Get = method, and open- function checks if this is connected with server. It links server.
            xmlHttp.onreadystatechange = function () {                                      //onreadystatechange = recursive function; A recursive function is a function that calls itself during its execution. This enables the function to repeat itself several times, outputting the result and the end of each iteration.
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {                     //readyState == 4 means all 5 states(0 to 4) are complete. And status == 200 means server is connected with client. otherwise, the value will not be 200.
                    // alert(xmlHttp.responseText);                                         //responseText- function's task is to bring the response of server. The feedback of server will be under this function.
                  document.getElementById('res').innerHTML = xmlHttp.responseText;
                  if (xmlHttp.responseText == 'Email address exits') {
                      document.getElementById('regBtn').disabled = true;
                  } else {
                      document.getElementById('regBtn').disabled = false;
                  }
                }
            }
            xmlHttp.send();                                                                 //send- function complete a process.
        }
        */



        /******** this is jquery AJAX ********/

        function emailCheck(email) {
            $.ajax({
                url         :   'http://localhost/php-project/public/email-check/'+email,
                method      :   'GET',
                data        :   {email:email},          //it's not mandatory
                dataType    :   'JSON',                 //it's mandatory. without it, this will not work
                success     :   function (data) {
                    // alert(data);

                    document.getElementById('res').innerHTML = data;           //here, data is an object
                    if (data == 'Email address exits') {
                        document.getElementById('regBtn').disabled = true;
                    } else {
                        document.getElementById('regBtn').disabled = false;
                    }
                }
            });

        }
        
    </script>


@endsection














