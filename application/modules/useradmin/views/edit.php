<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">useradmin - Ubah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">useradmin</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
          <form action="<?= site_url() ?>useradmin/update" method="post" enctype="multipart/form-data">
              
                    <input type="hidden" name="id" value="<?= $form_data->id ?>" />
                
                <?= 
                  form::input([
                    "title" => "username",
                    "type" => "text",
                    "fc" => "username",
                    "placeholder" => "tambahkan username",
                    "value" => $form_data->username,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "password",
                    "type" => "text",
                    "fc" => "password",
                    "placeholder" => "tambahkan password",
                    "value" => $form_data->password,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "sebagai",
                    "type" => "text",
                    "fc" => "sebagai",
                    "placeholder" => "tambahkan sebagai",
                    "value" => $form_data->sebagai,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "email",
                    "type" => "text",
                    "fc" => "email",
                    "placeholder" => "tambahkan email",
                    "value" => $form_data->email,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "telp",
                    "type" => "text",
                    "fc" => "telp",
                    "placeholder" => "tambahkan telp",
                    "value" => $form_data->telp,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "status",
                    "type" => "text",
                    "fc" => "status",
                    "placeholder" => "tambahkan status",
                    "value" => $form_data->status,
                  ])
                ?>
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>useradmin">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>