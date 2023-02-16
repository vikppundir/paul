<?php if ( !defined('ACCESS') ) header("location:../"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="<?php echo auth::createToken(); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo ABSPATH; ?>asset/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ABSPATH; ?>asset/css/admin/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Dashboard</title>
</head>

<body class="bg-gradient-theme--main-light">  
<header class="intrbodashheader">
        <div class="logo d-flex align-items-center"><span class="opensidebtn"><i class="fa-solid fa-bars-staggered"></i></span>
        <a href="<?php echo ABSPATH; ?>dashboad" style="text-decoration: none;">
            <span>Dashboard</span>
        </a>/
        <a href="<?php echo ABSPATH; ?>admin" style="text-decoration: none;">
            <span>Admin</span>
        </a>
        </div>
        <div class="search align-items-center">
            <form>
                <div class="input-group">
                    
                    
                </div>
            </form>
        </div>

        <div class="right-menu ml-auto">
            <ul class="nav d-flex align-items-center">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo ABSPATH; ?>dashboad/page">Pages</a>
              </li>
             <li class="nav-item">
                <a class="nav-link active" href="<?php echo ABSPATH; ?>dashboad/skin">skin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo ABSPATH; ?>dashboad/component">Components</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo ABSPATH; ?>dashboad/endpoint">End point</a>
              </li>
             <li class="nav-item">
                <a class="nav-link" href="<?php echo ABSPATH; ?>dashboad/media">Media</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">version</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">API Browse</a>
              </li>
              <li class="nav-item">
                <div class="profilebox d-flex align-items-center">
                    <div class="profileimg">
                        <img src="https://getwindoors.com/html/assets/img/user-1.jpg">
                    </div>
                    <div class="priledata">
                        <h3 class="name">Admin</h3>
                        <p class="country">India</p>
                    </div>
                </div>
              </li>
            </ul>
        </div>
    </header>