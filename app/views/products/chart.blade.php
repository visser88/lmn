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
          test
        </div><!--/span-->
      </div><!--/row-->
      <div class="row-fluid">
      <div id="chart" style="height:200px" class="span12">
        <script>
          new Morris.Line({
            element: 'myfirstchart',
            data : [
              { year: '2008', value: 20 },
              { year: '2009', value: 10 },
              { year: '2010', value: 5 },
              { year: '2011', value: 5 },
              { year: '2012', value: 20 }
            ],
            xkey: 'year',
            ykeys: ['value'],
            labels: ['Value']
          });
        </script>
      </div>
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