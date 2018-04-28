<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<div class="flex-center position-ref full-height container-fluid">

        <div id="loginContainer" class="">

            <form class="modal-content" action="TODO">
                <h2 style="text-align: center">Login</h2>
                <br/>
                <br/>
                <div class="container" style="text-align: center">
                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="example@email.com" name="email" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <!-- Commenting until we do a real login <button type="submit">Login</button> -->
                    <button><a style = "color:black" href="/books">Login</a></button>
                </div>

                <br/>
            </form>
        </div>
</div>
</body>
</html>

