<div>

  <h1>Login System</h1>

    <?= $alert ?>

    <form action="<?= site_url() ?>login/login_akun_single" method="post">
      
      <?= 
        form::input([
          "title" => "Username",
          "type" => "username",
          "fc" => "username",
          "placeholder" => "inputkan user name",
          "required" => "true",
        ])
      ?>
      
      <?= 
        form::input([
          "title" => "Password",
          "type" => "password",
          "fc" => "password",
          "placeholder" => "inputkan password",
          "required" => "true",
        ])
      ?>
      
    <div class="form-group">

      <button type="submit" class="btn btn-primary">Login</button>
      <a class="btn btn-default" href="<?= site_url(); ?>/login/register">register</a>
    
    </div>

    </form>

</div>