<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Book Store</title>
        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('shared.navbar')
        <div>

        </div>
        <span id="userInfo">
            <p>Name: Elvis</p>
            <p>Department: CMPE</p>
            <p>Year: 4</p>
        </span>
        <div class="position-ref full-height">
            <div class="content flex-center">
                <div id="tabs">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#orderHistory" class="myTabs" aria-controls="orderHistory" role="tab" data-toggle="tab">Order History</a></li>
                    <li role="presentation"><a href="#manageCourses" class="myTabs" aria-controls="manageCourses" role="tab" data-toggle="tab">Manage Courses</a></li>
                    <li role="presentation"><a href="#enrolledCourses" class="myTabs" aria-controls="enrolledCourses" role="tab" data-toggle="tab">Enrolled Courses</a></li>
                    <li role="presentation"><a href="#accountBalance" class="myTabs" aria-controls="accountBalance" role="tab" data-toggle="tab">Account Balance</a></li>
                    <li role="presentation"><a href="#profileSettings" class="myTabs" aria-controls="profileSettings" role="tab" data-toggle="tab">Profile Settings</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="orderHistory">
                        @include('tabs.orderHistory')
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="manageCourses">
                        @include('tabs.manageCourses')
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="enrolledCourses">
                        @include('tabs.enrolledCourses')
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="accountBalance">

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="profileSettings">

                    </div>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>
