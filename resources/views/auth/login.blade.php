<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bintang">
    <link rel="stylesheet"
        href="{!!asset('authentication/fonts/material-design-iconic-font/css/material-design-iconic-font.css')!!}">
    <link rel="stylesheet" href="{!!asset('authentication/css/style.css')!!}">
</head>

<body>
    <div class="wrapper">
        <form action="/login" method="POST">
            {{ csrf_field() }}
            <!-- SECTION 1 -->
            <h2></h2>
            <section>
                @if(session('gagal'))
                <div class="alert" role="alert">
                    {{session('gagal')}}
                </div>
                @endif
                <div class="inner">
                    <div class="image-holder">
                        <img src="{!!asset('authentication/images/form-wizard-1.jpg')!!}">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>Login</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="text" name="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="password" name="pass" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="button submitBtn">Login</button>
                        <span>
                            Doesn't have an account? <a href="/register">Register</a> here.
                        </span>
                    </div>
                </div>
            </section>
        </form>
    </div>

    <!-- JQUERY -->
    <script src="{!!asset('authentication/js/jquery-3.3.1.min.js')!!}"></script>

    <!-- JQUERY STEP -->
    <script src="{!!asset('authentication/js/jquery.steps.js')!!}"></script>
    <script src="{!!asset('authentication/js/main.js')!!}"></script>
</body>

</html>
