<?php
include_once("includes/body.inc.php");
top(ANIMES);
?>
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Register</h2>
                        <p>Welcome to the official Anime.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Register</h3>
                        <form action="confirmaLogin.php" method="post" class="contact-form" id="frmConfirma">
                            <div class="input__item mt-3">
                                <input style="color: black" type="text" id="name" name="name" placeholder="UserName">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="input__item mt-3">
                                <input style="color: black" type="email" id="emails" name="email" placeholder="Email address">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item mt-3">
                                <input style="color: black;" type="password" id="password" name="password" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>
                            <button onclick="entrar()" type="button" class="site-btn">Login Now</button>
                        </form>
                        <a href="#" class="forget_pass">Forgot Your Password?</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Already have an Account ?</h3>
                        <a href="login.php" class="primary-btn">Sign In</a>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With
                                Facebook</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

<?php
bot();
?>