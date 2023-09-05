
    <div class="pagetitle">
      <h1>Savol Javoblar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('question.index') }}">Savol Javoblar</a></li>
          <li class="breadcrumb-item">Yaratish</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Savol Javoblar</h5>
              <a href="{{ route('question.create') }}" class="btn btn-success">Savol qo'shish</a>
             

              <!-- Primary Color Bordered Table -->
              <table class="table datatable " style=" border: 2px solid red !importend"  >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category </th>
                    <th scope="col">Savol</th>
                    <th scope="col">Javob</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
         
                <tbody>
                  @foreach ($questions as $question)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>
                      @php
                          
                                       
                         $a = array_values(array_filter($categories, function($item)use( $question){
                                  return $item['id'] == $question?->category_id;
                              }));

                        if(!empty($a)){
                          echo $a[0]['title_uz'];
                        }


                        @endphp  
                    </td>
                      <td>{{ $question->question }}</td>
                      <td>{{ $question->response }}</td>
                      <td> <a href="{{ route('question.edit',$question->id) }}" class="btn btn-warning">O'zgartirish</a></td>
                      <td>
                        <form action="{{ route('question.destroy',$question->id) }}" method="POST">
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
