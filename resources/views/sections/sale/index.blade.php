
    <div class="pagetitle">
      <h1>Arizalar Jadvali</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Arizalar</a></li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Arizalar</h5>
              <!-- Primary Color Bordered Table -->
              <table class="table datatable " style=" border: 2px solid red !importend"  >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sotuvchi</th>
                    <th scope="col">Mijoz Raqami</th>
                    <th scope="col">Umumiy Buyurtmalar </th>
                    <td scope="col"></td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sales as $sale)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $sale->saller?->name }}</td>
                      <td>{{ $sale->phone }}</td>
                      <td>{{ array_sum(array_values(array_column($sale->products->toArray(), 'count'))) .' ta' }}</td>
                      <td> <a href="{{ route('sale.show',$sale->id) }}" class="btn btn-success">Batafsil</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Primary Color Bordered Table -->

            </div>
          </div>
          
        </div>
      </div>
    </section>
