 <header class="header">
            <!--start navbar-->
            <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/concon-logo.png" alt="logo" class="img-fluid" width="220">
                        
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                    </button>
                    <div class="collapse navbar-collapse h-auto" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto menu">
                            
                            <li><a href="https://forestathome.com/concon/" class="page-scroll">Home</a></li>
                            <li><a href="https://forestathome.com/concon/#process" class="page-scroll">What we do</a></li>
                            <li><a href="https://forestathome.com/concon/#pricing" class="page-scroll">Pricing</a></li>
                           <!--  <li><a href="sign-in.php" class="page-scroll bt">Login</a></li> -->
                           <!--  <li><a href="sign-up.php" class="page-scroll bt custum-btn">Create an Account</a></li> -->
                           <li class="nav-item dropdown">
                                <?php if(!empty($_COOKIE['fname'])){ ?>
                                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i>&nbsp; Hi 
                                  <span><?php echo $_COOKIE['fname'];?></span>
                                </a>

                               
                                <?php }else{ ?>

                                <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i>&nbsp; Hi 
                                  <span>User</span>
                                </a>

                               <?php }?>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php if(!empty($_COOKIE['fname'])){ ?>
                                
                                <li>
                                <a class="dropdown-item" href="https://forestathome.com/concon/portal/dashboard.php">Dashboard</a>
                                </li>

                                <?php }else{ ?>

                                <li>
                                <a class="dropdown-item" href="https://forestathome.com/concon/sign-in.php">Login</a>
                                </li>
                                <li>
                                <a class="dropdown-item" href="https://forestathome.com/concon/sign-up.php">Create an Account</a>
                                </li>
                                
                                <?php }?>
                                    
                                    
                                </ul>
                            </li>




                            
                        </ul>
                    </div>
                </div>
            </nav>
        </header>