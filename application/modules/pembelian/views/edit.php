<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">pembelian - Ubah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">pembelian</li>
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
          <form action="<?= site_url() ?>pembelian/update" method="post" enctype="multipart/form-data">
              
                    <input type="hidden" name="id" value="<?= $form_data->id ?>" />
                <?= 
                  form::select_db([
                    "title" => "product",
                    "fc" => "product_id",
                    "data" => "id",
                    "name" => "nama_product",
                    "db" => "product",
                    "selected" => $form_data->product_id,
                  ])
                ?>
                
                <?= 
                  form::select_db([
                    "title" => "supplier",
                    "fc" => "supplier_id",
                    "data" => "id",
                    "name" => "nama_supplier",
                    "db" => "supplier",
                    "selected" => $form_data->supplier_id,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "tanggal",
                    "type" => "date",
                    "fc" => "tanggal",
                    "placeholder" => "tambahkan tanggal",
                    "value" => $form_data->tanggal,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "qty",
                    "type" => "number",
                    "fc" => "qty",
                    "placeholder" => "tambahkan qty",
                    "value" => $form_data->qty,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "harga satuan",
                    "type" => "number",
                    "fc" => "harga_satuan",
                    "placeholder" => "tambahkan harga_satuan",
                    "value" => $form_data->harga_satuan,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "harga total",
                    "type" => "number",
                    "fc" => "harga_total",
                    "placeholder" => "tambahkan harga_total",
                    "value" => $form_data->harga_total,
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
                <a class="btn btn-default" href="<?= site_url(); ?>pembelian">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>