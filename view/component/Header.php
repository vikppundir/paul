<?php skin('HeaderCss') ?>
<?php skin('Theme') ?>
 <header>
        <div class="d-flex justify-space-between align-items-center">
            <div class="logo-box">
                <div class="logo-img">
                   <a href="https://paul.formalmonkey.com/"> <h2>MENTOR<span class="primary-clr">4YOU</span></h2></a>
                </div>
            </div>
            <nav>
                <div class="mentor-ham-burger flexcolumn align-items-end cursor-pointer">
                    <div class="burger-line"></div>
                    <div class="burger-line"></div>
                    <div class="burger-line"></div>
                </div>
                <div class="menu">
                    <div class="cross-menu d-flex flexcolumn align-items-center cursor-pointer">
                        <div class="cross-one"></div>
                        <div class="cross-two"></div>
                    </div>
                    <ul class="d-flex gap30 justify-content-end align-items-center">
                        <li class="list-none"><a href="<?= ABSPATH ?>" class="relative">Home</a></li>
                        <li class="list-none"><a href="<?= ABSPATH ?>mentor" class="relative">Mentor</a></li>
<li class="list-none"><a href="https://paul.formalmonkey.com/mentorees" class="relative">Mentoree</a></li>
                           <li class="list-none"><a href="<?= ABSPATH ?>search" class="relative">Find A Mentor</a></li>
                        
                        <li class="list-none d-flex">
                            <?php if(is_login()): ?>
                                <div class="btn-login-mentor cursor-pointer"><a href="<?= ABSPATH ?>mentor/registration">Become A Mentor</a></div>
                              <?php else: ?>
                                <div class="btn-login-mentor cursor-pointer mentor-sign-up"><a >Login/Signup</a></div>

                             <?php endif; ?>
                        </li>

                    </ul>
<div class="nav-dropdown">
<ul>
<li><i class="fas fa-bars"></i></li>
<li><img src="https://a0.muscache.com/im/users/30619109/profile_pic/1428226760/original.jpg?aki_policy=profile_medium">
<ul class="dropdown-mn">
<li><a href="#">Menu</a></li>
<li><a href="#">Menu</a></li>
<li><a href="#">Menu</a></li>
</ul>
</li>
</ul>
</div>
                </div>
            </nav>
        </div>
    </header>
<?php component('Loginpopup') ?>
<?php component('headerjs') ?>