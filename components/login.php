<main>
  <div class="row justify-content-center">

    <div class="sign-up-container jumbotron col-md-5 mt-5 d-block">
      <h1 class="display-4" id="typeit">Đăng nhập</h1>
      <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        <div class="col-xs-12">
          <h5 class="text-left">Tên đăng nhập:</h5>
          <input type="text" class="form-control mt-1" name="username" required>
      </div>
      <div class="col-xs-12 mt-3">
        <h5 class="text-left">Mật khẩu:</h5>
          <input type="password" name="password" class="form-control mt-1" required>
      </div>
      <button type="submit" class="btn btn-block mt-3">
        <h5>Đăng nhập</h5>
      </button>
    </form>
  </div>
  </div>
</main>
<?php

$query = '';
if (isset($_POST)) {
  // $user_name = '';
  // $password = '';
  $user_name = @$_POST['username'];
  $password = @$_POST['password'];
  $hashed_password = md5($password);
  $query = "SELECT * FROM user WHERE username = '$user_name' AND password = '$hashed_password'";

  $result = $conn->query($query);
 
  // $resultreal = var_dump($result->fetch_object()); 
  if ($result->num_rows == 1) {
    echo "<script> 
    let a = window.location.href;
    window.location.href = `${a}/testing/views/manage.php`;
    </script>";
    $_SESSION['username'] = $user_name;
    // $_SESSION['group_id'] = $result-
  }
  $conn->close();
}
?>
<script src="/testing/js/typeit.min.js"></script>
<script type="module">
  import { init } from '/testing/js/login.js'; 
  init();
  var instance = new TypeIt('#typeit', {
    strings: ['Đăng nhập'],
    //-- Other options...
});
</script>