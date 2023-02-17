<?php skin('LoginPopupCsss') ?>
<?php $google = new loginWithGoogle()  ?>
<section id="login">
        <div class="main-form ">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-main d-flex align-items-center justify-content-center">
                        <div class="form-box d-flex align-items-center justify-content-center">

                            <!-- login -->
                            <div class="login-main relative pd50">
                                <div class="cross-pop-up cursor-pointer">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <div class="login-inner">

                                    <div class="login-box">
                                        <div class="title">
                                            <h3 class="textcenter">Log in</h3>
                                        </div>
                                    </div>
                                    <div class="input-box">
                                        <div class="email-address">
                                            <label for="">E-mail Address
                                                <input type="email" placeholder="E-mail Address">
                                            </label>
                                        </div>
                                        <div class="password">
                                            <label for="">Password
                                                <input type="password" placeholder="Password">
                                            </label>
                                        </div>
                                        <div class="login-bttn">
                                            <button class="btn">Login</button>
                                        </div>
                                        <div class="bttn-box">
                                            <div class="facebook">
                                                <button class="btn"><span> <img
                                                            src="../Paul/images/connexion-facebook.svg" alt=""></span>
                                                    Facebook</button>
                                            </div>
                                            <div class="google">
                                                <button class="btn"><span> <img
                                                            src="../Paul/images/connexion-google.svg"
                                                            alt=""></span><?= $google->button('Google'); ?></button>
                                            </div>
                                        </div>
                                        <div class="sign-text">
                                            <p class="textcenter">Don't have an account?</p>
                                            <p class="textcenter sign-up cursor-pointer">Sign up</p>
                                        </div>
                                        <div class="forgot-password">
                                            <p id="forgt-pass" class="textcenter cursor-pointer">Forgot password?</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- signup -->
                                <div class="signup-box">

                                    <div class="title">
                                        <h3 class="textcenter">Sign up</h3>
                                    </div>
                                    <div class="social-box">
                                        <div class="facebook">
                                            <button class="btn"><span> <img src="../Paul/images/connexion-facebook.svg"
                                                        alt=""></span> Register with Facebook</button>
                                        </div>
                                        <div class="google">
                                            <button class="btn"><span> <img src="../Paul/images/connexion-google.svg"
                                                        alt=""></span><?= $google->button('Sign up with Google');?></button>
                                        </div>
                                        <div id="sign-mail" class="sign-email">
                                            <button class="btn"><span> <img src="../Paul/images/connexion-mail.svg"
                                                        alt=""></span>Registration by e-mail</button>
                                        </div>
                                    </div>
                                    <div class="sign-text">
                                        <p class="sign-text-inner textcenter">You already have an account? <span
                                                class="login-text cursor-pointer">Log in</span></p>
                                    </div>
                                    <div class="signin-ltc">
                                        <p class="textcenter">
                                            On registering by email or Facebook, you accept our
                                        </p>
                                        <p class="textcenter"><a href="#">legal terms & conditions </a></p>
                                    </div>
                                </div>
                                <!-- forgot password -->
                                <div class="forgot-pass">
                                    <div class="title">
                                        <h3 class="textcenter">Reset my password </h3>
                                        <p class="textcenter">To retrieve your password, please enter the e-mail address
                                            you used to
                                            register on Superprof.</p>
                                    </div>
                                    <div class="forgot-input">
                                        <div class="email-address">
                                            <label for="">E-mail Address
                                                <input type="email" placeholder="E-mail Address">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="send-btn">
                                        <button class="btn">Login</button>
                                    </div>
                                    <div class="return-login">
                                        <p id="login-return" class="text-center cursor-pointer"><span><i
                                                    class="fa-solid fa-angle-left"></i></span>Return to Sign-in</p>
                                    </div>
                                </div>
                                <!-- create new account signin -->

                                <div class="Sign-in">
                                    <div class="sign-box">
                                        <div class="title">
                                            <h3 class="textcenter">Sign up</h3>
                                        </div>
                                    </div>
                                    <div class="signin-box">
                                        <div class="name-field">
                                            <label for="">Name
                                                <input type="text" placeholder="Name">
                                            </label>
                                            <label for="">Name
                                                <input type="text" placeholder="Name">
                                            </label>
                                        </div>
                                        <div class="email-address">
                                            <label for="">E-mail Address
                                                <input type="email" placeholder="E-mail Address">
                                            </label>
                                        </div>
                                        <div class="password">
                                            <label for="">Create a password
                                                <input type="password" placeholder="Create a password">
                                            </label>
                                        </div>
                                        <div class="sign-email">
                                            <button class="btn"><span> <img src="../Paul/images/connexion-mail.svg"
                                                        alt=""></span>Registration by e-mail</button>
                                        </div>
                                        <div class="bttn-box">
                                            <div class="facebook">
                                                <button class="btn"><span> <img
                                                            src="../Paul/images/connexion-facebook.svg" alt=""></span>
                                                    Facebook</button>
                                            </div>
                                            <div class="google">
                                                <button class="btn"><span> <img
                                                            src="../Paul/images/connexion-google.svg"
                                                            alt=""></span><?= $google->button();?></button>
                                            </div>
                                        </div>
                                        <div class="sign-text">
                                            <p class="sign-text-inner textcenter">You already have an account? <span
                                                    id="sign-txt" class="sign-text cursor-pointer">Log in</span></p>
                                        </div>
                                        <div class="signin-ltc">
                                            <p class="textcenter">
                                                On registering by email or Facebook, you accept our
                                            </p>
                                            <p class="textcenter"><a href="#"> terms & conditions</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
<?php component('LoginPopupjs') ?>