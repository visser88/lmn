<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lemon Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Small project for lemonstand">
    <meta name="author" content="Josh Waller">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Lemon Store</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li class="update"><a href="#update">Update <i class="icon-refresh"></i></a></li>
              <li><a href="#chart">Chart</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div id="container" class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="hero-unit">
            <h1>Hello, user!</h1>
            <p>This is a small application used to query waller.lemonstand.com for a new product list, update the local database, and display the results as a list and chart.</p>
            <p><button class="update btn btn-success btn-large">Update Products Now &raquo;</button></p>
          </div>
          <div id="product-list">
	           <div class="row-fluid">
	           		<?php
	           			foreach($products as $i => $product){
	           				if($i == 3){
	           					echo '</div>';
	           					echo '<div class="row-fluid">';
	           				}
	           				echo '<div class="span4 product-item">';
	           				echo $product->name;
	           				echo '</div>';
	           			}
	           		?>
	          </div><!--/row-->
	          <div class="row-fluid">
	          		<div class="span12">
			      		<?php echo $products->links(); ?>
			        </div>
	          </div>
	       </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>Josh Waller 2013</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/default.js"></script>

  </body>
</html>
