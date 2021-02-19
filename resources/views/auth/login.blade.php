<!DOCTYPE html>
<html lang="zxx">

    <head>
        <title>Sekull</title>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8"/>
        <meta
            name="keywords"
            content="Working Signin form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
        <!-- //Meta tag Keywords -->
        <link
            href="//fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap"
            rel="stylesheet">
        <!--/Style-CSS -->
        <link rel="stylesheet" href="/login_assets/css/style.css" type="text/css" media="all"/>
        <!--//Style-CSS -->
    </head>

    <body>

        <!-- form section start -->
        <section class="w3l-workinghny-form">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="wrapper">
                    <div class="logo">
                        <h1>
                            <a class="brand-logo" href="index.html">
                                <span>Sekull</span>
                                Sign In</a>
                        </h1>
                        {{-- <img src="/assets/img/logo.svg" alt="Your logo" title="Your logo" style="height:35px;" /> </a> --}}
                    </div>
                    <div class="workinghny-block-grid">
                        <div class="workinghny-left-img align-end">
                            <img src="/login_assets/images/2.png" class="img-responsive" alt="img"/>
                        </div>
                        <div class="form-right-inf">

                            <div class="login-form-content">
                                <h2>Where to?</h2>
                                <form action="{{route("login")}}" class="signin-form" method="post">
                                    @csrf
                                    <div class="one-frm">
                                        <label>Username</label>
                                        <input type="text" name="username" placeholder="Username" required="">
                                    </div>
                                    <div class="one-frm">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="******" required="">
                                    </div>
                                    <button class="btn btn-style mt-3">
                                        Sign In
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
            <!-- copyright-->
            <div class="copyright text-center">
                <div class="wrapper">
                    <p class="copy-footer-29">© 2020 Working Sign In. All rights reserved | Design by
                        <a href="https://w3layouts.com">W3layouts</a>
                    </p>
                </div>
            </div>
            <!-- //copyright-->
        </section>
        <!-- //form section start -->

    </body>

</html>
