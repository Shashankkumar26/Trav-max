<?php
$user_type = "";
if (empty($_GET["plan"])) {
    header("LOCATION: /");
    die();
} else {
    $user_type = $_GET["plan"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="/lib/jquery/jquery-1.11.1.min.js"></script>
    <style>
        body {
            height: 100vh;
        }

        .content_box {
            margin: 0px 20px;
            width: -webkit-fill-available;
            max-width: 450px;
        }

        #container_div {
            height: 100vh;
        }

        #loading_screen {
            position: fixed;
            width: 100%;
            background-color: rgba(255, 255, 255, .8);
            z-index: 10;
        }

        @media only screen and (max-width: 768px) {
            #container_div {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <div id="loading_screen" class="d-flex justify-content-center h-100 align-items-center d-none">
        <div class="spinner-border" role="status" style="width: 3rem; height:3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-md-6 d-flex align-items-center justify-content-center" id="container_div">
            <div class="content_box">
                <div class="text-center my-2 my-md-3">
                    <a href="/">
                        <img height="40px" src="/images/logo.png" alt="">
                    </a>
                </div>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo strtoupper($user_type) ?> PARTNER
                </div>
                <form id="register-form">
                    <div class="alert alert-danger text-center d-none" id="signup_error" role="alert">

                    </div>
                    <div class="row g-0 g-md-3">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="f_name" id="f_name" placeholder="John" required>
                                <label for="f_name">First Name</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Doe" required>
                                <label for="l_name">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="number" type="number" class="form-control" id="phone" placeholder="name@example.com" required>
                        <label for="phone">Phone number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" aria-describedby="emailHelp" required>
                        <label for="email">Email address</label>
                    </div>
                    <div class="row g-0 g-md-3">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control" id="password" placeholder="*********" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input name="cpassword" type="password" class="form-control" id="cpassword" placeholder="*********" required>
                                <label for="password">Confirm Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="trav_id" name="trav_id" placeholder="01234" required value="<?php echo isset($_GET['refer_id']) ? $_GET['refer_id'] : ''; ?>">
                        <label for="trav_id">Referral ID</label>
                    </div>
                    <input type="hidden" name="partner_type" value="<?php echo $user_type; ?>">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I agree to all terms and conditions.</label>
                    </div>
                    <button type="submit" class="btn btn-danger w-100 btn-lg">Sign Up</button>
                </form>
            </div>
        </div>
        <div class="col-md-6 d-none d-md-block" style="background-image: url(/images/signup_bg.jpg); background-position:center; background-size:cover">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<script>
    jQuery("#register-form").submit(function(event) {
        event.preventDefault();
        jQuery("#loading_screen").removeClass("d-none");
        jQuery.ajax({
            type: "POST",
            url: "/register",
            data: jQuery("#register-form").serialize(),
            success: function(data) {
                console.log(data);
                if (data.status == "error") {
                    jQuery("#signup_error").removeClass("d-none");
                    jQuery("#signup_error").text(data.message);
                }else if(data.status == "success"){
                    jQuery("#signup_error").removeClass("d-none");
                    jQuery("#signup_error").removeClass("alert-danger");
                    jQuery("#signup_error").addClass("alert-primary");
                    jQuery("#signup_error").text(data.message);
                    window.location.replace("/admin");
                }
                jQuery("#loading_screen").addClass("d-none");
            }
        });
    });
</script>

</html>