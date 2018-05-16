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
    <!-- <meta http-equiv="refresh" content="5" >  -->
    <title>Dang ki nhan vien moi</title>
  </head>
  <body>
    <?php require('../../components/navbar.php'); ?>  
    <?php require('../../components/sidebar.php'); ?>
    <div id="page-content-wrapper">
      <div class="container">
        <h1>Đăng kí nhân viên</h1>
        <!-- <div class="row ml-2 mt-4">
          <div class="col-sm-4">
            <h5>Thông tin cá nhân</h5>
          </div>

          <div class="col-sm-4">
            <label>Họ và tên</label>
            <input class="form-control">

            <label class="mt-3">Vị trí</label>
            <input class="form-control">
          </div>

          <div class="col-sm-4">
          <label>Ngày tháng năm sinh</label>
            <input class="form-control">
          <label class="mt-3">Quê quán</label>
          <input class="form-control">
          </div>

          <div class="col-sm-4">
            <h5>Thông tin chung</h5>
          </div>

          <div class="col-sm-4">
          <label> </label>
          <input class="form-control">
          </div>
        </div> -->
        <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Họ và tên</label>
              <input type="text" class="form-control" required  name="fullname"  placeholder="Tên nhân viên">
            </div>

            <div class="form-group col-md-6">
              <label>Chức vụ</label>
              <input type="text" class="form-control" required name="position">
            </div>

            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="email" class="form-control" required name="email" placeholder="abc@xyz.com">
            </div>

            <div class="form-group col-md-4">
              <label>Ngày sinh</label>
              <input type="date" class="form-control" name="dob"  placeholder="YYYY/MM/DD">
            </div>
            
            <div class="form-group col-md-4">
              <label>Số CMND</label>
              <input type="text" class="form-control" required placeholder="Số CMND" name="identity_number">
            </div>

            <div class="form-group col-md-2">
            <label>Giới tính</label>
            <select class="form-control" name="gender">
              <option value="1"selected>Nam
              </option>
              <option value="0">
              Nữ
              </option>
            </select>
            </div>
          
          <div class="form-group col-md-4">i
              <label>Tình trạng quan hệ</label>
              <select class="form-control" name="relationship">
                <option selected>Chọn mối quan hệ</option>
                <option value="0"> Độc thân </option>
                <option value="1"> Đã có gia đình </option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputAddress">Địa chỉ nhà</label>
            <input type="text" class="form-control" id="inputAddress" name="current_address" placeholder="">
          </div>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputCity">Thành phố</label>
              <input type="text" class="form-control" name="city" id="inputCity">
            </div>

          <div class="form-group col-md-3">
            <label for="inputState">Quận</label>
            <select id="inputState" name="district" class="form-control">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>

          <div class="form-group col-md-4">
            <label>Mức lương hiện tại</label>
            <div class="input-group">
              <input type="text" class="form-control" name="salary">
              <div class="input-group-append">
                <span class="input-group-text" id="inputGroupPrepend2">VNĐ</span>
              </div>
            </div>
          </div>
       </div>
      <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
  </div>
</div>


    <?php require('../../components/footer.php'); ?>
    <?php 

      if (isset($_POST['fullname'], 
        $_POST['dob'], 
        $_POST['email'], 
        $_POST['position'], 
        $_POST['salary'], 
        $_POST['current_address'], 
        $_POST['identity_number'],
        $_POST['gender'])) {

        $fullname = @$_POST['fullname'];
      $dob = @$_POST['dob'];
      $email = @$_POST['email'];
      $position = @$_POST['position'];
      $salary = @$_POST['salary'];
      $identity_number = @$_POST['identity_number'];
      $current_address = @$_POST['current_address'];
      $gender = @$_POST['gender'];
        $query = "INSERT INTO user (fullname, dob, email, position, salary, current_address, identity_number, gender) VALUES ('$fullname', '$dob', '$email', '$position', '$salary' , '$current_address', '$identity_number', '$gender')";
        $result = $conn->query($query);
        if (isset($result)) {
          echo 'DONE';
        } else {
          echo 'FAILED';
        }
      }
      
    ?>
  
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>  
</html>