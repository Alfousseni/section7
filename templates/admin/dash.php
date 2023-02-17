
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="templates/admin/assets/img/favicon.png" rel="icon">
  <link href="templates/admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="templates/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="templates/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="templates/admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="templates/admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="templates/admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="templates/admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="templates/admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="templates/admin/assets/css/style.css" rel="stylesheet">
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
            <img src="templates/admin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$_SESSION['mail']?></span>
          </a><!-- End Profile Iamge Icon -->

          

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
        <a class="nav-link collapsed" href="index.php?action=true">
          <i class="bi bi-person"></i>
          <span>Deconnection</span>
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
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">DevCred</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $_SESSION['devcred'];?> DC</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Membres</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $_SESSION['count']?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <h5 class="card-title">Missions Effectuer</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Missions num</th>
                        <th scope="col">Enonce</th>
                        <th scope="col">DevCred</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $realisations=$_SESSION['realisation'];
                        //$membersD=unserialize(urldecode($membersD));
                        foreach ($realisations as $realisation) {
                    ?>
                      <tr>
                        <td><?=$realisation['identifier']?></td>
                        <td><?=$realisation['instruction']?></td>
                        <td><?=$realisation['devcred']?></td>
                      </tr>
                      <?php
                        }
                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                

                <div class="card-body">
                  <h5 class="card-title">Ajouter votre mission</h5>
                  <form class="row g-3 needs-validation" action="../../index.php" method="POST" novalidate>
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">liens github la mission</label>
                        <div class="input-group has-validation">
                          <input type="url" placeholder="https://example.com" name="github" class="form-control" id="yourUsername" required>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="yourUsername" class="form-label">Numero de la mission</label>
                        <div class="input-group has-validation">
                          <input type="number" name="id_mission" class="form-control" id="yourUsername" required>
                        </div>
                      </div>
                      <button type="submit" name="ajouterMission" class="btn btn-primary">Ajouer</button>
                </form>
                </div>
              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Classement</h5>

              <div class="activity">
              <?php
                        $members=$_SESSION["members"];
                        foreach ($members as $member) {
                    ?>
              <div class="activity-item d-flex">
                  <div class="activite-label"><?=$member['grade']?></div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    <?=$member['user_name']?>
                  </div>
                </div><!-- End activity item-->
                <?php
                        }
                    ?>  
              </div>

            </div>
          </div><!-- End Recent Activity -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Missions</h5>

              <div class="activity">
              <?php
                        $missions=$_SESSION["missions"];
                        foreach ($missions as $mission) {
                    ?>
              <div class="activity-item d-flex">
                  <div class="activite-label"><?=$mission['mission_id']?></div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    <?=$mission['wording']?>
                  </div>
                </div><!-- End activity item-->
                <?php
                        }
                    ?>  
              </div>

            </div>
          </div><!-- End Recent Activity -->

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
  <script src="templates/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="templates/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="templates/admin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="templates/admin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="templates/admin/assets/vendor/quill/quill.min.js"></script>
  <script src="templates/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="templates/admin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="templates/admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="templates/admin/assets/js/main.js"></script>

</body>

</html>