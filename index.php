<?php
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Levenshtein Distance</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    <style>
    table {
      table-layout: auto;
      border-collapse: collapse;
      width: 100%;
    }
    table td {
        border: 1px solid #ccc;
        white-space:nowrap;
    }
    </style>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Lev Distance</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">Levenshtein</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <form method="post" action="">

        <div class="form-group">
          <label for="ld_1">Source</label>
          <input type="text" class="form-control" id="ld_1" placeholder="String sumber" name="source">
        </div>

        <div class="form-group">
          <label for="ld_2">Target</label>
          <input type="text" class="form-control" id="ld_2" placeholder="String target" name="target">
        </div>

        <input type="submit" class="btn btn-primary" value="Submit" name="done">
        </form>

    </div>
    <!-- /.container -->

    <!-- get matrix  -->
<?php
  if (isset($_POST['done'])) {
    require_once("lev.php");
  }


?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
