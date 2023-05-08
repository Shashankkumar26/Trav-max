<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Travmaxholidays </title>
    <?php
    if ($page_keywords != '') {
        echo '<meta name="keywords" content="' . $page_keywords . '">';
    }
    if ($page_description != '') {
        echo '<meta name="description" content="' . $page_description . '">';
    }
    ?>
    <meta property="og:title" content=" " />
    <meta property="og:image" content=" " />
    <meta property="og:site_name" content="Travmaxholidays" />
    <meta property="og:url" content="" />
    <meta property="og:description" content="" />

    <link href="/lib/bootstrap-3/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="/lib/jquery/jquery-1.11.1.min.js"></script>
    <script src="/lib/bootstrap-3/bootstrap.min.js"></script>
</head>

<body>
    <header id="header">
        <div class="header-middle">
            <div class="">
                <div class="row">
                    <div class="col-md-2"><a href="/"><img class="img-responsive chain" src="/images/logo.png" alt=" "></a>
                    </div>
                    <div class="col-md-10 col-xs-12 mennuu">
                        <div class="menu-bar">
                            <nav class="navbar">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>

                                </div>
                                <div id="navbar" class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav">
                                        <li><a href="<?php echo base_url(); ?>"> Home </a></li>
                                        <li><a href="/services">Services </a></li>
                                        <li><a href="/packages">Packages </a></li>
                                        <li><a href="/regis">Register </a></li>
                                        <li><a href="/about">About </a></li>
                                        <li><a href="/testimonials">Testimonials </a></li>
                                        <li><a href="/partner">Be a Partner </a></li>
                                        <li class="dropdown">
                                            <a href="#">More<i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu">
                                                <li><a href="terms_of_use">Terms of Service</a></li>
                                                <li><a href="contact_us">Contact</a></li>
                                            </ul>
                                        </li>

                                        <!--	 <li><a href="<?php echo base_url(); ?>deals">Hot Deals</a></li>
							 
							
				
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category<i class="fa fa-angle-down"></i></a>
                                    <ul  class="dropdown-menu">
									
									<?php if (isset($category_list) && (!empty($category_list))) {

                                        foreach ($category_list as $category) {
                                            echo '<li><a href="' . base_url() . 'category/' . str_replace(' ', '-', $category['c_name']) . '" >' . $category['c_name'] . '</a></li>';
                                        }
                                    } ?>			

			 
                                    </ul>
                                </li> 
								<li><a href="<?php echo base_url(); ?>offline_stores">Near by Store</a></li>
								<li><a href="<?php echo base_url(); ?>buy_privilege_card">Buy Privilege Card</a></li>-->
                                        <!----li><a href="<?php echo base_url(); ?>why_to_zoogol">WHY TO TRAVELMAX <span class="border-nav">|</span></a></li-->


                                        <!---li><a href="/how_to_start">HOW TO START</a></li--->

                                        <!--	<li><a href="/genratelink">Generate Cashback Link</a></li>   --->
                                        <!---li class="d-flex-more"><a href="<?php echo base_url(); ?>#">MORE WITH TRAVELMAX <i class="fa fa-sort-desc" aria-hidden="true"></i></a></li--->
                                    </ul>


                                    <ul class="nav navbar-nav navbar-right ">
                                        <?php //if ($this->session->userdata('is_customer_logged_in')) { 
                                        ?>

                                        <li class="nav-item dropdown social-icons">
                                            <a class="nav-link dropdown-toggle" href="JavaScript:Void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-user"></i> Hi, <?php //echo ucfirst($this->session->userdata('efull_name')); 
                                                                                ?><i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu1 " aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>admin">Dashboard</a>
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>admin/profile">Profile</a>
                                                <a class="dropdown-item" href="https://www.travmaxholidays.com/invite_friend/<?php //echo ucfirst($this->session->userdata('bliss_id')); 
                                                                                                                                ?>">Refer and Earn</a>
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>logout">Logout</a>
                                            </div>
                                        </li>




                                        <!--<li class="dropdown"><a href="JavaScript:Void(0);"><i class="fa fa-user"></i>  Welcome <?php //echo ucfirst($this->session->userdata('full_name')); 
                                                                                                                                    ?><i class="fa fa-angle-down"></i></a>
								 <ul role="menu" class="sub-menu">
                                        <li><a href="<?php echo base_url(); ?>admin">Account</a></li>
										<li><a href="<?php echo base_url(); ?>admin/profile">Profile</a></li> 
										<li><a href="#">Wishzon Card-Purchase</a></li>
										<li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
                                </ul>
								
								
								</li>-->


                                        <?php //} else { 
                                        ?>
                                        <li style="display:none;"><a title="Login" href="javascript:;" data-toggle="modal" data-target="#registerLoginModal"><i class="fa fa-user"></i> Account</a></li>
                                        <?php //} 
                                        ?>



                                        <?php //if ($this->session->userdata('is_customer_logged_in')) { 
                                        ?>
                                        <!--li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-lock"></i> Logout</a></li-->
                                        <?php //} else { 
                                        ?>
                                        <li class="drop-nav">
                                            <a id="login_btn" title="Login" href="javascript:;" data-toggle="modal" data-target="#registerLoginModal"><i class="fa fa-sign-in"></i> Login</a>
                                        </li>





                                        <!---	 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More <i class="fa fa-angle-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu1 " aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>merchants/admin/signup">Merchant Login</a>
          
        </div>  
      </li>  --->
                                        <!--<li class="dropdown">
								<a href="#">More<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
									<li><a href="">Sell on Wishzon</a></li>
									
                                    </ul>
                                </li> -->


                                        <?php //} 
                                        ?>
                                    </ul>
                                </div><!--/.nav-collapse -->
                            </nav>
                        </div><!--/.container-fluid -->

                    </div>

                </div>
            </div>

        </div>



        <!-- </div>
</div> -->


        <script>
            $(document).ready(function() {
                $(".onlinemerchant").click(function() {
                    $(".onlinemerchant").addClass("active");
                    $(".inlinemerchant").removeClass("active")
                });
                $(".inlinemerchant").click(function() {
                    $(".inlinemerchant").addClass("active");
                    $(".onlinemerchant").removeClass("active")
                });
                $(".serch_icon").click(function() {
                    $(".prdcity").toggle()
                })
            });
        </script>

        </div>

        </div>
        </div>
        </div><!--/header-middle-->



    </header>
    <script>
        $("#login_btn").click(function() {
            $("#navbar").removeClass("in");
        });
    </script>