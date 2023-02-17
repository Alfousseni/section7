
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
  <style>
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .popup-inner {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            width: 400px;
            height: 300px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
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
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

         

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
        <a class="nav-link collapsed" href="index.php?action=true">
          <i class="bi bi-person"></i>
          <span>Deconnection</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <button onclick="openPopup()" class="btn btn-primary">Ajouter une mission</button>

            <div class="popup" id="popup">
                <div class="popup-inner">
                    <span class="close-btn" onclick="closePopup()">&times;</span>
                    <h2>Ajouter une mission</h2>
                    <form action="../../index.php" method="POST">
                        <label for="wording">Titre :</label>
                        <input type="text" id="wording" name="wording" required><br><br>
                        <label for="devcred">devcred :</label>
                        <input type="number" id="devcred" name="devcred" required><br><br>
                        <label for="instruction">instruction :</label>
                        <textarea id="instruction" name="instruction" required></textarea><br><br>
                        <input type="submit" name="ajouterM" value="Ajouter">
                    </form>
                </div>
            </div>
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
        
        <form action="index.php" method="POST">
        <div class="card">
            <div class="col-md-4">
                    <br>
                  <input type="number" class="form-control" name="dev_cred" id="validationDefault02" placeholder="entrer le nombre de DevCred">
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
                        $membersD=$_SESSION['membersD'];
                        //$membersD=unserialize(urldecode($membersD));
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
          <form action="index.php" method="POST">
        <div class="card">
            <div class="col-md-4">
                    <br>
                  <input type="texte" class="form-control" name="recompense" id="validationDefault02" placeholder="entrer la recompense">
            </div>
            <div class="card-body">
              <h5 class="card-title">Cocher ce qui devront avoir la recompense</h5>

              <!-- Dark Table -->
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Cocher</th>
                    <th scope="col">Recompense</th>
                    <th scope="col">Name</th>
                    <th scope="col">Numero de la mission</th>
                    <th scope="col">Liens Github</th>
                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $membersD=$_SESSION['membersD'];
                        //$membersD=unserialize(urldecode($membersD));
                        foreach ($membersD as $memberD) {
                    ?>
                  <tr>
                    <th scope="row"><label><input type="checkbox" name="names[]" value="<?=$memberD['user_name']?>"></label><br></th>
                    <td><?=$memberD['Recompenses']?></td>
                    <td><?=$memberD['user_name']?></td>
                    <td><?=$memberD['id_mission']?></td>
                    <td><a href="<?=$memberD['github_project']?>"><?=$memberD['github_project']?></a></td>
                    
                  </tr>
                  <?php
                        }
                    ?>                  
                </tbody>
              </table>
              <button type="submit" name="ajouterR" class="btn btn-primary">Ajouer</button>
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
                        $members=$_SESSION["members"];
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
          <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <h5 class="card-title">Missions Effectuer</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Missions num</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Instruction</th>
                        <th scope="col">DevCred</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $missions=$_SESSION['missions'];
                        //$membersD=unserialize(urldecode($membersD));
                        foreach ($missions as $mission) {
                    ?>
                      <tr>
                        <td><?=$mission['mission_id']?></td>
                        <td><?=$mission['wording']?></td>
                        <td><?=$mission['instruction']?></td>
                        <td><?=$mission['devcred']?></td>
                      </tr>
                      <?php
                        }
                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
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
  <script src="templates/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="templates/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="templates/admin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="templates/admin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="templates/admin/assets/vendor/quill/quill.min.js"></script>
  <script src="templates/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="templates/admin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="templates/admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
        function openPopup() {
            document.getElementById("popup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>

</body>

</html>