<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">slider - Ubah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">slider</li>
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
          <form action="<?= site_url() ?>slider/update" method="post" enctype="multipart/form-data">
              
                    <input type="hidden" name="id" value="<?= $form_data->id ?>" />
                
                <?= 
                  form::input([
                    "title" => "foto",
                    "type" => "text",
                    "fc" => "foto",
                    "placeholder" => "tambahkan foto",
                    "value" => $form_data->foto,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "title",
                    "type" => "text",
                    "fc" => "title",
                    "placeholder" => "tambahkan title",
                    "value" => $form_data->title,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "keterangan",
                    "type" => "text",
                    "fc" => "keterangan",
                    "placeholder" => "tambahkan keterangan",
                    "value" => $form_data->keterangan,
                  ])
                ?>
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>slider">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>