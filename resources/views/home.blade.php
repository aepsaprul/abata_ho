@extends('layouts.app')

@section('style')

<script type="text/javascript" src="{{ asset('plugins/chart/chartjs/Chart.js') }}"></script>

@endsection

@section('content')
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div style="width: 100%; height: 300px;">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection

@section('script')

<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: @php echo json_encode($label); @endphp,
      datasets: [{
        label: 'Data Pengunjung',
        data: <?php echo json_encode($data); ?>,
        backgroundColor: '',
        borderColor: '#176BB3',
        borderWidth: 2
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>

@endsection

