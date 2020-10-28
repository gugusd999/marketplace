<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">product - Tambah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">product</li>
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
          <form action="<?= site_url() ?>product/simpan" method="post" enctype="multipart/form-data">
              
                <?= 
                  form::input([
                    "title" => "nama product",
                    "type" => "text",
                    "fc" => "nama_product",
                    "placeholder" => "tambahkan nama_product",
                  ])
                ?>
                
                <?= 
                  form::select_db([
                    "title" => "brand",
                    "type" => "text",
                    "fc" => "brand_id",
                    "data" => "id",
                    "name" => "nama_brand",
                    "db" => "brand"
                  ])
                ?>
                
                <?= 
                  form::select_db([
                    "title" => "category",
                    "fc" => "category_id",
                    "data" => "id",
                    "name" => "nama_kategori",
                    "db" => "category"
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "model year",
                    "type" => "text",
                    "fc" => "model_year",
                    "placeholder" => "tambahkan model_year",
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "login",
                    "type" => "hidden",
                    "fc" => "login_id",
                    "placeholder" => "tambahkan login_id",
                    "value" => generate_session('datalogin')['id']
                  ])
                ?>


              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>product">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>