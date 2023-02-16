<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="<?php echo auth::createToken(); ?>" />
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="asset/css/admin/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Document</title>
    <style>
      
    </style>
  
</head>
<body class="bg-gradient-theme--main-light">

    <header>
        <div class="logo d-flex align-items-center"><span class="opensidebtn"><i class="fa-solid fa-bars-staggered"></i></span><span>Dashboard</span></div>
        <div class="search align-items-center">
            <form>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-white no-border" id="basic-addon1"><i class="bi bi-search"></i></span>
                    </div>
                    <input type="search" class="form-control outline-none no-border" placeholder="Type Something here..">
                </div>
            </form>
        </div>
        <div class="left-menu d-flex align-items-center">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link active" href="#">Pages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Components</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Supportive</a>
              </li>
            </ul>
        </div>
        <div class="right-menu ml-auto">
            <ul class="nav d-flex align-items-center">
              <li class="nav-item">
                <a class="nav-link active" href="#"><i class="bi bi-bell position-relative"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-chat-right-dots position-relative"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-palette"></i></a>
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

    <main>
        <section class="sidebar">
            <aside>
                <div class="">
                    <div class="side-menubox">
                        <div class="side-titlebox d-flex align-items-center justify-content-between">
                            <h4>Main navigation</h4>
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="side-menubox">
                        <div class="side-titlebox d-flex align-items-center justify-content-between">
                            <h4>Apps</h4>
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 avtaricon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </aside>
        </section>
        <section class="body"></section>
    </main>
   
</body>
</html>