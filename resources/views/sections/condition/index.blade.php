
    <div class="pagetitle">
      <h1>Chegirma Matni</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Chegirma Matni</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Chegirma Matinlari</h5>
              <a href="{{ route('condition.create') }}" class="btn btn-success">Matin qo'shish</a>
             

              <!-- Primary Color Bordered Table -->
              <table class="table datatable " style=" border: 2px solid red !importend"  >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Chegirma </th>
                    <th scope="col">Text</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($conditions as $condition)
                    <tr>
                      <th scope="row">{{ $condition->id }}</th>
                      <td> {{ $condition?->discount?->title }}</td>
                      <td>{{ $condition->text }}</td>
                      <td> <a href="{{ route('condition.edit',$condition->id) }}" class="btn btn-warning">O'zgartirish</a></td>
                      <td>
                        <form action="{{ route('condition.destroy',$condition->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">O'chirish</button>
                        </form>
                      </td>
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
