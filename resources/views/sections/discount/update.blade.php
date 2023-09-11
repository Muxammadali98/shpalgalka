<div class="pagetitle">
    <h1>Form Elements</h1>
    <div class="d-flex justify-content-between">
      <div class="col-md-6">
        <div class="title mb-30">
          <a  href="{{ route('discount.index') }}" class="btn btn-primary" style=" border-color: #4154f1 ; background-color: #4154f1 ;  display: flex; width: 100px;justify-content: space-between;align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"></path>
              <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"></path>
            </svg>
            Ortga
          </a>
        </div>
      </div>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('discount.index') }}">Chegirmalar</a></li>
          <li class="breadcrumb-item">O'zgartirish</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">General Form Elements</h5>

            <!-- General Form Elements -->
            <form action="{{ route('discount.update',$discount->id) }}"  method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input type="file" name="image" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text"  name="title" required value="{{ $discount->title }}" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ $discount->description }}" required name="description" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Sub title</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ $discount->sub_title }}" required name="sub_title" class="form-control">
                </div>
              </div>
   

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <select name="category_id" class="form-select" aria-label="Default select example">
                    @foreach ($categories as $category){
                      <option value="{{ $category['id'] }}" {{ $discount->category_id == $category['id']? 'selected' :'' }}   >{{ $category['title_uz'] }}</option>
                    }
                    @endforeach
                  </select>
                </div>
              </div>

 
 

             

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">O'zgartirish Tugmasi</label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">O'zgartirish</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>


    </div>
  </section>