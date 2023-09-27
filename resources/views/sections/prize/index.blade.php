
    <div class="pagetitle">
      <h1>Sovrinlar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Sovrinlar</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sovrinlar</h5>
              <a href="{{ route('prize.create') }}" class="btn btn-success">Sovrin qo'shish</a>
             

              <!-- Primary Color Bordered Table -->
              <table class="table datatable " style=" border: 2px solid red !importend"  >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Rasim</th>
                    <th scope="col">Sarlavxa</th>
                    <th scope="col">Batafsil ma'lumot</th>
                    <td scope="col"></td>
                    <td scope="col"></td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($prizes as $prize)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td> <img src="/images/{{ $prize->image}}" style="height: 100px" alt=""> </td>
                      <td>{{ $prize->title }}</td>
                      <td>{{ $prize->description }}</td>
                      <td> <a href="{{ route('prize.edit',$prize->id) }}" class="btn btn-warning">O'zgartirish</a></td>
                      <td>
                        <form action="{{ route('prize.destroy',$prize->id) }}" method="POST">
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
