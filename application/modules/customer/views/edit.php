<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">customer - Ubah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">customer</li>
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
          <form action="<?= site_url() ?>customer/update" method="post" enctype="multipart/form-data">
              
                    <input type="hidden" name="id" value="<?= $form_data->id ?>" />
                
                <?= 
                  form::input([
                    "title" => "nama",
                    "type" => "text",
                    "fc" => "nama",
                    "placeholder" => "tambahkan nama",
                    "value" => $form_data->nama,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "no telp",
                    "type" => "text",
                    "fc" => "no_telp",
                    "placeholder" => "tambahkan no_telp",
                    "value" => $form_data->no_telp,
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
                    "title" => "alamat",
                    "type" => "text",
                    "fc" => "alamat",
                    "placeholder" => "tambahkan alamat",
                    "value" => $form_data->alamat,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "kota id",
                    "type" => "text",
                    "fc" => "kota_id",
                    "placeholder" => "tambahkan kota_id",
                    "value" => $form_data->kota_id,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "provinsi id",
                    "type" => "text",
                    "fc" => "provinsi_id",
                    "placeholder" => "tambahkan provinsi_id",
                    "value" => $form_data->provinsi_id,
                  ])
                ?>
                
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
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>customer">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>