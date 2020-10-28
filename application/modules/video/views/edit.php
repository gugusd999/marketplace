<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">video - Ubah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">video</li>
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
          <form action="<?= site_url() ?>video/update" method="post" enctype="multipart/form-data">
              
                    <input type="hidden" name="id" value="<?= $form_data->id ?>" />
                
                <?= 
                  form::input([
                    "title" => "product id",
                    "type" => "text",
                    "fc" => "product_id",
                    "placeholder" => "tambahkan product_id",
                    "value" => $form_data->product_id,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "video",
                    "type" => "text",
                    "fc" => "video",
                    "placeholder" => "tambahkan video",
                    "value" => $form_data->video,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "login id",
                    "type" => "hidden",
                    "fc" => "login_id",
                    "placeholder" => "tambahkan login_id",
                    "value" => generate_session('datalogin')['id']
                  ])
                ?>
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>video">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>