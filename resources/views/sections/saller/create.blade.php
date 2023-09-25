<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sotuvchi Qo'shish</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                  <img src="/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Orzu Grand</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Sotuvchi yaratish</h5>
                    <p class="text-center small">Foydalanuvchining telefon raqami va emaili avval kiritilmagan bo'lishi kereak</p>
                  </div>

                  <form  action="{{ route('saller.store') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="col-12">
                      <label for="yourName" class="form-label">Ism</label>
                      <input type="text" name="name" class="form-control" id="yourName" value="{{ old('name') }}" required>
                      <div class="invalid-feedback">Iltimos ism kiriting!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Familya</label>
                      <input type="text" name="surname" class="form-control" value="{{ old('surname') }}" id="yourName" required>
                      <div class="invalid-feedback">Iltimos familya kiriting!</div>
                    </div>
                    <div class="col-12">
                      <label for="custom-file-input" id=".custom-file-label" class="form-label">Rasim</label>
                      <input type="file" name="image" class="form-control"  id="custom-file-input" >

                      {{-- <input type="file"  id="custom-file-input" style="display: none">
                      <label for="custom-file-input" class="custom-file-label  form-control">Rasim tanlang...</label> --}}
                      
                      <div class="invalid-feedback">Iltimos rasim kiriting!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="yourEmail" required>
                      <div class="invalid-feedback">Iltimos email kiriting!</div>
                      @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Telefon raqami</label>
                      <div class="input-group has-validation">
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" id="yourPassword" required>
                        <div class="invalid-feedback">Iltimos telefon raqamini kiriting!</div>
                      </div>
                      @error('phone')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
          
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Parol</label>
                      <input type="password" name="password" class="form-control" value="{{ old('password') }}" id="yourPassword" required>
                      <div class="invalid-feedback">Iltimos parol kiriting!</div>
                      @error('password')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
          
                    <div class="col-12">
                      <label for="yourPassword" class="form-label"> Qayata Parol</label>
                      <input type="password" name="confirm_password" class="form-control" value="{{ old('confirm_password') }}" id="yourPassword" required>
                      <div class="invalid-feedback">Iltimos parolni qayta kiriting!</div>
                      @error('confirm_password')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                 

                    <div class="col-12">
                      <button class="btn btn-primary w-100">Sotuvchini yaratish</button>
                    </div>
           
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://findwork.com/" target="_blanck" >Find Work</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
<script>
  const fileInput = document.getElementById("custom-file-input");
const fileLabel = document.querySelector(".custom-file-label");

fileInput.addEventListener("change", function() {
  if (fileInput.files.length > 0) {
    fileLabel.textContent = fileInput.files[0].name;
    fileLabel.classList.remove("file-not-selected");
  } else {
    fileLabel.textContent = "Rasim tanlang...";
    fileLabel.classList.add("file-not-selected");
  }
});

</script>
</body>

</html>