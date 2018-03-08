@extends('shared.base')

@section('title', '{{ $title }}')

@section('content')
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
            <li role="presentation" id="orderHistory" onclick="switchTabs(this.id)">
                <a href="#orderHistory" class="myTabs" aria-controls="orderHistory" role="tab">
                    Order History
                </a>
            </li>
            <li role="presentation" id="manageCourses" class="active" onclick="switchTabs(this.id)">
                <a href="#manageCourses" class="myTabs" aria-controls="manageCourses" role="tab">
                    Manage Courses
                </a>
            </li>
            <li role="presentation" id="enrolledCourses" onclick="switchTabs(this.id)">
                <a href="#enrolledCourses" class="myTabs" aria-controls="enrolledCourses" role="tab">
                    Enrolled Courses
                </a>
            </li>
            <li role="presentation" id="accountBalance" onclick="switchTabs(this.id)">
                <a href="#accountBalance" class="myTabs" aria-controls="accountBalance" role="tab">
                    Account Balance
                </a>
            </li>
            <li role="presentation" id="profileInfo" onclick="switchTabs(this.id)">
                <a href="#profileInfo" class="myTabs" aria-controls="profileInfo" role="tab">
                    Profile Info
                </a>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="orderHistory">
                @include('tabs.orderHistory')
            </div>
            <div role="tabpanel" class="tab-pane fade" id="manageCourses">
                @include('tabs.manageCourses')
            </div>
            <div role="tabpanel" class="tab-pane fade active in" id="enrolledCourses">
                @include('tabs.enrolledCourses')
            </div>
            <div role="tabpanel" class="tab-pane fade" id="accountBalance">
                @include('tabs.accountBalance')
            </div>
            <div role="tabpanel" class="tab-pane fade" id="profileInfo">
                @include('tabs.profileInfo')
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

