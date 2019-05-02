<!DOCTYPE html>
<html>
<head>
    <title><?= $judul ?><?= !empty($organisasi["nama_panjang"]) ? " &mdash; ".$organisasi["nama_panjang"] : "" ?></title>
		<link href="<?= base_url().$organisasi["logo"] ?>" rel="icon" type="image/x-icon">

  <style>
  .sly-login {
    background-color: #eff3f4;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    font-size: 16px;
    font-family: 'Source Sans Pro', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
  }

  .sly-login * {
    box-sizing: border-box;
  }

  .sly-login form {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    display: block;
    width: 100%;
    max-width: 400px;
    background-color: #FFF;
    margin: 0;
    padding: 2.25em;
    box-sizing: border-box;
    border: solid 1px #DDD;
    border-radius: .5em;
    font-family: 'Source Sans Pro', sans-serif;
  }

  .sly-login form .svgContainer {
    position: relative;
    width: 200px;
    height: 200px;
    margin: 0 auto 1em;
    border-radius: 50%;
    pointer-events: none;
  }

  .sly-login form .svgContainer div {
    position: relative;
    width: 100%;
    height: 0;
    overflow: hidden;
    border-radius: 50%;
    padding-bottom: 100%;
  }

  .sly-login form .svgContainer .mySVG {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
  }

  .sly-login form .title {
    text-align: center;
  }

  .sly-login form .input-box {
    width: 100%;
    padding: 2px;
    margin-bottom: 10px;
  }

  .sly-login form .input-box input {
    border: 1px solid #dcdfe6;
    border-radius: 4px;
    outline: 0;
    color: #606266;
    height: 40px;
    line-height: 40px;
    padding: 0 20px;
    width: 100%;
  }

  .sly-login form .input-box input:hover {
    border-color: #c0c4cc;
  }

  .sly-login form .input-box input:focus {
    border-color: #409EFF;
  }

  .sly-login form .password-show {
    color: #606266;
    cursor: pointer;
  }

  .sly-login form .button-login {
    width: 100%;
    outline: 0;
    color: #ffffff;
    cursor: pointer;
    font-size: 16px;
    border-radius: 4px;
    padding: 9px 20px;
    background-color: #409EFF;
    border: 1px solid #409EFF;
    -webkit-appearance: none;
  }

  .sly-login form .button-login:hover {
    background-color: #66b1ff;
  }

  .invalid-feedback {
    margin-top: 0.25rem;
    font-size: 90%;
    color: #c4183c;
  }

  img {
    width: 200px;
    height: 200px;
  }
  </style>
</head>
<body>
<div class="sly-login">
  <form>
    <div class="svgContainer">
      <!-- <div> -->
        <img src="<?= base_url().$organisasi["logo"] ?>" alt="">
      <!-- </div> -->
    </div>
    <div>
      <div class="input-box">
        <input type="text" id="loginEmail" maxlength="254" name="username" placeholder="Masukkan username" required/>
        <div id="validasi-username" class="invalid-feedback" hidden="true"></div>
      </div>
      <div class="input-box">
        <input type="password" id="loginPassword" name="password" placeholder="Masukkan password" required/>
        <div id="validasi-password" class="invalid-feedback" hidden="true"></div>
      </div>
      <div>
        <label id="showPasswordToggle" for="showPasswordCheck" class="password-show">
          <input id="showPasswordCheck" type="checkbox"/>Tampilkan password.
        </label>
      </div>
      <br/>
      <div>
        <button type="button" id="login" class="button-login">Masuk</button>
      </div>
    </div>

  </form>
</div>
</body>
<script src="<?= base_url("assets/masuk/") ?>TweenMax.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
  $("#showPasswordCheck").click(function() {
    $("#showPasswordCheck").is(":checked") ? $("#loginPassword").attr('type', 'text') : $("#loginPassword").attr('type', 'password');
  });

  $("#login").click(function() {
    $.ajax({
      url: `<?= $api ?>`+`/otentikasi/masuk`,
      dataType: "json",
      type: "POST",
      data : {
          "username": $("#loginEmail").val(),
          "password": $("#loginPassword").val()
      },
      beforeSend: function (e) {
          $("#login").html("<i class=\"fa fa-cog fa-spin mx-1\"></i> Sedang melakukan otentikasi...");
      },
      success: function(response) {
          if (response.status === 200) {
            window.location.assign(`<?= base_url("pengurus/")."beranda" ?>`);
          } else {
            $("#login").html("Masuk");
            
            if (response.keterangan.includes("Username")) {
              $("#validasi-username").removeAttr("hidden");
              $("#validasi-username").html(response.keterangan);
            } else if (response.keterangan.includes("Password")) {
              $("#validasi-username").attr("hidden", "true");
              $("#validasi-password").removeAttr("hidden");
              $("#validasi-password").html(response.keterangan);
            } else if (response.keterangan.includes("Akun")) {
              swal({
                title: "Proses masuk gagal.",
                text: response.keterangan,
                icon: "error",
                button: "Tutup"
              });
            } else {
              $("#validasi-username").removeAttr("hidden");
              $("#validasi-password").removeAttr("hidden");
              $("#validasi-username").html("Username yang anda masukkan tidak benar.");
              $("#validasi-password").html("Password yang anda masukkan tidak benar.");
            }
          }
      },
      error: function (jqXHR, exception) {
          $("#login").html("Masuk");

          if (jqXHR.status === 0) {
              keterangan = "Not connect (verify network).";
          } else if (jqXHR.status == 404) {
              keterangan = "Requested page not found.";
          } else if (jqXHR.status == 500) {
              keterangan = "Internal Server Error.";
          } else if (exception === "parsererror") {
              keterangan = "Requested JSON parse failed.";
          } else if (exception === "timeout") {
              keterangan = "Time out error.";
          } else if (exception === "abort") {
              keterangan = "Ajax request aborted.";
          } else {
              keterangan = "Uncaught Error ("+jqXHR.responseText+").";
          }
          swal({
              title: "Proses masuk gagal.",
              text: keterangan,
              icon: "error",
              button: "Tutup"
          });
      }
    });
  });
});

</script>
</html>