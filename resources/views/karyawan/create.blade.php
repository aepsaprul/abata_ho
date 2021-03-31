@extends('layouts.app')

@section('style')
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('content')
	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Tambah Karyawan</h1>
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
						<!-- form start -->
						<form role="form" action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">

									{{-- nama lengkap  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="nama_lengkap">Nama Lengkap</label>
											<input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Masukkan nama lengkap" required autofocus value="{{ old('nama_lengkap') }}">
										</div>
									</div>

									@error('nama_lengkap')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- nama panggilan  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="nama_panggilan">Nama Panggilan</label>
											<input type="text" name="nama_panggilan" class="form-control @error('nama_panggilan') is-invalid @enderror" id="nama_panggilan" placeholder="Masukkan nama panggilan" required autofocus value="{{ old('nama_panggilan') }}">
										</div>
									</div>

									@error('nama_panggilan')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								
									{{-- cabang  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="master_cabang_id">Cabang</label>
											<select name="master_cabang_id" id="master_cabang_id" class="form-control">
												@foreach ($cabangs as $cabang)
													<option value="{{ $cabang->id }}">{{ $cabang->nama_cabang }}</option>
												@endforeach
											</select>
										</div>
									</div>
								
									{{-- jabatan  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="master_jabatan_id">Jabatan</label>
											<select name="master_jabatan_id" id="master_jabatan_id" class="form-control">
												@foreach ($jabatans as $jabatan)
													<option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
												@endforeach
											</select>
										</div>
									</div>

									{{-- nomor ktp  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="nomor_ktp">Nomor KTP</label>
											<input type="text" name="nomor_ktp" class="form-control @error('nomor_ktp') is-invalid @enderror" id="nomor_ktp" placeholder="Masukkan nomor KTP" required autofocus value="{{ old('nomor_ktp') }}">
										</div>
									</div>

									@error('nomor_ktp')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								
									{{-- email  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="email">Email</label>
											<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email" required autofocus value="{{ old('email') }}">
										</div>
									</div>

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								
									{{-- telepon  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="telepon">Telepon</label>
											<input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="Masukkan telepon" required autofocus value="{{ old('telepon') }}">
										</div>
									</div>

									@error('telepon')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								
									{{-- telepon darurat  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="telepon_darurat">Telepon Darurat</label>
											<input type="text" name="telepon_darurat" class="form-control @error('telepon_darurat') is-invalid @enderror" id="telepon_darurat" placeholder="Masukkan telepon darurat" required autofocus value="{{ old('telepon_darurat') }}">
										</div>
									</div>

									@error('telepon_darurat')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
									
									{{-- tanggal masuk  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label>Tanggal Masuk:</label>
												<div class="input-group date" id="tanggal_masuk" data-target-input="nearest">
													<input type="text" class="form-control datetimepicker-input" data-target="#tanggal_masuk" name="tanggal_masuk"/>
													<div class="input-group-append" data-target="#tanggal_masuk" data-toggle="datetimepicker">
															<div class="input-group-text"><i class="fa fa-calendar"></i></div>
													</div>
												</div>
										</div>
									</div>		
									
									@error('tanggal_masuk')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- mulai kontrak  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label>Mulai Kontrak:</label>
												<div class="input-group date" id="mulai_kontrak" data-target-input="nearest">
													<input type="text" class="form-control datetimepicker-input" data-target="#mulai_kontrak" name="mulai_kontrak"/>
													<div class="input-group-append" data-target="#mulai_kontrak" data-toggle="datetimepicker">
															<div class="input-group-text"><i class="fa fa-calendar"></i></div>
													</div>
												</div>
										</div>
									</div>		
									
									@error('mulai_kontrak')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- masa kontrak  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="masa_kontrak">Masa Kontrak</label>
											<input type="text" name="masa_kontrak" class="form-control @error('masa_kontrak') is-invalid @enderror" id="masa_kontrak" placeholder="Masukkan masa kontrak" required autofocus value="{{ old('masa_kontrak') }}">
										</div>
									</div>

									@error('masa_kontrak')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- berakhir kontrak  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label>Berakhir Kontrak:</label>
												<div class="input-group date" id="berakhir_kontrak" data-target-input="nearest">
													<input type="text" class="form-control datetimepicker-input" data-target="#berakhir_kontrak" name="berakhir_kontrak"/>
													<div class="input-group-append" data-target="#berakhir_kontrak" data-toggle="datetimepicker">
															<div class="input-group-text"><i class="fa fa-calendar"></i></div>
													</div>
												</div>
										</div>
									</div>		
									
									@error('berakhir_kontrak')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								
									{{-- jenis kelamin  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="jenis_kelamin">Jenis Kelamin</label>
											<input type="text" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" placeholder="Masukkan jenis kelamin" required autofocus value="{{ old('jenis_kelamin') }}">
										</div>
									</div>

									@error('jenis_kelamin')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- tempat lahir  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="tempat_lahir">Tempat Lahir</label>
											<input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukkan tempat lahir" required autofocus value="{{ old('tempat_lahir') }}">
										</div>
									</div>

									@error('tempat_lahir')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- tanggal lahir  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="tanggal_lahir">Tanggal Lahir</label>
											<input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Masukkan tanggal lahir" required autofocus value="{{ old('tanggal_lahir') }}">
										</div>
									</div>

									@error('tanggal_lahir')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- usia  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="usia">Usia</label>
											<input type="text" name="usia" class="form-control @error('usia') is-invalid @enderror" id="usia" placeholder="Masukkan usia" required autofocus value="{{ old('usia') }}">
										</div>
									</div>

									@error('usia')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- pendidikan  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="pendidikan">Pendidikan</label>
											<input type="text" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" placeholder="Masukkan pendidikan" required autofocus value="{{ old('pendidikan') }}">
										</div>
									</div>

									@error('pendidikan')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- status  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="status">Status</label>
											<input type="text" name="status" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="Masukkan status" required autofocus value="{{ old('status') }}">
										</div>
									</div>

									@error('status')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- ibu kandung  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="ibu_kandung">Ibu Kandung</label>
											<input type="text" name="ibu_kandung" class="form-control @error('ibu_kandung') is-invalid @enderror" id="ibu_kandung" placeholder="Masukkan ibu kandung" required autofocus value="{{ old('ibu_kandung') }}">
										</div>
									</div>

									@error('ibu_kandung')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- alamat asal  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="alamat_asal">Alamat Asal</label>
											<input type="text" name="alamat_asal" class="form-control @error('alamat_asal') is-invalid @enderror" id="alamat_asal" placeholder="Masukkan alamat asal" required autofocus value="{{ old('alamat_asal') }}">
										</div>
									</div>

									@error('alamat_asal')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- alamat domisili  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="alamat_domisili">Alamat Domisili</label>
											<input type="text" name="alamat_domisili" class="form-control @error('alamat_domisili') is-invalid @enderror" id="alamat_domisili" placeholder="Masukkan alamat domisili" required autofocus value="{{ old('alamat_domisili') }}">
										</div>
									</div>

									@error('alamat_domisili')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

									{{-- alamat keluarga dekat  --}}
									<div class="col-md-3">
										<div class="form-group">
											<label for="alamat_keluarga_dekat">Alamat Keluarga Dekat</label>
											<input type="text" name="alamat_keluarga_dekat" class="form-control @error('alamat_keluarga_dekat') is-invalid @enderror" id="alamat_keluarga_dekat" placeholder="Masukkan alamat keluarga dekat" required autofocus value="{{ old('alamat_keluarga_dekat') }}">
										</div>
									</div>

									@error('alamat_keluarga_dekat')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror

								</div>
								<hr style="border: 2px solid #000;">
								{{-- ========================================== susunan keluarga ========================================================================= --}}
								<h4>Susunan Keluarga</h4>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group fieldGroup">
											<div class="row">

												{{-- hubungan  --}}
												<div class="col-md-2">												
													<div class="form-group">
														<input type="text" name="susunan_keluarga_hubungan[]" class="form-control @error('susunan_keluarga_hubungan') is-invalid @enderror" id="susunan_keluarga_hubungan" placeholder="Suami / Istri" required autofocus value="{{ old('susunan_keluarga_hubungan') }}">
													</div>
												</div>

												{{-- nama  --}}
												<div class="col-md-2">
													<div class="form-group">
														<input type="text" name="susunan_keluarga_nama[]" class="form-control @error('susunan_keluarga_nama') is-invalid @enderror" id="susunan_keluarga_nama" placeholder="Nama" required autofocus value="{{ old('susunan_keluarga_nama') }}">
													</div>
												</div>

												{{-- jenis kelamin  --}}
												<div class="col-md-2">
													<div class="form-group">
														<input type="text" name="susunan_keluarga_jenis_kelamin[]" class="form-control @error('susunan_keluarga_jenis_kelamin') is-invalid @enderror" id="susunan_keluarga_jenis_kelamin" placeholder="Jenis Kelamin" required autofocus value="{{ old('susunan_keluarga_jenis_kelamin') }}">
													</div>
												</div>

												{{-- usia  --}}
												<div class="col-md-1">
													<div class="form-group">
														<input type="text" name="susunan_keluarga_usia" class="form-control @error('susunan_keluarga_usia') is-invalid @enderror" id="susunan_keluarga_usia" placeholder="Usia" required autofocus value="{{ old('susunan_keluarga_usia') }}">
													</div>
												</div>

												{{-- pendidikan akhir  --}}
												<div class="col-md-2">
													<div class="form-group">
														<input type="text" name="susunan_keluarga_pendidikan_akhir" class="form-control @error('susunan_keluarga_pendidikan_akhir') is-invalid @enderror" id="susunan_keluarga_pendidikan_akhir" placeholder="Pendidikan Akhir" required autofocus value="{{ old('susunan_keluarga_pendidikan_akhir') }}">
													</div>
												</div>

												{{-- pekerjaan terakhir  --}}
												<div class="col-md-2">
													<div class="form-group">
														<input type="text" name="susunan_keluarga_pekerjaan_terakhir" class="form-control @error('susunan_keluarga_pekerjaan_terakhir') is-invalid @enderror" id="susunan_keluarga_pekerjaan_terakhir" placeholder="Pekerjaan Terakhir" required autofocus value="{{ old('susunan_keluarga_pekerjaan_terakhir') }}">
													</div>
												</div>

												<div class="col-md-1"> 
													<a href="javascript:void(0)" class="btn btn-success addMore"><i class="fas fa-plus"></i></a>
												</div>
											</div>
										</div>
														
										<div class="form-group fieldGroupCopy" style="display: none;">
											<div class="row">
												{{-- hubungan  --}}
												<div class="col-md-2">												
													<div class="form-group">
														<input type="text" name="susunan_keluarga_hubungan[]" class="form-control @error('susunan_keluarga_hubungan') is-invalid @enderror" id="susunan_keluarga_hubungan" placeholder="Suami / Istri" required autofocus value="{{ old('susunan_keluarga_hubungan') }}">
													</div>
												</div>

												{{-- nama  --}}
												<div class="col-md-2">
													<div class="form-group">
														<input type="text" name="susunan_keluarga_nama[]" class="form-control @error('susunan_keluarga_nama') is-invalid @enderror" id="susunan_keluarga_nama" placeholder="Nama" required autofocus value="{{ old('susunan_keluarga_nama') }}">
													</div>
												</div>

												{{-- jenis kelamin  --}}
												<div class="col-md-2">
													<div class="form-group">
														<input type="text" name="susunan_keluarga_jenis_kelamin[]" class="form-control @error('susunan_keluarga_jenis_kelamin') is-invalid @enderror" id="susunan_keluarga_jenis_kelamin" placeholder="Jenis Kelamin" required autofocus value="{{ old('susunan_keluarga_jenis_kelamin') }}">
													</div>
												</div>

												{{-- usia  --}}
												<div class="col-md-1">
													<div class="form-group">
														<input type="text" name="susunan_keluarga_usia" class="form-control @error('susunan_keluarga_usia') is-invalid @enderror" id="susunan_keluarga_usia" placeholder="Usia" required autofocus value="{{ old('susunan_keluarga_usia') }}">
													</div>
												</div>

												{{-- pendidikan akhir  --}}
												<div class="col-md-2">
													<div class="form-group">
														<input type="text" name="susunan_keluarga_pendidikan_akhir" class="form-control @error('susunan_keluarga_pendidikan_akhir') is-invalid @enderror" id="susunan_keluarga_pendidikan_akhir" placeholder="Pendidikan Akhir" required autofocus value="{{ old('susunan_keluarga_pendidikan_akhir') }}">
													</div>
												</div>

												{{-- pekerjaan terakhir  --}}
												<div class="col-md-2">
													<div class="form-group">
														<input type="text" name="susunan_keluarga_pekerjaan_terakhir" class="form-control @error('susunan_keluarga_pekerjaan_terakhir') is-invalid @enderror" id="susunan_keluarga_pekerjaan_terakhir" placeholder="Pekerjaan Terakhir" required autofocus value="{{ old('susunan_keluarga_pekerjaan_terakhir') }}">
													</div>
												</div>

												<div class="col-md-1"> 
													<a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-times"></i></a>
												</div>
											</div>
										</div>
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

<!-- bs-custom-file-input -->
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- InputMask -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script type="text/javascript">
	$(function () {

    // tanggal masuk
    $('#tanggal_masuk').datetimepicker({
        format: 'DD/MM/YYYY'
    });

		// mulai kontrak 
		$('#mulai_kontrak').datetimepicker({
        format: 'DD/MM/YYYY'
    });

		// mulai kontrak 
		$('#berakhir_kontrak').datetimepicker({
        format: 'DD/MM/YYYY'
    });
  });
	$(document).ready(function () {
		bsCustomFileInput.init();

		// membatasi jumlah inputan
    var maxGroup = 10;
    
    //melakukan proses multiple input 
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
	});
</script>

@endsection