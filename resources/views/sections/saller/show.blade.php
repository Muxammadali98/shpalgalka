
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('saller.index') }}">Sotuvchilar</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="/images/{{ $saller->image? $saller->image: '1692179496.jpg' }}" alt="Profile" class="rounded-circle">
              <h2>{{ $saller->name }}</h2>
              <h3>{{ $saller->surname }}</h3>
              <div class="row" style="width: 300px">
                <div class="col-lg-4 " >
                  <h6>Продажи</h6>
                  <p>{{ count($saller->sales->where('status',1)) }}</p>
                </div>
                <div class="col-lg-4 " >
                  <h6>Заказы</h6>
                  <p>{{ count($saller->sales->where('status',0)) }}</p>
                </div> 
                <div class="col-lg-4 " >
                  <h6>Отказано</h6>
                  <p>{{ count($saller->sales->where('status',2)) }}</p>
                </div>
              </div>
              <div class="social-links mt-2 d-flex flex-wrap">
                @foreach ($saller->prizs as $connect)
                    <div class="m-3">
                      <img style="height: 40px" src="/images/{{$connect->prize->image}}" alt="">
                      <p style="text-align: center " >{{ $connect->prize->title }}</p>
                    </div>
                @endforeach

              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Ma'lumotlar</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ma'lumotlarni O'zgartirish</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
          
                  <h5 class="card-title">Foydalanuvchi </h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Ism</div>
                    <div class="col-lg-9 col-md-8">{{ $saller->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Familya</div>
                    <div class="col-lg-9 col-md-8">{{ $saller->surname }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tel Raqami</div>
                    <div class="col-lg-9 col-md-8">{{ $saller->phone }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $saller->email }}</div>
                  </div>
       


                  
                  <!-- Profile Edit Form -->
                  <form action="{{ route('saller.destroy', $saller->id) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <div class="text-center">
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                  </form><!-- End Profile Edit Form -->



                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{ route('saller.update', $saller->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div  class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foydalanuvchi Rasmi</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="/images/{{ $saller->image? $saller->image: '1692179496.jpg' }}" alt="Profile">
                        <div class="pt-2">
                            <input name="image" type="file" class="form-control" id="fullName">
                          {{-- <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> --}}
                          {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Ism</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="{{ $saller->name }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Familya</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="surname" type="text" class="form-control" id="company" value="{{ $saller->surname }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Tel Raqami</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Job" value="{{ $saller->phone }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="{{ $saller->email }}">
                      </div>
                    </div>

                    {{-- <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Joriy Parol</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="old_password" type="text" class="form-control" id="Address" >
                      </div>
                    </div> --}}

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Yangi Parol</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="Phone" >
                      </div>
                    </div>

                    {{-- <div class="row mb-3">
                      <label for="Password" class="col-md-4 col-lg-3 col-form-label">Parol Nusxasi</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="confirm_password" type="password" class="form-control" id="Password">
                      </div>
                    </div> --}}


                      <div class="row mb-3">
                        <label class="col-md-4 col-lg-3 col-form-label">Sovrinlar</label>
                        <div class="col-md-8 col-lg-9">
                          <select class="form-select" name="prize_id" aria-label="Default select example">
                            <option value="">Sovrinni Tanlang</option>
                            @foreach ($prizes as $prize){
                              <option value="{{ $prize->id }}">{{ $prize->title }}</option>
                            }
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="social-links mt-2 d-flex flex-wrap">

                
                        @foreach ($saller->prizs as $connect)
                            <div class="m-3">
                              <img style="height: 40px" src="/images/{{$connect->prize->image}}" alt="">
                              <div >
                                  <p style="text-align: center " >{{ $connect->prize->title }}</p>
                                  <a href="/sovrinlar/{{ $connect->id }}"  class="btn btn-danger btn-sm" title="Remove my profile image" style="height: 26px; padding: 3px"><i  class="bi bi-trash"></i></a>
                              </div>
                            </div>
                        @endforeach
                      </div>

                      
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>





              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
