<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("wrapper/_partials/head.php") ?>
</head>

<body>
	<!-- [ Header ] start -->
	<?php $this->load->view("wrapper/_partials/header.php") ?>
	<!-- [ Header ] end -->

	<!-- [ Main Content ] start -->
	<div class="pcoded-main-container" style="margin-left: 0px;">
		<div class="pcoded-content">
			<!-- [ breadcrumb ] start -->
			<?php $this->load->view("wrapper/_partials/breadcrumb.php") ?>
			<!-- [ breadcrumb ] end -->
			<!-- [ Main Content ] start -->
			<div class="row">
				<!-- <div class="col-sm-4">
					<div class="card">
						<div class="card-body">
							<div class="saving-data"></div>
							<//?php echo form_open('kehamilan/add_proses', array('id' => 'forms')); ?>
							<div class="form-group fill">
								<label>Nama Toko</label>
								<input type="text" class="form-control" id="fnama" name="nama_toko" placeholder="Masukkan nama toko">
								<span><small id="nama" class="text-danger text-left validasi" style="font-size:10px; width: 10rem;"></small></span>
							</div>
							<div class="form-group fill">
								<select class="form-control select2" name="pendidikan">
									<option value="">Pilih Provinsi</option>
									<//?php
									foreach ($provinsi as $result) { ?>
										<option value="<//?php echo $result['prov_id'] ?>"><//?php echo $result['prov_name'] ?></option>
									<//?php } ?>
								</select>
								<span><small id="pendidikan" class="text-danger text-left" style="font-size:10px; width: 10rem;"></small></span>
							</div>
							<button type="reset" class="btn-sm waves-effect waves-light btn-secondary">Batal</button>
							<button type="submit" class="btn-sm waves-effect waves-light btn-primary">Simpan</button>
							</form>
						</div>
					</div>
				</div> -->
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<div class="col-md-12 text-right">
								<button type="button" class="btn btn-success btn-sm btn-round has-ripple" data-toggle="modal" data-target="#tambahData">
									<i class="feather icon-plus"></i>Tambah data
									<span class="ripple ripple-animate" style="height: 137.031px; width: 137.031px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -62.5115px; left: -54.4802px;"></span>
								</button>
							</div>
							<div class="card-header-left">

								<!-- pencarian -->
								<!-- <?php echo form_open('halaman/Search_process'); ?> -->
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group fill">
											<input type="text" class="form-control" name="nama" placeholder="Masukkan nama barang">
										</div>
									</div>
									<div class="col-sm-1">
										<a role="button" style="width: 100%" data-toggle="tooltip" data-placement="right" title="" data-original-title="Cari" onclick="actControl('data')" style="cursor:pointer" class="btn btn-info btn-block text-white"><i class="fa fa-search"></i></a>
									</div>
								</div>
								<!-- </form> -->
								<!-- tambah data -->
								<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel"><i class="feather icon-map"></i> Tambah Data Barang</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>

											<div class="saving-data"></div>
											<?php echo validation_errors(); ?>
											<?php echo form_open('halaman/add_proses', array('id' => 'forms')); ?>
											<div class="modal-body text-left">
												<div class="form-group fill">
													<label>Nama </label>
													<input type="text" class="form-control" name="nama" placeholder="Masukkan nama">
													<span><small id="nama" class="text-danger text-left validasi" style="font-size:10px; width: 10rem;"></small></span>
												</div>
												<div class="form-group fill">
													<label>Alamat</label>
													<textarea rows="2" class="form-control" name="alamat" placeholder="Masukkan alamat"></textarea>
													<span><small id="alamat" class="text-danger text-left" style="font-size:10px; width: 10rem;"></small></span>
												</div>
												<div class="form-group fill">
													<label>No. Telp</label>
													<input type="text" class="form-control input-number" name="no_telp" placeholder="Masukkan Nomor Telepon">
													<span><small id="no_telp" class="text-danger text-left" style="font-size:10px; width: 10rem;"></small></span>
												</div>

												<div class="form-group fill">
													<label>Upline</label>
													<select name="upline" class="form-control" onchange="selControl('perm_lantai', true);">
														<option value="">---- Pilih Upline ----</option>
														<?php foreach ($list as $num => $row) { ?>
															<option value="<?php echo $row['id_user'] ?>" data-jml="<?php echo count($modl->jumlah_list_upline($row['id_user'])) ?>"><?php echo ucwords($row['nama']); ?></option>
														<?php  } ?>
													</select>
													<span><small id="harga_jual" class="text-danger text-left" style="font-size:10px; width: 10rem;"></small></span>
												</div>

											</div>
											<div class="modal-footer">
												<button type="button" class="btn-sm waves-effect waves-light btn-secondary" data-dismiss="modal">Batal</button>
												<button type="submit" class="btn-sm waves-effect waves-light btn-primary">Simpan</button>
											</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<?php
							// echo "<pre>";
							// print_r($list);
							// exit();
							?>
							<div class="table-responsive-md">
								<div class="load-data"></div>
							</div>

						</div>
					</div>
				</div>

			</div>
			<!-- [ Main Content ] end -->

		</div>



	</div>
	<!-- [ Main Content ] end -->
	<!-- Sticky Footer -->
	<?php $this->load->view("wrapper/_partials/footer.php") ?>
	<!-- Sticky Footer End -->


	<!-- Includes -->
	<?php $this->load->view("wrapper/_partials/scrolltop.php") ?>
	<?php $this->load->view("wrapper/_partials/modal.php") ?>
	<?php $this->load->view("wrapper/_partials/js.php") ?>


	<script>
		// select 2
		$('.select2').select2();
		//save id validasi dengan nama input harus sama
		$("#forms").submit(function(e) {
			e.preventDefault();
			let that = $(e.target)
			var ajaxData = new FormData(that.get(0));
			$.ajax({
				url: $(this).attr('action'),
				data: ajaxData,
				cache: false,
				contentType: false,
				processData: false,
				type: "POST",
				dataType: "JSON",
				success: function(json) {
					if (json.status == 0) {
						if (!json.msg) {
							$("#sav-form").html('');
							for (var x = 0; x < json.err.length; x++) {
								var sSts = $('.isi').val();
								if (sSts == "") {
									$('#' + json.err[x]['id']).html('');
								} else {
									$('#' + json.err[x]['id']).html(json.err[x]['err']);
								}
							}
						} else {
							$(".saving-data").html(json.msg);
						}
					} else {
						$(".saving-data").html(json.msg);
						setTimeout(function() {
							location.reload();
						}, 1500);
					}
				}
			});
			return false;
		});
		// manggil file data
		actControl('data');

		function actControl(x, y) {
			if (x == 'data') {

				$('.preloader').fadeIn();
				var nama = $("input[name=nama]").val();

				$(".load-data").load("<?php echo site_url('halaman/data') ?>" + "?sort=" + (!nama ? ' ' : nama));
				setTimeout(function() {
					$(".alert").fadeOut("slow");
				}, 6500);
				$(".load-data").on("click", ".pagination a", function(e) {
					e.preventDefault();
					const url = $(this).attr('href');
					$(".load-data").load(url);
					return false;
				});

				$('.preloader').fadeOut();
			} else if (x == "delete") {
				swal({
						title: "Konfirmasi",
						text: "Apakah anda akan menghapus data ini ?",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						confirmButtonText: "Ok, Lanjutkan!",
						closeOnConfirm: false,
						showLoaderOnConfirm: true
					},
					function(result) {
						if (result == true) {
							$.ajax({
								url: "<?php echo base_url('halaman') ?>/delete?idx=" + y,
								dataType: "JSON",
								success: function(json) {
									if (json.status == 1) {
										swal.close();
										actControl('data', json.offset);
										$(".saving-data").html(json.msg);
										setTimeout(function() {
											$(".saving-data").html('');
										}, 4000);
									} else {
										$(".saving-data").html(json.msg);
									}
								}
							});
						}
					});
			}
		}
		$('.input-number').on('input', function(event) {
			this.value = this.value.replace(/[^0-9]/g, '');
		});
		selControl("perm_lantai");

		function selControl(x) {
			if (x == "perm_lantai") {
				var option = $('select[name=upline] option:selected').attr('data-jml');
				if (option == 2 || option > 2) {
					alert("Jumlah Upline sudah sesuai dan tidak boleh lebih !");
					$('#tambahData').modal('toggle');
					window.location.reload();
				}

			}
		}
	</script>

</body>

</html>
