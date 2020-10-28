<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">harga jual - Ubah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">harga jual</li>
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
          <form action="<?= site_url() ?>harga_jual/update" method="post" enctype="multipart/form-data">
              
                    <input type="hidden" name="id" value="<?= $form_data->id ?>" />
                
                <?= 
                  form::select_db([
                    "title" => "product",
                    "type" => "text",
                    "fc" => "product_id",
                    "placeholder" => "tambahkan product_id",
                    "data" => "id",
                    "name" => "nama_product",
                    "db" => "product",
                    "selected" => $form_data->product_id,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "harga item",
                    "type" => "text",
                    "fc" => "harga_item",
                    "placeholder" => "tambahkan harga_item",
                    "value" => $form_data->harga_item,
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
                <a class="btn btn-default" href="<?= site_url(); ?>harga_jual">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>