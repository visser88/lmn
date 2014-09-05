@extends('layouts.default')

@section('content')

    <div id="container" class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="hero-unit">
            <h1>Hello, user!</h1>
            <p>This is a small application used to query waller.lemonstand.com for a new product list, update the local database, and display the results as a list and chart.</p>
            <p><button class="update btn btn-success btn-large">Update Products Now &raquo;</button></p>
          </div>
          <div id="product-list">
	           <?php echo $productList; ?>
	       </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>Josh Waller 2013</p>
      </footer>

    </div><!--/.fluid-container-->
@stop

@section('navbar')
<li class="active"><a href="/">Home</a></li>
<li class="update"><a href="#">Update <i class="icon-refresh"></i></a></li>
<li><a href="/chart">Chart</a></li>
@stop