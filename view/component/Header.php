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
                        <li class="list-none"><a href="https://paul.formalmonkey.com/" class="relative">Home</a></li>
                        <li class="list-none"><a href="https://paul.formalmonkey.com/mentor" class="relative">Mentor</a></li>
<li class="list-none"><a href="https://paul.formalmonkey.com/mentorees" class="relative">Mentoree</a></li>
                           <li class="list-none"><a href="https://paul.formalmonkey.com/search" class="relative">Find A Mentor</a></li>
                        
                        <li class="list-none d-flex">
                            <div class="btn-login-mentor cursor-pointer"><a href="#">Become A Mentor</a></div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </header>
<?php component('Loginpopup') ?>
<?php component('headerjs') ?>