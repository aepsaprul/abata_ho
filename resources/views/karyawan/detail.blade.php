@extends('layouts.app')

@section('style')

  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

	<style>
		input:focus{
				outline: none;
		}

		select {
			padding: 0;
			margin: 0;
		}
	</style>
@endsection

@section('content')
	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Ubah Karyawan</h1>
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
							<h3 class="card-title"><i class="fa fa-arrow-left"></i> <a href="{{ url('/karyawan') }}">BACK</a></h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="row">
								<div class="col-md-3">
									<div class="row">
										<div class="col-md-12 text-center">
											@if ($karyawan->foto)
													<img src="{{ asset('../storage/app/public/' . $karyawan->foto) }}" style="max-width: 200px;">
											@else
												<img src="{{ asset('assets/img/no-image.jpg') }}" alt="no-image">
											@endif
										</div>
										<div class="col-md-12 mt-3">
											<dl class="row">
												<dt class="col-sm-8">Ganti Foto</dt>
												<dd class="col-sm-10 rounded">
													<input type="file" name="foto" class="form-control pl-0" id="foto" style="border: none; width: 100%;">
												</dd>
											</dl>
										</div>
									</div>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-4">
											<dl class="row">											
												<dt class="col-sm-8">Nama Lengkap</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded p-2">
													<input type="text" name="nama_lengkap" id="nama_lengkap" style="border: none; width: 100%;" value="{{ $karyawan->nama_lengkap }}" onkeyup="this.value = this.value.toUpperCase()">
												</dd>
												<dt class="col-sm-8">Nama Panggilan</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded p-2">
													<input type="text" name="nama_panggilan" id="nama_panggilan" style="border: none; width: 100%;" value="{{ $karyawan->nama_panggilan }}" onkeyup="this.value = this.value.toUpperCase()">
												</dd>
												<dt class="col-sm-8">Telepon</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded p-2">
													<input type="text" name="telepon" id="telepon" style="border: none; width: 100%;" value="{{ $karyawan->telepon }}" onkeyup="this.value = this.value.toUpperCase()">
												</dd>
												<dt class="col-sm-8">Cabang</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded">
													<select name="master_cabang_id" id="master_cabang_id" class="form-control p-0" style="border: none; width: 100%;">
														@foreach ($cabangs as $cabang)
																<option value="{{ $cabang->id }}" {{ $cabang->id == $karyawan->master_cabang_id ? 'selected' : ' ' }}>{{ $cabang->nama_cabang }}</option>
														@endforeach
													</select>
												</dd>
												<dt class="col-sm-8">Jabatan</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded">
													<select name="master_jabatan_id" id="master_jabatan_id" class="form-control p-0" style="border: none; width: 100%;">
														@foreach ($jabatans as $jabatan)
																<option value="{{ $jabatan->id }}" {{ $jabatan->id == $karyawan->master_jabatan_id ? 'selected' : ' ' }}>{{ $jabatan->nama_jabatan }}</option>
														@endforeach
													</select>
												</dd>
											</dl>
										</div>
										<div class="col-md-4">
											<dl class="row">
												<dt class="col-sm-8">Email</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded p-2">
													<input type="email" name="email" id="email" style="border: none; width: 100%;" value="{{ $karyawan->email }}" onkeyup="this.value = this.value.toLowerCase()">
												</dd>
												<dt class="col-sm-8">Nomor KTP</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded p-2">
													<input type="number" name="nomor_ktp" id="nomor_ktp" style="border: none; width: 100%;" value="{{ $karyawan->nomor_ktp }}">
												</dd>
												<dt class="col-sm-8">Nomor SIM</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded p-2">
													<input type="number" name="nomor_sim" id="nomor_sim" style="border: none; width: 100%;" value="{{ $karyawan->nomor_sim }}">
												</dd>
												<dt class="col-sm-8">Jenis Kelamin</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded">
													<select name="jenis_kelamin" id="jenis_kelamin" class="form-control p-0" style="border: none; width: 100%;">
														<option value="">-- Pilih Jenis Kelamin --</option>
														<option value="L" @if ( $karyawan->jenis_kelamin == "L" ) {{ "selected" }} @endif>LAKI - LAKI</option>
														<option value="P" @if ( $karyawan->jenis_kelamin == "P" ) {{ "selected" }} @endif>PEREMPUAN</option>
													</select>
												</dd>
												<dt class="col-sm-8">Alamat KTP</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded p-2">
													<input type="text" name="alamat_ktp" id="alamat_ktp" style="border: none; width: 100%;" value="{{ $karyawan->alamat_asal }}" onkeyup="this.value = this.value.toUpperCase()">
												</dd>
											</dl>
										</div>
										<div class="col-md-4">
											<dl class="row">
												<dt class="col-sm-8">Tempat Lahir</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded p-2">
													<input type="text" name="tempat_lahir" id="tempat_lahir" style="border: none; width: 100%;" value="{{ $karyawan->tempat_lahir }}" onkeyup="this.value = this.value.toUpperCase()">
												</dd>
												<dt class="col-sm-8">Tanggal Lahir</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded">
													<div class="input-group date" id="tanggal_lahir" data-target-input="nearest">
														<input type="text" class="form-control datetimepicker-input p-0" data-target="#tanggal_lahir" name="tanggal_lahir" style="border: none;" value="{{ $karyawan->tanggal_lahir }}"/>
														<div class="input-group-append" data-target="#tanggal_lahir" data-toggle="datetimepicker">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
														</div>
													</div>
												</dd>
												<dt class="col-sm-8">Agama</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded">
													<select name="agama" id="agama" class="form-control p-0" style="border: none; width: 100%;">
														<option value="">-- Pilih Agama --</option>
														<option value="ISLAM" @if ( $karyawan->agama == "ISLAM" ) {{ "selected" }} @endif>ISLAM</option>
														<option value="KRISTEN" @if ( $karyawan->agama == "KRISTEN" ) {{ "selected" }} @endif>KRISTEN</option>
														<option value="HINDU" @if ( $karyawan->agama == "HINDU" ) {{ "selected" }} @endif>HINDU</option>
														<option value="BUDHA" @if ( $karyawan->agama == "BUDHA" ) {{ "selected" }} @endif>BUDHA</option>
													</select>
												</dd>
												<dt class="col-sm-8">Alamat Sekarang</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded p-2">
													<input type="text" name="alamat_sekarang" id="alamat_sekarang" style="border: none; width: 100%;" value="{{ $karyawan->alamat_domisili }}" onkeyup="this.value = this.value.toUpperCase()">
												</dd>
												<dt class="col-sm-8">Status Perkawinan</dt>
												<dd class="col-sm-10 border-bottom border-warning rounded">
													<select name="status_perkawinan" id="status_perkawinan" class="form-control p-0" style="border: none; width: 100%;">
														<option value="">-- Pilih Status --</option>
														<option value="1" @if ( $karyawan->status_perkawinan == "1" ) {{ "selected" }} @endif>LAJANG</option>
														<option value="2" @if ( $karyawan->status_perkawinan == "2" ) {{ "selected" }} @endif>MENIKAH</option>
														<option value="3" @if ( $karyawan->status_perkawinan == "3" ) {{ "selected" }} @endif>CERAI</option>
													</select>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
					</div>

					{{-- kontrak  --}}
					<div class="card card-primary">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<dl class="row">
										<dt class="col-sm-8">Mulai Kontrak</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded">
											<div class="input-group date" id="mulai_kontrak" data-target-input="nearest">
												<input type="text" class="form-control datetimepicker-input p-0" data-target="#mulai_kontrak" name="mulai_kontrak" style="border: none;" value="{{ $karyawan->mulai_kontrak }}"/>
												<div class="input-group-append" data-target="#mulai_kontrak" data-toggle="datetimepicker">
														<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>
											</div>
										</dd>
									</dl>
								</div>
								<div class="col-md-4">
									<dl class="row">
										<dt class="col-sm-8">Lama Kontrak</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="lama_kontrak" id="lama_kontrak" style="border: none; width: 100%;" value="{{ $karyawan->lama_kontrak }}" onkeyup="this.value = this.value.toUpperCase()">
										</dd>
									</dl>
								</div>
								<div class="col-md-4">
									<dl class="row">
										<dt class="col-sm-8">Akhir Kontrak</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded">
											<div class="input-group date" id="akhir_kontrak" data-target-input="nearest">
												<input type="text" class="form-control datetimepicker-input p-0" data-target="#akhir_kontrak" name="akhir_kontrak" style="border: none;" value="{{ $karyawan->akhir_kontrak }}"/>
												<div class="input-group-append" data-target="#akhir_kontrak" data-toggle="datetimepicker">
														<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>
											</div>
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					
					{{-- media sosial  --}}
					<div class="card card-primary">
						<div class="card-body">
							<div class="row">
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Facebook</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="facebook" id="facebook" style="border: none; width: 100%;" value="{{ $karyawan->facebook }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Instagram</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="instagram" id="instagram" style="border: none; width: 100%;" value="{{ $karyawan->instagram }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Youtube</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="youtube" id="youtube" style="border: none; width: 100%;" value="{{ $karyawan->youtube }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Linkedin</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="linkedin" id="linkedin" style="border: none; width: 100%;" value="{{ $karyawan->linkedin }}">
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
					
					{{-- susunan keluarga sebelum menikah  --}}
					<div class="card card-primary">
						<div class="card-body">
							<div class="row">
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Hubungan</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="hubungan" id="hubungan" style="border: none; width: 100%;" value="{{ $karyawan->hubungan }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Nama</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="nama" id="nama" style="border: none; width: 100%;" value="{{ $karyawan->nama }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-1">
									<dl class="row">
										<dt class="col-sm-8">Usia</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="usia" id="usia" style="border: none; width: 100%;" value="{{ $karyawan->usia }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Pendidikan Terakhir</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" style="border: none; width: 100%;" value="{{ $karyawan->pendidikan_terakhir }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Pekerjaan Terakhir</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="pekerjaan_terakhir" id="pekerjaan_terakhir" style="border: none; width: 100%;" value="{{ $karyawan->pekerjaan_terakhir }}">
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>

					{{-- keluarga setelah menikah  --}}
					<div class="card card-primary">
						<div class="card-body">
							<div class="row">
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Hubungan</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="hubungan" id="hubungan" style="border: none; width: 100%;" value="{{ $karyawan->hubungan }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Nama</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="nama" id="nama" style="border: none; width: 100%;" value="{{ $karyawan->nama }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Tempat Lahir</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="usia" id="usia" style="border: none; width: 100%;" value="{{ $karyawan->usia }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Tanggal Terakhir</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="tanggal_terakhir" id="tanggal_terakhir" style="border: none; width: 100%;" value="{{ $karyawan->pendidikan_terakhir }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Pekerjaan Terakhir</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="pekerjaan_terakhir" id="pekerjaan_terakhir" style="border: none; width: 100%;" value="{{ $karyawan->pekerjaan_terakhir }}">
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>

					{{-- kerabat darurat  --}}
					<div class="card card-primary">
						<div class="card-body">
							<div class="row">
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Hubungan</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="hubungan" id="hubungan" style="border: none; width: 100%;" value="{{ $karyawan->hubungan }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Nama</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="nama" id="nama" style="border: none; width: 100%;" value="{{ $karyawan->nama }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Jenis Kelamin</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="usia" id="usia" style="border: none; width: 100%;" value="{{ $karyawan->usia }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Telepon</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="tanggal_terakhir" id="tanggal_terakhir" style="border: none; width: 100%;" value="{{ $karyawan->pendidikan_terakhir }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-3">
									<dl class="row">
										<dt class="col-sm-8">Alamat</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="pekerjaan_terakhir" id="pekerjaan_terakhir" style="border: none; width: 100%;" value="{{ $karyawan->pekerjaan_terakhir }}">
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>

					{{-- pendidikan  --}}
					<div class="card card-primary">
						<div class="card-body">
							<div class="row">
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Tingkat</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="hubungan" id="hubungan" style="border: none; width: 100%;" value="{{ $karyawan->hubungan }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Nama</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="nama" id="nama" style="border: none; width: 100%;" value="{{ $karyawan->nama }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Kota</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="usia" id="usia" style="border: none; width: 100%;" value="{{ $karyawan->usia }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Jurusan</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="tanggal_terakhir" id="tanggal_terakhir" style="border: none; width: 100%;" value="{{ $karyawan->pendidikan_terakhir }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Tahun Masuk</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="pekerjaan_terakhir" id="pekerjaan_terakhir" style="border: none; width: 100%;" value="{{ $karyawan->pekerjaan_terakhir }}">
										</dd>
									</dl>
								</div>
								<div class="col-md-2">
									<dl class="row">
										<dt class="col-sm-8">Tahun Lulus</dt>
										<dd class="col-sm-10 border-bottom border-warning rounded p-2">
											<input type="text" name="pekerjaan_terakhir" id="pekerjaan_terakhir" style="border: none; width: 100%;" value="{{ $karyawan->pekerjaan_terakhir }}">
										</dd>
									</dl>
								</div>
							</div>
						</div>
					</div>
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

<script type="text/javascript">

	$(function () {

		// tanggal lahir
		$('#tanggal_lahir').datetimepicker({
				format: 'YYYY-MM-DD'
		});

		// mulai kontrak
		$('#mulai_kontrak').datetimepicker({
				format: 'YYYY-MM-DD'
		});

		// akhir kontrak
		$('#akhir_kontrak').datetimepicker({
				format: 'YYYY-MM-DD'
		});

	});

	$(document).ready(function () {
		bsCustomFileInput.init();
	});

</script>

@endsection