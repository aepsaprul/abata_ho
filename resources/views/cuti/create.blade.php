@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

	
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Tambah Formulir</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					@if(session('status'))
						<div class="alert alert-success">
								{{session('status')}}
						</div>
					@endif

					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title"><i class="fa fa-arrow-left"></i> <a href="{{ url('/hc/cuti') }}">BACK</a></h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" action="{{ route('cir.store_cuti') }}" method="POST">
							@csrf
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Nama</label>
												<p>{{ $nama_karyawan->nama_lengkap }}</p>
												<input type="hidden" name="master_karyawan_id" value="{{ $nama_karyawan->id }}">
											</div>
										</div>
									</div>									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Nama Atasan Langsung</label>
												<select class="form-control select2bs4" name="atasan" style="width: 100%;">
													<option value="">--Pilih Nama--</option>
													@foreach ($karyawans as $karyawan)
														<option value="{{ $karyawan->id }}">{{ $karyawan->nama_lengkap }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>

									{{-- formulir cuti  --}}
									<div id="formulir_cuti">
										<table class="table table-bordered">
											<tr>
												<td><label>Bagian</label></td>
												<td>:</td>
												<td>
													<select name="master_jabatan_id" id="master_jabatan_id" class="form-control">
														<option value="">--Pilih Bagian--</option>
														@foreach ($jabatans as $jabatan)
																<option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
														@endforeach
													</select>
												</td>
											</tr>
											<tr>
												<td><label>No Telp yg aktif</label></td>
												<td>:</td>
												<td><input type="number" name="cuti_telepon" id="cuti_telepon" class="form-control"></td>
											</tr>
											<tr>
												<td><label>Alamat saat Cuti</label></td>
												<td>:</td>
												<td><input type="text" name="cuti_alamat" id="cuti_alamat" class="form-control"></td>
											</tr>
										</table>
						
										<label for="">Menerangkan dengan ini bahwa saya bermaksud untuk mengambil cuti :</label>
										<ul style="list-style-type: none;">
											<li><input type="radio" name="cuti_jenis" id="cuti_jenis" value="melahirkan"> Melahirkan</li>
											<li><input type="radio" name="cuti_jenis" id="cuti_jenis" value="tahunan"> Tahunan</li>
											<li><input type="radio" name="cuti_jenis" id="cuti_jenis" value="kematian"> Kematian</li>
											<li><input type="radio" name="cuti_jenis" id="cuti_jenis" value="menikah"> Menikah</li>
											<li><input type="radio" name="cuti_jenis" id="cuti_jenis" value="lainnya"> Lainnya</li>
										</ul>
						
										<table class="table table-bordered">
											<tr>
												<td>Tanggal</td>
												<td>
													<div class="row">
														<div class="col-md-6">
															<input type="text" name="cuti_tanggal_mulai" id="cuti_tanggal_mulai" class="form-control" placeholder="Tanggal Mulai">
														</div>
														<div class="col-md-6">
															<input type="text" name="cuti_tanggal_berakhir" id="cuti_tanggal_berakhir" class="form-control" placeholder="Tanggal Berakhir">
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td>Nama karyawan pengganti saat cuti adalah</td>
												<td>
													<select class="form-control select2bs4" name="cuti_pengganti" style="width: 100%;">
														<option value="">--Kosong--</option>
														@foreach ($karyawans as $karyawan)
															<option value="{{ $karyawan->id }}">{{ $karyawan->nama_lengkap }}</option>
														@endforeach
													</select>
												</td>
											</tr>
											<tr>
												<td>Alasan Cuti (secara lebih detail)</td>
												<td><input type="text" name="cuti_alasan" id="cuti_alasan" class="form-control"></td>
											</tr>
											<tr>
												<td>Dan saya bersedia berangkat kerja lagi mulai tanggal</td>
												<td><input type="text" name="cuti_tanggal_kerja" id="cuti_tanggal_kerja" class="form-control"></td>
											</tr>
										</table>
									</div>
									
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
						<!-- /.card -->
					</div>
				<!-- /.col -->
				</div>
			<!-- /.row -->
			</div>
		<!-- /.container-fluid -->
		</section>
	</div>
	<!-- /.content-wrapper -->

@endsection

@section('script')

<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
		//Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })

	$(document).ready(function () {

					$( "#cuti_tanggal_mulai" ).datepicker({
						dateFormat: "yy-mm-dd"
					});
					$( "#cuti_tanggal_berakhir" ).datepicker({
						dateFormat: "yy-mm-dd"
					});
					$( "#cuti_tanggal_kerja" ).datepicker({
						dateFormat: "yy-mm-dd"
					});

			// if (jenis_val == 'resign') {
			// 	$('#formulir_resign').show();				
			// 	$('#formulir_cuti').hide();

			// 	$( "#resign_tanggal_masuk" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});

			// 	$( "#resign_tanggal_keluar" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});

			// 	$( "#resign_tanggal_kewajiban_keuangan" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});
				
			// 	$( "#resign_tanggal_serah_terima" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});
				
			// 	$( "#resign_tanggal_id_card" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});
				
			// 	$( "#resign_tanggal_seragam_karyawan" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});
				
			// 	$( "#resign_tanggal_laptop" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});
				
			// 	$( "#resign_tanggal_peralatan_kantor" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});
				
			// 	$( "#resign_tanggal_penghapusan_akun" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});
				
			// 	$( "#resign_tanggal_penghapusan_chat" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});
				
			// 	$( "#resign_tanggal_penutupan_rekening" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});
				
			// 	$( "#resign_tanggal_lain" ).datepicker({
			// 		dateFormat: "yy-mm-dd"
			// 	});
			// }

		
	});

	
  
</script>

@endsection
