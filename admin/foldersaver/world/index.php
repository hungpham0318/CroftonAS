<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>!Set Title!</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="world-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/common/css/sb-btn.css" type="text/css"/>  

    <link href="/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  </head>

  <body>
    <div class="navbar-wrapper">
      <div class="container">
<!-- NAVBAR
================================================== -->
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="btn-primary navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">CAS Administration</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">

                <li class="active"><a href="#">Home</a></li>
                <li><a href="/admin/regman/reconadminhtml.php">Recon</a></li>
                <li><a href="/admin/regman/masteradminhtml.php">Master</a></li>
                 <li><a href="/admin/regman/soldadminhtml.php">Sold</a></li>
                  
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Invoicing<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li class="dropdown-header">Billing - Coming Soon</li>
                  
                    <li class=""><a href="/admin/accnts/invoicepdf/index.php">Create New Invoice</a></li>
                    <li class="dropdown-item disabled"><a href="">View Outstanding Invoices</a></li>
                    <li class="dropdown-item disabled"><a href="/admin/accnts/invoicehtml.php">View Outstanding Invoice</a></li>
                    <li><a href="/admin/accnts/invoicehtml.php" >View Paid Invoices</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Payments</li>
                    <li class="dropdown-item disabled"><a href="#" class="disabled">Record Payments</a></li>
                    <li class="dropdown-item disabled"><a href="#" class="disabled">View Payments Info</a></li>
                    
                  </ul>
                </li>
                   <li><a href="#contact">Archives</a></li>
                    <li><a href="#contact">Users</a></li>
                     <li><a href="#contact">Dealers</a></li>
                     
                     <li><a href="#contact">Log Out!</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      
      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-xs-12">
          <h2 class="admin-featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
          </div>
          <div class="admin-insert">
          Table here!
          </div>
      </div>

      

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class=""><a href="#">Back to top</a></p>
        <p>&copy; <?php echo date("Y");?> Crofton Auction Services. &middot;  <?php date_default_timezone_set("America/New_York"); echo date("D M  j Y G:i:s T ");?></p>
      </footer>

    </div><!-- /.container marketing-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <!--  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
   
 <!-- Bootstrap -->
  <!--  <script src="../../dist/js/bootstrap.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
