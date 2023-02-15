<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="templates/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Section7</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">

       

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <section class="section">
      <div class="row">
        
        <form action="../../index.php">
        <div class="card">
            <div class="col-md-4">
                    <br>
                  <input type="number" class="form-control" id="validationDefault02" placeholder="entrer le nombre de DevCred">
            </div>
            <div class="card-body">
              <h5 class="card-title">Cocher ce qui devront avoir la DevCred</h5>

              <!-- Dark Table -->
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Cocher</th>
                    <th scope="col">DevCred</th>
                    <th scope="col">Name</th>
                    <th scope="col">Numero de la mission</th>
                    <th scope="col">Liens Github</th>
                    <th scope="col">Dates du depot</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $membersD=$_GET['membersD'];
                        $membersD=unserialize(urldecode($membersD));
                        foreach ($membersD as $memberD) {
                    ?>
                  <tr>
                    <th scope="row"><label><input type="checkbox" name="names[]" value="<?=$memberD['user_name']?>"></label><br></th>
                    <td><?=$memberD['dev_cred']?></td>
                    <td><?=$memberD['user_name']?></td>
                    <td><?=$memberD['id_mission']?></td>
                    <td><a href="<?=$memberD['github_project']?>"><?=$memberD['github_project']?></a></td>
                    <td><?=$memberD['date_realisation']?></td>
                  </tr>
                  <?php
                        }
                    ?>                  
                </tbody>
              </table>
              <button type="submit" name="ajouter" class="btn btn-primary">Ajouer</button>
              <!-- End Dark Table -->
            </div>
          </div>
          </form>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Listes des Membres</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">grade</th>
                    <th scope="col">Devcre</th>
                    <th scope="col">Dates d'adhesion</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                        $members=$_GET['members'];
                        $members=unserialize(urldecode($members));
                        foreach ($members as $member) {
                    ?>
                  <tr>
                    <th scope="row"><?=$member['id']?></th>
                    <td><?=$member['user_name']?></td>
                    <td><?=$member['grade']?></td>
                    <td><?=$member['dev_cred']?></td>
                    <td><?=$member['french_creation_date']?></td>
                  </tr>
                  <?php
                        }
                    ?>  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
             
            </div>
          </div>
          
        
      </div>
    </section>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>AlfTech</span></strong>. All Rights Reserved
    </div>
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>