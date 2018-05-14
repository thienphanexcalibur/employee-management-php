<?php require_once('../config.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/index.css">
    <title>Quản lí nhân sự</title>
  </head>
<body>
    <?php require(ROOT.'/components/navbar.php'); ?>  
    <?php require(ROOT.'/components/sidebar.php'); ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container">
        <h1>Simple Sidebar</h1>
        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
    </div>
    <?php  
?>
</div>

</div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  console.log(window.location.href);
  $(".dashboard").click(function () {
    const baseUrl = "";
    window.location.href = window.location.href;
  });
</script>
</html>