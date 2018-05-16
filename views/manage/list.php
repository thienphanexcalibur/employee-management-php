<?php require_once('../../config.php'); ?>
<!doctype html> 
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <link href="./../../css/index.css" rel="stylesheet">
    <title>Danh sach nhan vien</title>
  </head>
  <body>
    <?php require('../../components/navbar.php'); ?>  
    <?php require('../../components/sidebar.php'); ?>
    <div id="page-content-wrapper">
      <div class="container">
        <h1>Danh sách nhân viên</h1>
          <p>Xem thông tin chi tiết nhân viên tại bảng dưới đây</p>
        <div class="row mt-5">
        <div class="table-responsive">
        <table class="table">
            <thead>
              <th>Họ và tên</th>
              <th>Vị trí</th>
              <th>Ngày sinh</th>
              <th>Quê Quán</th>
              <th>Giới tính</th>
              <th>Địa chỉ</th>
              <th class="text-right">Số điện thoại</th>
              <th class="text-center">Xóa khỏi danh sách</th>
            </thead>
          <tbody>
          <?php 
          $query = 'SELECT * FROM user';
          $result = $conn->query($query);
          $data = [];
          if ($result) {
              while ($row = $result->fetch_object()){
                  $data[] = $row;
              }
              $result->close();
              $conn->next_result();
          }  
          $conn->close();
          // COUNT(data) == 0
          foreach($data as $value) {
          ?>
            
            <tr>
              <td><a href="detail.php?id=<?php echo $value->id ?>"><?php echo $value->fullname ?></a></td>
              <td><?php echo $value->position ?></td>
              <td><?php echo $value->dob ?></td>
              <td><?php echo isset($value->current_address)? $value->current_address : ""  ?></td>
              <td><?php echo isset($value->gender) ? $value->gender == "1" ? 'Nam' : 'Nữ' : "" ?></td>
              <td><?php echo $value->current_address ?></td>
              <td><?php echo $value->tel ?></td>  
              <td class="text-center trash-icon delete" data-id="<?php echo $value->id ?>">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 20 20">
                <defs>
                  <path id="trash-a" d="M14,3 C14,2.4 13.6,2 13,2 L7,2 C6.4,2 6,2.4 6,3 L6,5 L2,5 L2,7 L3,7 L3,17 C3,17.6 3.4,18 4,18 L16,18 C16.6,18 17,17.6 17,17 L17,7 L18,7 L18,5 L14,5 L14,3 Z M8,4 L12,4 L12,5 L8,5 L8,4 Z M7,9 L9,9 L9,15 L7,15 L7,9 Z M11,9 L13,9 L13,15 L11,15 L11,9 Z M15,7 L15,16 L5,16 L5,7 L15,7 Z"/>
                </defs>
                <g fill="none" fill-rule="evenodd" transform="translate(-2 -2)">
                  <mask id="trash-b" fill="#fff">
                    <use xlink:href="#trash-a"/>
                  </mask>
                  <use fill="#444" fill-rule="nonzero" xlink:href="#trash-a"/>
                  <g id="trashActive" fill="#C4C6D4" mask="url(#trash-b)">
                    <rect width="20" height="20"/>
                  </g>
                </g>
              </svg>
              </td>
            </tr>

          <?php
          }
          ?>
            </tbody>
        </table>
      </div>
      </div>
      </div>
  </div>
    <?php  
      $conn = new mysqli(servername, username, password, dbname);
      if(isset($_POST['row_id'])) {
        $id = $_POST['row_id'];
        $query = "DELETE FROM user WHERE id = '$id'";
        $result = $conn->query($query);
        if ($result) {
          echo 'Deleted';
        }
      }
      $conn->close();
    ?>
    <?php require('../../components/footer.php'); ?>

  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn muốn xóa nhân viên này khỏi danh sách?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" id="deletemodalbutton" class="btn btn-primary">Chắc chắn</button>
      </div>
    </div>
  </div>
</div>
  </body>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script>
  const self = this
  let indexDelete = null;
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

   function showModal () {
      $('#deletemodal').modal({
        show: true
      });
    }
    
    function deletefunc () {
      $.post(`list.php`, { row_id: self.indexDelete }).done(() => {
        location.reload();
      });
    }

    $('.delete').click(function(e) {
      self.indexDelete = $(this).data('id');
      self.showModal();
    });
   

    $('#deletemodalbutton').click(function(e) {
      self.deletefunc()
      e.preventDefault();
    });
    
    


   
</script>
</html>