
    <div class="pagetitle">
      <h1>Sotuvchilar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Sotuvchilar</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sotuvchilar</h5>

              <a href="{{ route('saller.create') }}" class="btn btn-success">Sotuvchi Qo'shish</a>

              <!-- Primary Color Bordered Table -->
              <table class="table datatable " style=" border: 2px solid red !importend"  >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sotuvchi</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Profile</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sallers as $saller)
                      
                    <tr>
                      <th scope="row">{{ $loop->iteration  }}</th>
                      <td>{{ $saller->name }}</td>
                      <td>{{ $saller->phone }}</td>
                      <td>{{ $saller->email }}</td>
                      <td> <a href="{{ route('saller.show',$saller->id) }}" class="btn btn-success">Batafsil</a></td>
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
