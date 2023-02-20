<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
<meta name="csrf_token" content="<?php echo auth::createToken(); ?>" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<link rel="stylesheet" href="<?php echo ABSPATH; ?>asset/css/admin/css/theme.css">
<link rel="stylesheet" href="<?php echo ABSPATH; ?>asset/css/admin/css/custom.css">
<link rel="stylesheet" href="<?php echo ABSPATH; ?>asset/css/admin/fontawesome-free-6.2.1-web/css/all.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo ABSPATH; ?>asset/css/global.css">


</head>
<body>

<header class="dash-header">
    <a href="#" class="dash-logo">
        <img src="imgs/logo.svg" alt="">
        <span>Engima</span>
    </a>
    <nav>
        <ul>
            <li><a href="#">Application</a></li>
            <li><a href="#">Dashboard</a></li>
        </ul>
    </nav>
    <div class="dash-search">
        <form action="" method="post">
            <input type="text" name="search" id="search" placeholder="Search">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="dash-notification">
        <a href="#"><i class="fa-regular fa-bell"></i></a>
    </div>
    <div class="dash-profile">
        <img src="<?php echo ABSPATH; ?>asset/uploads/admin/profile.webp" alt="">
        <div class="header2menu hamburgermenumain closemenu">
            <div class="seller-data">
                <h4>Tom Cruise</h4>
                <p class="seller-date">Software Engineer</p>
            </div>
            <ul class="list-none">
              <li>
                <a href="">My Account</a>
              </li>
              <li>
                <a href="">Setting</a>
              </li>
              <li>
                <a href="">logout</a>
              </li>
            
            </ul>
          </div>
    </div>
</header>
<main class="main-outter">