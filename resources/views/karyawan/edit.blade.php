@extends('layouts.app')

@section('style')
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
						<!-- form start -->
						<form role="form" action="{{ route('karyawan.update', [$karyawan->id]) }}" method="POST" enctype="multipart/form-data">
							@method('PUT')
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-md-4">
										<dl class="row">
											<dt class="col-sm-4 p-2">Posisi</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="">
											</dd>
											<dt class="col-sm-4 p-2">Nama Lengkap</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->nama_lengkap }}">
											</dd>
											<dt class="col-sm-4 p-2">Nama Panggilan</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->nama_panggilan }}">
											</dd>
											<dt class="col-sm-4 p-2">Telepon</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->telepon }}">
											</dd>
											<dt class="col-sm-4 p-2">Email</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->email }}">
											</dd>
											<dt class="col-sm-4 p-2">Nomor KTP</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->nomor_ktp }}">
											</dd>
											<dt class="col-sm-4 p-2">Nomor SIM</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->nomor_sim }}">
											</dd>
											<dt class="col-sm-4 p-2">Cabang</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<select name="master_cabang_id" id="master_cabang_id" class="form-control" style="border: none; width: 100%;">
													@foreach ($cabangs as $cabang)
															<option value="{{ $cabang->id }}"
																{{ $cabang->id == $karyawan->master_cabang_id ? 'selected' : ' ' }}
																>{{ $cabang->nama_cabang }}</option>
													@endforeach
												</select>
											</dd>
											<dt class="col-sm-4 p-2">Jabatan</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<select name="master_jabatan_id" id="master_jabatan_id" class="form-control" style="border: none; width: 100%;">
													@foreach ($jabatans as $jabatan)
															<option value="{{ $jabatan->id }}"
																{{ $jabatan->id == $karyawan->master_jabatan_id ? 'selected' : ' ' }}
																>{{ $jabatan->nama_jabatan }}</option>
													@endforeach
												</select>
											</dd>
										</dl>
									</div>
									<div class="col-md-4">
										<dl class="row">
											<dt class="col-sm-4 p-2">Tempat Lahir</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->tempat_lahir }}">
											</dd>
											<dt class="col-sm-4 p-2">Tanggal Lahir</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->tanggal_lahir }}">
											</dd>
											<dt class="col-sm-4 p-2">Agama</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->agama }}">
											</dd>
											<dt class="col-sm-4 p-2">Jenis Kelamin</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->jenis_kelamin }}">
											</dd>
											<dt class="col-sm-4 p-2">Alamat KTP</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->alamat_asli }}">
											</dd>
											<dt class="col-sm-4 p-2">Alamat Sekarang</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->alamat_domisili }}">
											</dd>
											<dt class="col-sm-4 p-2">Status Perkawinan</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->status_perkawinan }}"></dd>										
											<dt class="col-sm-4 p-2">Pernyataan</dt>
											<dd class="col-sm-8 border-bottom border-warning rounded p-2">
												<input type="text" name="" id="" style="border: none; width: 100%;" value="{{ $karyawan->nomor_sim }}">
											</dd>
										</dl>
									</div>
								</div>
								<div class="form-group">
									<label for="nama_lengkap">Nama Lengkap Karyawan</label>
									<input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Masukkan nama_lengkap" required value="{{ $karyawan->nama_lengkap }}">
								</div>

								@error('nama_lengkap')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<div class="form-group">
									<label for="nama_panggilan">Nama Panggilan Karyawan</label>
									<input type="text" name="nama_panggilan" class="form-control @error('nama_panggilan') is-invalid @enderror" id="nama_panggilan" placeholder="Masukkan nama lengkap" required value="{{ $karyawan->nama_panggilan }}">
								</div>

								@error('nama_panggilan')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								
								<div class="form-group">
									<label for="email">Email Karyawan</label>
									<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email" required value="{{ $karyawan->email }}">
								</div>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								
								<div class="form-group">
									<label for="telepon">Telepon Karyawan</label>
									<input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="Masukkan telepon" required value="{{ $karyawan->telepon }}">
								</div>

								@error('telepon')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								
								<div class="form-group">
									<label for="master_cabang_id">Cabang Karyawan</label>
									<select name="master_cabang_id" id="master_cabang_id" class="form-control">
										@foreach ($cabangs as $cabang)
												<option value="{{ $cabang->id }}"
													{{ $cabang->id == $karyawan->master_cabang_id ? 'selected' : ' ' }}
													>{{ $cabang->nama_cabang }}</option>
										@endforeach
									</select>
								</div>

								@error('master_cabang_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								
								<div class="form-group">
									<label for="master_jabatan_id">Jabatan Karyawan</label>
									<select name="master_jabatan_id" id="master_jabatan_id" class="form-control">
										@foreach ($jabatans as $jabatan)
												<option value="{{ $jabatan->id }}"
													{{ $jabatan->id == $karyawan->master_jabatan_id ? 'selected' : ' ' }}
													>{{ $jabatan->nama_jabatan }}</option>
										@endforeach
									</select>
								</div>

								@error('master_jabatan_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								@if ($karyawan->foto)
										<img src="{{ asset('../storage/app/public/' . $karyawan->foto) }}" style="max-width: 200px;">
								@else
										Foto tidak ada
								@endif
								
								<div class="form-group">
									<label for="foto">Foto</label>
									<input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" placeholder="Masukkan foto" autofocus value="{{ old('foto') }}">
								</div>
							</div>
							<!-- /.card-body -->

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

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

@endsection