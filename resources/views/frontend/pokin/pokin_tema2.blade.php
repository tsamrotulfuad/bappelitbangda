@extends('welcome')
@push('scripts')
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/d3-org-chart@3.0.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/d3-flextree@2.1.2/build/d3-flextree.js"></script>
@endpush
@section('content')
<div class="row">
  <div class="fs-1">
    Pohon Kinerja
  </div>
  <div class="fs-3">
    Kota Pasuruan
  </div>
</div>
<div class="row">
  <div class="col-4">
    <div class="d-flex flex-column flex-md-row gap-4 mt-3 align-items-center">
      <div class="list-group">
        <a href="{{ route('pokin.tema1')}}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h6 class="mb-0 fs-5">Satu</h6>
              <p class="mb-0 opacity-75 mt-2">Meningkatnya Pertumbuhan Ekonomi berbasis potensi Lokal</p>
            </div>
            
          </div>
        </a>
        <a href="{{ route('pokin.tema2')}}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h6 class="mb-0 fs-5">Dua</h6>
              <p class="mb-0 opacity-75 mt-2">Pemerataan Ekonomi untuk mengurangi kesenjangan</p>
            </div>
            
          </div>
        </a>
        <a href="{{ route('pokin.tema3')}}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h6 class="mb-0 fs-5">Tiga</h6>
              <p class="mb-0 opacity-75 mt-2">Masyarakat multikutural yang berdaya saing</p>
            </div>
            
          </div>
        </a>
        <a href="{{ route('pokin.tema4')}}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
          <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
              <h6 class="mb-0 fs-5">Empat</h6>
              <p class="mb-0 opacity-75 mt-2">Meningkatnya Kualitas Tatakelola Pemerintahan</p>
            </div>
            
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="col-8 mt-3 text-center">
    <div class="card">
        <div class="chart-container">
          
        </div>
    </div>
  </div>
</div>
@endsection

<script>
    fetch(
      'http://103.165.154.47/api/pokin/kota/tema2'
    )
      .then((d) => d.json())
      .then((data) => {
        chart = new d3.OrgChart()
        .nodeWidth((node) => 400)
          .nodeHeight((node) => 125)
          .nodeContent((node) => {
              return `<div style="background-color:${node.data.color};
              width:${node.width}px;
              height:${node.height}px;
              text-align: center;
              color: white;
             "> 
              <br>
                ${node.data.name} : 
                <br><br>
                <div style="background-color:${node.data.color_indikator};
                width:400px;
                height:50px;
                color: black;"
                </div><br>${node.data.indikator}
              </div>`
          })
          .container('.chart-container')
          .data(data)
          chart.linkUpdate(function (d, i, arr){
              d3.select(this)
                  .attr("stroke", 'black')
                  .attr("stroke-width", 1)
          })
          chart.compact(false).render();
          
      });
  </script>
