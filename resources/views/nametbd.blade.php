@extends('layouts.master')

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Book Store</title>
        <!-- Scripts -->


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            /* Style the tab */
            .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
            }

            /* Style the buttons that are used to open the tab content */
            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                background-color: #ddd;
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: #ccc;
            }

            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 6px 12px;
                border: 1px solid #ccc;
                border-top: none;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <!-- Tab links -->
                <div class="tab">
                  <button class="tablinks" onclick="openTab(event, 'Order History')">Order History</button>
                  <button class="tablinks" onclick="openTab(event, 'Account Balance')">Account Balance</button>
                  <button class="tablinks" onclick="openTab(event, 'Profile Settings')">Tokyo</button>
                </div>
                <!-- Tab content -->
                <div id="Order History" class="tabcontent">
                  <h3>Order History</h3>
                  <p>London is the capital city of England.</p>
                </div>

                <div id="Account Balance" class="tabcontent">
                  <h3>Account Balance</h3>
                  <p>Paris is the capital of France.</p>
                </div>

                <div id="Profile Settings" class="tabcontent">
                  <h3>Profile Settings</h3>
                  <p>Tokyo is the capital of Japan.</p>
                </div>
            </div>
        </div>
    </body>
</html>
