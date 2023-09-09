@extends('layout/coordinator-lay')
@section('space-work')

<div class="card">
  <div class="card-header">
    Presentation Reports - Charts
  </div>
  <div class="card-body">
    <!-- Bar Chart -->
    <!-- Bar Chart -->
    <div id="barChart" style="min-height: 400px;" class="echart"></div>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
      echarts.init(document.querySelector("#barChart")).setOption({
        xAxis: {
          type: 'category',
          data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
        },
        yAxis: {
          type: 'value'
        },
        series: [{
          data: [120, 200, 150, 80, 70, 110, 130],
          type: 'bar'
        }]
      });
    });
    </script>
    <!-- End Bar Chart -->
  </div>
</div>


@endsection
