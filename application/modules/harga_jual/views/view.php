<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">harga jual</h1>
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
				<div class="card-header">
          <?php
            link_button([
              "link" => "harga_jual/tambah_data",
              "class" => "btn btn-success",
              "text" => "Tambah Data",
            ]);
          ?>
				</div>
				<div class="card-body">
					<?= $datatable ?>
				</div>
			</div>
		</div>
	</div>
</section>