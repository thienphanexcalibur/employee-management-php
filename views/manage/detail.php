<?php require_once('../../config.php'); ?>
<!doctype html> 
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <link href="../../css/index.css" rel="stylesheet">
    <title>Chi tiet nhan vien</title>
    <title>Employee Management</title>
  </head>
  <body>
    <?php require('../../components/navbar.php'); ?>  
    <?php require('../../components/sidebar.php'); ?>
    <div id="page-content-wrapper">
      <?php 
          $id = $_GET["id"];
          $result = $conn->query("SELECT * FROM user WHERE id = '$id'");
          $data = Array($result ->fetch_object());
          $conn->close();
          foreach($data as $field) {
            var_dump($data);
          }

          ?>
      </div>
    <?php require('../../components/footer.php'); ?>
  
  </body>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>
