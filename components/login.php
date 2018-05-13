<main>
  <div class="row justify-content-center">

    <div class="sign-up-container jumbotron col-md-5 mt-5 d-block">
      <h1 class="display-4">Chào mừng!</h1>
      <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        <div class="col-xs-12">
          <h5 class="text-left">Tên đăng nhập:</h5>
          <input type="text" class="form-control mt-1" value="<?php $user_name ?>" name="username" placeholder="Địa chỉ Email*">
      </div>
      <div class="col-xs-12 mt-3">
        <h5 class="text-left">Mật khẩu:</h5>
          <input type="password" name="password" value="<?php $password ?>"class="form-control mt-1" placeholder="********">
      </div>
      <button type="submit" class="btn btn-block mt-3">
        <h5>Đăng nhập</h5>
      </button>
    </form>
  </div>
  </div>
</main>
<?php 
$password = '';
$user_name = '';
$query = '';
if (isset($_POST)) {
  $user_name = $_POST['username'];
  $user_name = $_POST['password'];
  $query = "SELECT * FROM user";

  $result = $conn->query($query);

  while($row = $result->fetch_assoc()) {
    echo $row['username'];
  }
}
?>
<script type="module">
  import { init } from '/testing/js/login.js'; init();
</script>