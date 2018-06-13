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
          if (isset($data)) {
            $detail = $data[0];
          }
        ?>
        <div class="container">
        <h1>Chi tiết nhân viên</h1>
        <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Họ và tên</label>
              <input type="text" class="form-control" value="<?php echo $detail->fullname ?>" required  name="fullname"  placeholder="Tên nhân viên">
            </div>

            <div class="form-group col-md-6">
              <label>Chức vụ</label>
              <input type="text" value="<? echo $detail->position ?>" class="form-control" required name="position">
            </div>

            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="email" value="<? echo $detail->email ?>" class="form-control" required name="email" placeholder="abc@xyz.com">
            </div>

            <div class="form-group col-md-4">
              <label>Ngày sinh</label>
              <input type="date" class="form-control" value="<? echo $detail->dob ?>" name="dob"  placeholder="YYYY/MM/DD">
            </div>
            
            <div class="form-group col-md-4">
              <label>Số CMND</label>
              <input type="text" class="form-control" value="<? echo $detail->identity_number ?>" required placeholder="Số CMND" name="identity_number">
            </div>

            <div class="form-group col-md-2">
            <label>Giới tính</label>
            <select class="form-control" value="<? echo $detail->gender?>" name="gender">
              <option value="1">Nam
              </option>
              <option value="0">
              Nữ
              </option>
            </select>
            </div>
          
          <div class="form-group col-md-4">
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
            <input type="text" class="form-control" id="inputAddress" value="<?php echo $detail->current_address ?>" name="current_address" placeholder="">
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
              <input type="text" value="<?php echo $detail->salary ?>" class="form-control" name="salary">
              <div class="input-group-append">
                <span class="input-group-text"  id="inputGroupPrepend2">VNĐ</span>
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
           $query = "UPDATE user SET fullname = '$fullname', 
           dob = '$dob', 
           email = '$email', 
           position = '$position', 
           salary = '$salary', 
           current_address = '$current_address',
           identity_number = '$identity_number',
           gender = '$gender' WHERE id = '$id'";
           $result = $conn->query($query);
           if (isset($result)) {
           } else {
             echo 'FAILED';
           }
           $conn->close();
         }
      ?>
  
  </body>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>
