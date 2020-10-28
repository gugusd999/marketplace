<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">chat - Ubah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">chat</li>
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
          <form action="<?= site_url() ?>chat/update" method="post" enctype="multipart/form-data">
              
                    <input type="hidden" name="id" value="<?= $form_data->id ?>" />
                
                <?= 
                  form::input([
                    "title" => "pesan",
                    "type" => "text",
                    "fc" => "pesan",
                    "placeholder" => "tambahkan pesan",
                    "value" => $form_data->pesan,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "customer id",
                    "type" => "text",
                    "fc" => "customer_id",
                    "placeholder" => "tambahkan customer_id",
                    "value" => $form_data->customer_id,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "login id",
                    "type" => "text",
                    "fc" => "login_id",
                    "placeholder" => "tambahkan login_id",
                    "value" => $form_data->login_id,
                  ])
                ?>
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>chat">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>