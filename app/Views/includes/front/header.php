<?php $session = session(); ?>
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
                                    </ul>


                                    <ul class="nav navbar-nav navbar-right ">
                                        <?php if ($session->has('is_customer_logged_in')) {
                                        ?>

                                            <li class="nav-item dropdown social-icons">
                                                <a class="nav-link dropdown-toggle" href="JavaScript:Void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-user"></i> Hi, <?php echo ucfirst($session->full_name); ?><i class="fa fa-angle-down"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu1 " aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="/admin">Dashboard</a>
                                                    <a class="dropdown-item" href="/admin/profile">Profile</a>
                                                    <a class="dropdown-item" href="/invite_friend/<?php echo ucfirst($session->get('trav_id')); ?>">Refer and Earn</a>
                                                    <a class="dropdown-item" href="admin/logout">Logout</a>
                                                </div>
                                            </li>
                                        <?php } else { ?>
                                            <li style="display:none;"><a title="Login" href="javascript:;" data-toggle="modal" data-target="#registerLoginModal"><i class="fa fa-user"></i> Account</a></li>
                                        <?php } ?>
                                        <?php if ($session->has('is_customer_logged_in')) {
                                        ?>
                                            <li><a href="admin/logout"><i class="fa fa-lock"></i> Logout</a></li>
                                        <?php } else { ?>
                                            <li class="drop-nav">
                                                <a id="login_btn" title="Login" href="javascript:;" data-toggle="modal" data-target="#registerLoginModal"><i class="fa fa-sign-in"></i> Login</a>
                                            </li>
                                            <li class="drop-nav" style="margin-left: 10px;">
                                                <a id="" href="/plans">Signup</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        $("#login_btn").click(function() {
            $("#navbar").removeClass("in");
        });
    </script>