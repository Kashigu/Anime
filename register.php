<?php
include_once("includes/body.inc.php");
top(ANIMES);
?>
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg"
             xmlns="http://www.w3.org/1999/html">
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
                        <form action="ConfRegister.php" method="post" class="contact-form" id="frmRegisto">
                            <div class="input__item mt-3">
                                <input style="color: black" type="text" id="name" name="name" placeholder="Username">
                                <span class="material-icons">person</span>
                            </div>
                            <div class="input__item mt-3">
                                <input style="color: black" type="email" id="emails" name="email" placeholder="Email address">
                                <span class="icon_mail"></span>
                                <span style="margin-left: -171px; color: white" id="errorMsg"</span>
                            </div>
                            <div class="input__item mt-3">
                                <input style="color: black;" type="password" id="password" name="password" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item mt-3">
                                <input style="color: black;" type="password" id="Conpassword" name="Conpassword" placeholder="Confirm Password">
                                <span class="icon_lock"></span>
                                <span style="margin-left: -200px; color: white" id="errorMsgS"</span>
                            </div>
                            <button onclick="valido()" type="button" class="site-btn">Register</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Already have an Account ?</h3>
                        <a href="login.php" class="primary-btn">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

<?php
bot();
?>