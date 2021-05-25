@extends('layouts.app')

@section('style')
	<!-- daterange picker -->
	<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

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
							<h3 class="card-title"><i class="fa fa-arrow-left"></i> <a href="{{ url('/hc/cir') }}">BACK</a></h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" action="{{ route('cir.store') }}" method="POST">
							@csrf
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Nama</label>
												<select class="form-control select2bs4" name="master_jabatan_id" style="width: 100%;">
													<option value="">--Pilih Nama--</option>
													@foreach ($karyawans as $karyawan)
														<option value="{{ $karyawan->id }}">{{ $karyawan->nama_lengkap }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Pilih Formulir</label>
												<select id="jenis" class="form-control" name="jenis" style="width: 100%;">
													<option value="">--Pilih Formulir--</option>
													<option value="cuti">Cuti</option>
													<option value="resign">Resign</option>
												</select>
											</div>
										</div>
										<!-- /.col -->
									</div>
									<div id="jenis_form">
										{{-- content jenis form --}}
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
		$('#jenis').on('change', function () {
			var jenis_val = $('#jenis').val();
			$('#jenis_form').empty();
			
			var cuti_form = "" +
				"<table class=\"table table-bordered\">" +
					"<tr>" +
						"<td><label>Bagian</label></td>" +
						"<td>:</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td><label>No Telp yg aktif</label></td>" +
						"<td>:</td>" +
						"<td><input type=\"number\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td><label>Alamat saat Cuti</label></td>" +
						"<td>:</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
				"</table>" +

				"<label for=\"\">Menerangkan dengan ini bahwa saya bermaksud untuk mengambil cuti :</label>" +
				"<ul style=\"list-style-type: none;\">" +
					"<li><input type=\"radio\" name=\"jenis_cuti\" id=\"\"> Melahirkan</li>" +
					"<li><input type=\"radio\" name=\"jenis_cuti\" id=\"\"> Tahunan</li>" +
					"<li><input type=\"radio\" name=\"jenis_cuti\" id=\"\"> Kematian</li>" +
					"<li><input type=\"radio\" name=\"jenis_cuti\" id=\"\"> Menikah</li>" +
					"<li><input type=\"radio\" name=\"jenis_cuti\" id=\"\"> Lainnya</li>" +
				"</ul>" +

				"<table class=\"table table-bordered\">" +
					"<tr>" +
						"<td>Tanggal</td>" +
						"<td>" +
							"<div class=\"row\">" +
								"<div class=\"col-md-6\">" +
									// "<input type=\"text\" name=\"\" id=\"\" class=\"form-control\" placeholder=\"Tanggal Mulai\">" +
									"<div class=\"input-group date\" id=\"tanggal\" data-target-input=\"nearest\">" +
										"<input type=\"text\" class=\"form-control datetimepicker-input p-0\" data-target=\"#tanggal\" name=\"tanggal\" style=\"border: none;\"/>" +
										"<div class=\"input-group-append\" data-target=\"#tanggal\" data-toggle=\"datetimepicker\">" +
												"<div class=\"input-group-text\"><i class=\"fa fa-calendar\"></i></div>" +
										"</div>" +
									"</div>" +
								"</div>" +
								"<div class=\"col-md-6\">" +
									"<input type=\"text\" name=\"\" id=\"\" class=\"form-control\" placeholder=\"Tanggal Berakhir\">" +
								"</div>" +
							"</div>" +
						"</td>" +
					"</tr>" +
					"<tr>" +
						"<td>Nama karyawan pengganti saat cuti adalah</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>Alasan Cuti (secara lebih detail)</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>Dan saya bersedia berangkat kerja lagi mulai tanggal</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
				"</table>";

			var resign_form = "" +
				"<table class=\"table table-bordered\">" +
					"<tr>" +
						"<td>Jabatan</td>" +
						"<td>:</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>Lokasi Kerja</td>" +
						"<td>:</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>Tanggal Masuk</td>" +
						"<td>:</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>Tanggal Efektif Keluar</td>" +
						"<td>:</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>Alamat Rumah yang ditempati</td>" +
						"<td>:</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>No Telp / HP</td>" +
						"<td>:</td>" +
						"<td><input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td colspan=\"3\">" +
							"<ol>" +
								"<li style=\"text-align: justify\">" +
									"Saya menyatakan segala data yang berhubungan dengan perusahaan Abata dalam bentuk dokumen tertulis,data dalam social media yang tertuang dalam aplikasi WhatsApp,email, faceboook, Instagram ataupun media social lainnya yang berhubungan dengan Abata dan/atau informasi yang saya terima selama saya bekerja di Abata baik secara langsung maupun tidak langsung adalah bukan menjadi hak saya, dan tidak akan memberikan kepada siapapun dalam bentuk apapun tanpa izin dari Abata serta bersedia untuk menghapus,memusnahkan dan/atau mengembalikan semua data yang telah menjadi millik dan hak Abata dalam bentuk apapun dan saya akan tetap bertanggung jawab untuk tetap menjaga kerahasiaan perusahaan" +
								"</li>" +
								"<li style=\"text-align: justify\">" +
									"Saya menyatakan sebelum efektif keluar untuk menyelesaikan segala kewajiban keuangan dan lainnya yang saya miliki terhadap Abata dan apabila sampai dengan tanggal efektif saya keluar segala kewajiban tersebut belum terselesaikan dengan baik maka saya bersedia untuk dilakukan penyelesaian kewajiban tersebut sampai dengan selesai dan jika tidak dapat diselesaikan dengan secara kekeluargaan saya bersedia diselesaikan melalui proses hukum yang berlaku di Indonesia " +
								"</li>" +
								"<li style=\"text-align: justify\">" +
									"Daftar Penyelesaian Kewajiban Karyawan (lakukan checklist jika sudah dilakukan penyelesaian coret tidak perlu)" +
									"<table class=\"mt-3\">" +
										"<tr>" +
											"<td>Kewajiban keuangan</td>" +
											"<td><input type=\"radio\" name=\"\" id=\"\"> Ada / <input type=\"radio\" name=\"\" id=\"\"> Tidak</td>" +
											"<td>Tgl Selesai : <input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
										"</tr>" +
										"<tr>" +
											"<td>Serah terima kerja</td>" +
											"<td><input type=\"radio\" name=\"\" id=\"\"> Ada / <input type=\"radio\" name=\"\" id=\"\"> Tidak</td>" +
											"<td>Tgl Selesai : <input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
										"</tr>" +
										"<tr>" +
											"<td>ID Card karyawan</td>" +
											"<td><input type=\"radio\" name=\"\" id=\"\"> Ada / <input type=\"radio\" name=\"\" id=\"\"> Tidak</td>" +
											"<td>Tgl Selesai : <input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
										"</tr>" +
										"<tr>" +
											"<td>Seragam karyawan</td>" +
											"<td><input type=\"radio\" name=\"\" id=\"\"> Ada / <input type=\"radio\" name=\"\" id=\"\"> Tidak</td>" +
											"<td>Tgl Selesai : <input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
										"</tr>" +
										"<tr>" +
											"<td>Laptop</td>" +
											"<td><input type=\"radio\" name=\"\" id=\"\"> Ada / <input type=\"radio\" name=\"\" id=\"\"> Tidak</td>" +
											"<td>Tgl Selesai : <input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
										"</tr>" +
										"<tr>" +
											"<td>Peralatan kantor</td>" +
											"<td><input type=\"radio\" name=\"\" id=\"\"> Ada / <input type=\"radio\" name=\"\" id=\"\"> Tidak</td>" +
											"<td>Tgl Selesai : <input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
										"</tr>" +
										"<tr>" +
											"<td>Penghapusan email dan akun yg berhubungan dengan kantor</td>" +
											"<td><input type=\"radio\" name=\"\" id=\"\"> Ada / <input type=\"radio\" name=\"\" id=\"\"> Tidak</td>" +
											"<td>Tgl Selesai : <input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
										"</tr>" +
										"<tr>" +
											"<td>Penghapusan chat WA</td>" +
											"<td><input type=\"radio\" name=\"\" id=\"\"> Ada / <input type=\"radio\" name=\"\" id=\"\"> Tidak</td>" +
											"<td>Tgl Selesai : <input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
										"</tr>" +
										"<tr>" +
											"<td>Penutupan rekening bank berhubungan dengan kantor</td>" +
											"<td><input type=\"radio\" name=\"\" id=\"\"> Ada / <input type=\"radio\" name=\"\" id=\"\"> Tidak</td>" +
											"<td>Tgl Selesai : <input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
										"</tr>" +
										"<tr>" +
											"<td>Lain lain</td>" +
											"<td><input type=\"radio\" name=\"\" id=\"\"> Ada / <input type=\"radio\" name=\"\" id=\"\"> Tidak</td>" +
											"<td>Tgl Selesai : <input type=\"text\" name=\"\" id=\"\" class=\"form-control\"></td>" +
										"</tr>" +
									"</table>" +
								"</li>" +
							"</ol>" +
						"</td>" +
					"</tr>" +
				"</table>" +
				"<label>Pilihlah satu diantara Sangat Tidak Setuju sampai dengan Sangat Setuju pada setiap pernyataan berikut ini:</label>" +
				"<table class=\"table table-bordered\">" +
					"<tr>" +
						"<th class=\"text-center\" colspan=\"2\" style=\"width: 50%\">ASPEK KEBUTUHAN DASAR</th>" +
						"<th class=\"text-center\">Sangat Setuju</th>" +
						"<th class=\"text-center\">Setuju</th>" +
						"<th class=\"text-center\">Ragu - ragu</th>" +
						"<th class=\"text-center\">Tidak Setuju</th>" +
						"<th class=\"text-center\">Sangat Tidak Setuju</th>" +
					"</tr>" +
					"<tr>" +
						"<td>1.</td>" +
						"<td>Secara umum saya merasa puas selama bekerja di Abata/Wahana/perfecta Utama</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>2.</td>" +
						"<td>Saya tahu apa yang diharapkan atasan dan perusahaan kepada saya.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>3.</td>" +
						"<td>Atasan saya memberikan pengarahan yang jelas mengenai target kerja yang harus saya capai.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>4.</td>" +
						"<td>Saya memiliki peralatan bantu yang memadai untuk menyelesaikan setiap tugas saya.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>5.</td>" +
						"<td>Waktu kerja yang saya miliki sesuai dengan beban pekerjaan saya.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<th class=\"text-center\" colspan=\"2\">ASPEK TIM KERJA</th>" +
						"<th class=\"text-center\">Sangat Setuju</th>" +
						"<th class=\"text-center\">Setuju</th>" +
						"<th class=\"text-center\">Ragu - ragu</th>" +
						"<th class=\"text-center\">Tidak Setuju</th>" +
						"<th class=\"text-center\">Sangat Tidak Setuju</th>" +
					"</tr>" +
					"<tr>" +
						"<td>6.</td>" +
						"<td>Rekan tim kerja saya menghargai pendapat saya.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>7.</td>" +
						"<td>Rekan tim kerja saya selalu memberikan hasil terbaik dalam bekerja.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>8.</td>" +
						"<td>Di tim kerja, saya memiliki sahabat yang dapat saya ajak bertukar pikirandan berbicara secara personal.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>9.</td>" +
						"<td>Saya mengenal secara pribadi setiap anggota tim kerja saya.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>10.</td>" +
						"<td>Saya paham arti penting pekerjaan saya dalam upaya pencapaian Misi dan Visi.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<th class=\"text-center\" colspan=\"2\">ASPEK KONTRIBUSI</th>" +
						"<th class=\"text-center\">Sangat Setuju</th>" +
						"<th class=\"text-center\">Setuju</th>" +
						"<th class=\"text-center\">Ragu - ragu</th>" +
						"<th class=\"text-center\">Tidak Setuju</th>" +
						"<th class=\"text-center\">Sangat Tidak Setuju</th>" +
					"</tr>" +
					"<tr>" +
						"<td>11.</td>" +
						"<td>Saya memiliki ketrampilan dan keahlian yang memadai untuk	menyelesaikan tugas sehari-hari saya.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>12.</td>" +
						"<td>Atasan saya selalu memberikan pujian atau penghargaan setiap sayamelakukan pekerjaan dengan baik.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>13.</td>" +
						"<td>Atasan saya memberikan bimibingan kepada saya secara teratur.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>14.</td>" +
						"<td>Rekan kerja dan atasan saya peduli kepada saya sebagai seorang manusia.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>15.</td>" +
						"<td>Atasan atau rekan kerja saya selalu mendorong dan mendukung saya untuk berkembang.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>16.</td>" +
						"<td>Saya memiliki kesempatan untuk melakukan pekerjaan sesuai dengan bakat yang saya miliki.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<th class=\"text-center\" colspan=\"2\">ASPEK PERUSAHAAN</th>" +
						"<th class=\"text-center\">Sangat Setuju</th>" +
						"<th class=\"text-center\">Setuju</th>" +
						"<th class=\"text-center\">Ragu - ragu</th>" +
						"<th class=\"text-center\">Tidak Setuju</th>" +
						"<th class=\"text-center\">Sangat Tidak Setuju</th>" +
					"</tr>" +
					"<tr>" +
						"<td>17.</td>" +
						"<td>Setiap orang di perusahaan ini diberikan kesempatan yang sama tanpa menghiraukan latar belakang etnis, gender, usia, ketidak-mampuan, atau perbedaan lainnya.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>18.</td>" +
						"<td>Para rekan kerja saya selalu saling terbuka dan jujur (kecuali terhadap kerahasiaan bisnis).</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>19.</td>" +
						"<td>Saya akan merekomendasikan kepada teman dan keluargasebagai tempat yang menyenangkan untuk bekerja.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<th class=\"text-center\" colspan=\"2\">ASPEK PENGEMBANGAN</th>" +
						"<th class=\"text-center\">Sangat Setuju</th>" +
						"<th class=\"text-center\">Setuju</th>" +
						"<th class=\"text-center\">Ragu - ragu</th>" +
						"<th class=\"text-center\">Tidak Setuju</th>" +
						"<th class=\"text-center\">Sangat Tidak Setuju</th>" +
					"</tr>" +
					"<tr>" +
						"<td>20.</td>" +
						"<td>Atasan saya memberitahu saya tentang kemajuan yang saya capai dalam setahun terakhir.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>21.</td>" +
						"<td>Di perusahaan ini saya berkesempatan mendapatkan pengembangan diri secara profesional dan personal.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>22.</td>" +
						"<td>Selama bekerja saya menentukan sendiri pengembangan karir seperti apa yang saya inginkan.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<th class=\"text-center\" colspan=\"2\">ASPEK REWARDS</th>" +
						"<th class=\"text-center\">Sangat Setuju</th>" +
						"<th class=\"text-center\">Setuju</th>" +
						"<th class=\"text-center\">Ragu - ragu</th>" +
						"<th class=\"text-center\">Tidak Setuju</th>" +
						"<th class=\"text-center\">Sangat Tidak Setuju</th>" +
					"</tr>" +
					"<tr>" +
						"<td>23.</td>" +
						"<td>Sistem penggajian yang diterapkan saat ini sesuai dengan penilaian kinerja.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>24.</td>" +
						"<td>Gaji saya kurang lebih sama dibandingkan perusahaan lain yang setara untuk pekerjaan sejenis</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>25.</td>" +
						"<td>Saya memahami seluruh informasi mengenai benefit yang diberikan perusahaan kepada Karyawan.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>26.</td>" +
						"<td>Besarnya Insentif dan bonus yang diberikan perusahaan sesuai dengan	kebutuhan saya.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
					"<tr>" +
						"<td>27.</td>" +
						"<td>Saat ini perhatian perusahaan sudah cukup baik dibanding perusahaan lain yang saya ketahui.</td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
						"<td class=\"text-center\"><input type=\"radio\" name=\"\" id=\"\"></td>" +
					"</tr>" +
				"</table>" +
				"<label for=\"\">Alasan utama Anda mengundurkan diri (pilih salah satu) :</label>" +
				"<ol style=\"list-style-type: none;\">" +
					"<li><input type=\"radio\" name=\"\" id=\"\"> Pindah ke Perusahaan lain yaitu</li>" +
					"<li><input type=\"radio\" name=\"\" id=\"\"> Melanjutkan sekolah</li>" +
					"<li><input type=\"radio\" name=\"\" id=\"\"> Wiraswasta</li>" +
					"<li><input type=\"radio\" name=\"\" id=\"\"> Tidak bekerja</li>" +
					"<li><input type=\"radio\" name=\"\" id=\"\"> Lainnya</li>" +
				"</ol>" +

				"<label for=\"\">Jelaskan apa yang Anda rasakan dengan beban pekerjaan yang telah diberikan pada Anda dari awal masuk kerja hingga saat ini?</label><br>" +
				"<textarea name=\"\" id=\"\" rows=\"3\" class=\"form-control\"></textarea>" +

				"<label for=\"\">Bagaimana hubungan kerja Anda di lingkungan kerja perusahaan ini?</label><br>" +
				"<p for=\"\">A. Baik, Jelaskan :</p>" +
				"<textarea name=\"\" id=\"\" rows=\"3\" class=\"form-control\"></textarea>" +
				"<p for=\"\">B. Kurang Baik, Jelaskan :</p>" +
				"<textarea name=\"\" id=\"\" rows=\"3\" class=\"form-control\"></textarea>" +
				"<label for=\"\">Berikan pendapat Anda mengenai perusahaan ini sebagi bahan masukan bagi kami</label>" +
				"<textarea name=\"\" id=\"\" rows=\"3\" class=\"form-control\"></textarea>";
			
			if (jenis_val == 'cuti') {
				$('#jenis_form').append(cuti_form);				
			}
			if (jenis_val == 'resign') {
				$('#jenis_form').append(resign_form);
			}

		})
	});

	$(function () {

	// tanggal lahir
	$('#tanggal').datetimepicker({
			format: 'YYYY-MM-DD'
	});

})
  
</script>

@endsection
