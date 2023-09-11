
    <div class="pagetitle">
      <h1>Chegirmalar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Chegirmalar</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Chegirmalar</h5>
              <a href="{{ route('discount.create') }}" class="btn btn-success">Chegirma qo'shish</a>
             

              <!-- Primary Color Bordered Table -->
              <table class="table datatable " style=" border: 2px solid red !importend"  >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th> 
                    <th scope="col">Sub Title</th> 
                    <th scope="col">Category</th> 
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($discounts as $discount)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td> <img src="/images/{{ $discount->image}}" style="height: 100px" alt=""> </td>
                      <td>{{ $discount->title }}</td>
                      <td>{{ $discount->description }}</td>  
                      <td>{{ $discount->sub_title }}</td>
                      <td>                      
                        @php
                            $a = array_values(array_filter($categories, function($item)use( $discount){
                                return $item['id'] == $discount?->category_id;
                            }));
                            if(!empty($a)){
                                echo $a[0]['title_uz'];
                            }
                        @endphp  
                       </td>
                      <td> <a href="{{ route('discount.edit',$discount->id) }}" class="btn btn-warning">O'zgartirish</a></td>
                      <td>
                        <form action="{{ route('discount.destroy',$discount->id) }}" method="POST">
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
