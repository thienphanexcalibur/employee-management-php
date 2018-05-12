<div class="row justify-content-center">
  
  <div class="sign-up-container jumbotron col-md-5 mt-5 d-block">
  <h1 class="display-4">Chào mừng!</h1>

          <div class="col-xs-12">
            <h5 class="text-left">Tên đăng nhập:</h5>
            <input type="text" class="form-control mt-1" placeholder="Địa chỉ Email*" require="true">
          </div>

          <div class="col-xs-12 mt-3">
            <h5 class="text-left">Mật khẩu:</h5>
            <input type="text" class="form-control mt-1" placeholder="********">
          </div>
          <a href="/manage">
            <button type="button" class="btn btn-block mt-3">
              <h5>Đăng nhập</h5>
            </button>
          </a>

    </div>
  </div>
</div>

<script type="module">
  import { init } from '/testing/js/login.js'; 
  init();
</script>