<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">order - Tambah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">order</li>
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
          <form action="<?= site_url() ?>order/simpan" method="post" enctype="multipart/form-data">
              
                <?= 
                  form::input([
                    "title" => "customer id",
                    "type" => "text",
                    "fc" => "customer_id",
                    "placeholder" => "tambahkan customer_id",
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "product id",
                    "type" => "text",
                    "fc" => "product_id",
                    "placeholder" => "tambahkan product_id",
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "tanggal",
                    "type" => "text",
                    "fc" => "tanggal",
                    "placeholder" => "tambahkan tanggal",
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "qty",
                    "type" => "text",
                    "fc" => "qty",
                    "placeholder" => "tambahkan qty",
                  ])
                ?>
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>order">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>