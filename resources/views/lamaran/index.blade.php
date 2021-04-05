@extends('layouts.app')

@section('style')

<style>
	table thead tr th {
		text-align: center;
	}
	.nomor {
		text-align: center;
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
					<h1>Data Lamaran</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Lamaran</li>
					</ol>
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
					<div class="card">
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Posisi</th>
									<th>Nama</th>
									<th>Telepon</th>
									<th>Email</th>
									<th>Status</th>
									<th>#</th>
								</tr>
								</thead>
								<tbody>
									@foreach ($lamarans as $key => $lamaran)
										
										<tr>
											<td class="nomor">{{ $key + 1 }}</td>
											<td>
												@if ($lamaran->master_jabatan_id == null)
														Kosong
												@else
													{{ $lamaran->masterJabatan->nama_jabatan }}
												@endif
											</td>
											<td>{{ $lamaran->nama_lengkap }}</td>
											<td>{{ $lamaran->telepon }}</td>
											<td>{{ $lamaran->email }}</td>
											<td class="text-center">
												@if ($lamaran->status_lamaran == 1)
														<b>{{ 'Persyaratan Masuk' }}</b>
													</td>
													<td class="text-center">
														<a href="https://api.whatsapp.com/send?phone=+6281337667055&text=bit.ly/2Wpn5j7" target="_blank" class="btn btn-success">WA</a> |
														<a href="{{ route('lamaran.rekrutmen', [$lamaran->id]) }}" class="btn btn-success"><i class="fa fa-arrow-right"></i></a> | 
												@elseif ($lamaran->status_lamaran == 2)
														<b>{{ 'Mengisi Form Rekrutmen' }}</b>
													</td>
													<td class="text-center">
														<a href="{{ route('lamaran.rekrutmen', [$lamaran->id]) }}" class="btn btn-success"><i class="fa fa-arrow-right"></i></a> | 
												@elseif ($lamaran->status_lamaran == 3)
														<b>{{ 'Interview' }}</b>
													</td>
													<td class="text-center">
														<a href="{{ route('lamaran.rekrutmen', [$lamaran->id]) }}" class="btn btn-success"><i class="fa fa-arrow-right"></i></a> | 
												@elseif ($lamaran->status_lamaran == 4)
														<b>{{ 'Gagal' }}</b>
													</td>
													<td class="text-center">
														<a href="{{ route('lamaran.rekrutmen', [$lamaran->id]) }}" class="btn btn-success"><i class="fa fa-arrow-right"></i></a> | 
												@else 
													{{ '-' }}</td>
													<td class="text-center">
														<a href="{{ route('lamaran.rekrutmen', [$lamaran->id]) }}" class="btn btn-success"><i class="fa fa-arrow-right"></i></a> | 
												@endif
														<a href="{{ route('lamaran.edit', [$lamaran->id]) }}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a> | <a href="{{ route('lamaran.delete', [$lamaran->id]) }}" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus?')"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
									
									@endforeach
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
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

@endsection