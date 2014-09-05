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
        </div><!--/span-->
      </div><!--/row-->
      <div class="row-fluid">
        <div id="productchart" style=""></div>
        @section('scripts')
          <script>
          new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'productchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
              <?php
                foreach($products as $product){
                  echo '{name: "'.$product['name'].'", value: '.$product['base_price'].'},';
                }
              ?>
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'name',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Price']
          });
          </script>
        @stop
      </div>
      <hr>
      <footer>
        <p>Josh Waller 2013</p>
      </footer>

    </div><!--/.fluid-container-->
@stop

@section('navbar')
<li><a href="/">Home</a></li>
<li class="update"><a href="#">Update <i class="icon-refresh"></i></a></li>
<li class="active"><a href="/chart">Chart</a></li>
@stop