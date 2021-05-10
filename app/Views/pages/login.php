<?php $this->extend('layouts/public-layout') ?>
<?php $this->section('title') ?>
	Masuk | Login Simantu
<?php $this->endSection() ?>
<?php $this->section('stack-style') ?>
  <style>
    .form-check-input{
      width: 1.25em !important;
      height: 1.25em !important;
    }

    .form-check .form-check-input{
      margin-right: .5em;
    }

    .form-check-label{
      font-size: 16px;
      font-weight: 600;
      user-select: none;
    }
  </style>
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<div class="container">
  <div class="col-md-4 mx-auto">
    <header>
      <h1 class="font-bold">Masuk</h1>
      <p class="opac">Masuk dengan akun yang lo punya, lo belum ada akun? silahkan daftar <a href="#" class="text-white font-bold">disini</a></p>
    </header>
    <form id="login-auth">
      <div class="form-group mb-2">
        <input type="text" class="form-control form-mod" id="username" autocomplete="off" placeholder="Username">
      </div>
      <div class="form-group mb-3">
        <input type="password" class="form-control form-mod" id="password" autocomplete="off" placeholder="Password">
        <div class="font-bold" id="msg-response">
          
        </div>
      </div>
      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="save-account">
        <label class="form-check-label" for="save-account">
          Simpan akun gue
        </label>
      </div>
      <button type="submit" class="btn btn-light btn-mod">Sign in</button>
    </form>
  </div>
</div>
<?php $this->endSection() ?>
<?php $this->section('prepend-script') ?>
  <script src="https://www.unpkg.com/jquery@3.6.0/dist/jquery.min.js"></script>
  <script>
    $('#login-auth').on('submit', function(e){
      e.preventDefault();
      const username = $('#username');
      const password = $('#password');
      const saveAccount = $('#save-account');
      saveAccount.prop('checked') == true ? saveAccount.val('1') : saveAccount.val('0');

      const msgResponse = $('#msg-response');
      const formData = new FormData();
      formData.append('username', username.val());
      formData.append('password', password.val());
      formData.append('save-account', saveAccount.val());
      $.ajax({
        url: '<?= base_url('auth/validation') ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function(){
					msgResponse.html('Tunggu bentaran ngab...');
				},
        success: function(result) {
          username.removeClass('is-invalid');
          password.removeClass('is-invalid');
          msgResponse.removeClass('invalid-feedback');

          username.addClass('is-valid');
          password.addClass('is-valid');
          msgResponse.addClass('valid-feedback')
          $('.valid-feedback').html('Login sukses, sedang mengarahkan ke dashboard...');
          setInterval(() => {
            window.location.href = `${result.redirect}`
          }, 1000);
        },
        error: function(error){
          username.removeClass('is-valid');
          password.removeClass('is-valid');
          msgResponse.removeClass('valid-feedback');

          username.addClass('is-invalid');
          password.addClass('is-invalid');
          msgResponse.addClass('invalid-feedback')
          $('.invalid-feedback').html('Maaf banget ngab, akun lo ga kedaftar di database kita. Silahkan cek kembali username dan password');
        }
      })
    })
  </script>
<?php $this->endSection() ?>