@extends('shared.base')

@section('title', '{{ $title }}')

@section('css')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css">
@stop

@section('javascript')
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/preferences.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/order.js') }}"></script>
@stop

@section('content')
<div class="position-ref full-height">
    <div class="content flex-center">
        <div id="tabs">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" id="enableDisable" class="active" onclick="switchTabs(this.id)">
                    <a href="#enableDisable" class="myTabs" aria-controls="enableDisable" role="tab">
                        Enable/Disable
                    </a>
                </li>
                <li role="presentation" id="order" onclick="switchTabs(this.id)">
                    <a href="#order" class="myTabs" aria-controls="order" role="tab">
                        Order
                    </a>
                </li>
                <li role="presentation" id="addBook" onclick="switchTabs(this.id)">
                    <a href="#addBook" class="myTabs" aria-controls="addBook" role="tab">
                        Add Book
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="enableDisable">
                    @include('tabs.enableDisable')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="order">
                    @include('tabs.order')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="addBook">
                    @include('tabs.addBook')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

