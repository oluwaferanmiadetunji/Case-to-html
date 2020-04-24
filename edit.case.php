<?php
	include("config.php");
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$sql = "SELECT * FROM cases WHERE id=$id;";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck > 0) {
			$row = mysqli_fetch_assoc($result);
			$case_title = $row['case_title'];
			$year = $row['year'];
			$suit_number = $row['suit_number'];
			$date = $row['date'];
			$court = $row['court'];
			$judges = $row['judges'];
			$appellants = $row['appellants'];
			$respondents = $row['respondents'];
			$issue = $row['issue'];
		}
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-home"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="cases.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Cases</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 style="margin-top:20px;" class="h3 mb-2 text-gray-800 text-center">Add Case</h1>

          <div style="margin-top:40px;">
    			<form method="POST" enctype="multipart/form-data" action="update.php">

                    <input type="hidden" name="id" value="<?php echo $id; ?>">

    				<div class="form-group row">
    				    <label for="title" class="col-sm-2 col-form-label form_label" style="color:black;">Case Title</label>
    				    <div class="col-sm-8">
    				    	<input type="text" name="case_title" class="form-control" value="<?php echo $case_title; ?>" required autofocus>
    				    </div>
    				</div>
                    <div class="form-group row">
    				    <label for="year" class="col-sm-2 col-form-label form_label" style="color:black;">Year</label>
    				    <div class="col-sm-8">
    				    	<input type="text" name="year" class="form-control" value="<?php echo $year; ?>" required>
    				    </div>
    				</div>
                    <div class="form-group row">
    				    <label for="suit_number" class="col-sm-2 col-form-label form_label" style="color:black;">Suit Number</label>
    				    <div class="col-sm-8">
    				    	<input type="text" name="suit_number" value="<?php echo $suit_number; ?>" class="form-control" required>
    				    </div>
    				</div>
                    <div class="form-group row">
                        <label for="court" class="col-sm-2 col-form-label form_label" style="color:black;">Court</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="court">
                                <option selected><?php echo $court; ?></option>
                                <option value="Supreme Court">Supreme Court</option>
    							<option value="Court of Appeal">Court of Appeal</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
    				    <label for="date" class="col-sm-2 col-form-label form_label" style="color:black;">Date</label>
    				    <div class="col-sm-8">
    				    	<input type="text" name="date" value="<?php echo $date; ?>" class="form-control" required>
    				    </div>
    				</div>
                    <div class="form-group row">
    				    <label for="judges" class="col-sm-2 col-form-label form_label" style="color:black;">Judges</label>
    				    <div class="col-sm-8">
    				    	<input type="text" name="judges" value="<?php echo $judges; ?>" class="form-control" placeholder="Seperate Judges by commas" required>
    				    </div>
    				</div>
                    <div class="form-group row">
    				    <label for="appellants" class="col-sm-2 col-form-label form_label" style="color:black;">Appellants</label>
    				    <div class="col-sm-8">
    				    	<input type="text" name="appellants" value="<?php echo $appellants; ?>" class="form-control" required>
    				    </div>
    				</div>
                    <div class="form-group row">
    				    <label for="respondents" class="col-sm-2 col-form-label form_label" style="color:black;">Respondents</label>
    				    <div class="col-sm-8">
    				    	<input type="text" name="respondents" value="<?php echo $respondents; ?>" class="form-control" required>
    				    </div>
    				</div>
                    <div class="form-group row">
    				    <label for="issue" class="col-sm-2 col-form-label form_label" style="color:black;">Facts</label>
    				    <div class="col-sm-8">
    				    	<textarea type="text" name="issue" class="form-control" rows="5" style="resize:none;" required><?php echo $issue; ?></textarea>
    				    </div>
    				</div>
    			  	<button name="submit" type="submit" class="btn btn-primary">Update</button>
    			</form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
