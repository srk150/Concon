 <link rel="stylesheet" type="text/css" href="css/main.css">

 <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="icon" href="https://forestathome.com/concon/assets/img/concon-fav.png" type="image/png" sizes="32x32"> 
   

  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php">

    <img src="images/concon-logo-white.png" width="100">
    </a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
     
      </ul>
    <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/user.jpg" alt="User Image" width="50">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_COOKIE['fname'];?></p>
          <p class="app-sidebar__user-designation"></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon la-lg  la la-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li><a class="app-menu__item" href="subscription.php"><i class="app-menu__icon la-lg  la la-user"></i><span class="app-menu__label">Subscription Details</span></a></li>

        <li><a class="app-menu__item" href="referral.php"><i class="app-menu__icon la-lg la la-ticket"></i><span class="app-menu__label">Referral Section</span></a></li>

       <!--  <li><a class="app-menu__item" href="usage.php"><i class="app-menu__icon la-lg  la la-cubes"></i><span class="app-menu__label">Usage</span></a></li> -->   
      

       <li><a class="app-menu__item" href=" pricing-plans.php"><i class="app-menu__icon la-lg la la-clipboard"></i><span class="app-menu__label">plans</span></a></li>
            
       
        <li><a class="app-menu__item" href="settings.php"><i class="app-menu__icon la-lg  la la-life-ring"></i><span class="app-menu__label">Settings</span></a></li>

        
        <li><a class="app-menu__item" href="controller/logout.php"><i class="app-menu__icon la-lg  la la-sign-out fa-lg"></i><span class="app-menu__label">Logout</span></a></li>


      </ul>
    </aside>