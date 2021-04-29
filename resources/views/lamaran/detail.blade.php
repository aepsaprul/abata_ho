@extends('layouts.app')

@section('style')
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{ asset('plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection

@section('content')
	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Detail Lamaran</h1>
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
							<h3 class="card-title"><i class="fa fa-arrow-left"></i> <a href="{{ url('/hc/lamaran') }}">BACK</a></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<dl class="row">
										<dt class="col-sm-4 p-2">Posisi</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->masterJabatan->nama_jabatan }}</dd>
										<dt class="col-sm-4 p-2">Nama Lengkap</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->nama_lengkap }}</dd>
										<dt class="col-sm-4 p-2">Nama Panggilan</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->nama_panggilan }}</dd>
										<dt class="col-sm-4 p-2">Telepon</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->telepon }}</dd>
										<dt class="col-sm-4 p-2">Email</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->email }}</dd>
										<dt class="col-sm-4 p-2">Nomor KTP</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->nomor_ktp }}</dd>
										<dt class="col-sm-4 p-2">Nomor SIM</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->nomor_sim }}</dd>
									</dl>
								</div>
								<div class="col-md-6">
									<dl class="row">
										<dt class="col-sm-4 p-2">Tempat Lahir</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->tempat_lahir }}</dd>
										<dt class="col-sm-4 p-2">Tanggal Lahir</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->tanggal_lahir }}</dd>
										<dt class="col-sm-4 p-2">Agama</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->agama }}</dd>
										<dt class="col-sm-4 p-2">Jenis Kelamin</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->jenis_kelamin }}</dd>
										<dt class="col-sm-4 p-2">Alamat KTP</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->agama }}</dd>
										<dt class="col-sm-4 p-2">Alamat Sekarang</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->alamat_sekarang }}</dd>
										<dt class="col-sm-4 p-2">Status Perkawinan</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">
											@if ($lamaran->status_perkawinan == 1)
												Lajang
											@elseif ($lamaran->status_perkawinan == 2)
												Menikah
											@elseif ($lamaran->status_perkawinan == 3)
												Cerai
											@else
												Lajang
											@endif
										</dd>										
										<dt class="col-sm-4 p-2">Pernyataan</dt>
										<dd class="col-sm-8 border-bottom border-warning rounded p-2">{{ $lamaran->pernyataan }}</dd>
									</dl>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="thumbnail">
										<a href="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->surat_lamaran }}" data-toggle="lightbox" data-title="Surat Lamaran" data-gallery="gallery">
											<img src="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->surat_lamaran }}" class="img-fluid mb-2" alt="white sample"/>
											<div class="caption">
												<p class="text-center mt-2 mb-2">Surat Lamaran</p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="thumbnail">
										<a href="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->curriculum_vitae }}" data-toggle="lightbox" data-title="Curriculum Vitae" data-gallery="gallery">
											<img src="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->curriculum_vitae }}" class="img-fluid mb-2" alt="white sample"/>
											<div class="caption">
												<p class="text-center mt-2 mb-2">Curriculum Vitae</p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="thumbnail">
										<a href="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->ijazah }}" data-toggle="lightbox" data-title="Curriculum Vitae" data-gallery="gallery">
											<img src="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->ijazah }}" class="img-fluid mb-2" alt="white sample"/>
											<div class="caption">
												<p class="text-center mt-2 mb-2">Ijazah</p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="thumbnail">
										<a href="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->transkip_nilai }}" data-toggle="lightbox" data-title="Curriculum Vitae" data-gallery="gallery">
											<img src="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->transkip_nilai }}" class="img-fluid mb-2" alt="white sample"/>
											<div class="caption">
												<p class="text-center mt-2 mb-2">Transkip Nilai</p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="thumbnail">
										<a href="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->foto }}" data-toggle="lightbox" data-title="Curriculum Vitae" data-gallery="gallery">
											<img src="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->foto }}" class="img-fluid mb-2" alt="white sample"/>
											<div class="caption">
												<p class="text-center mt-2 mb-2">Foto</p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="thumbnail">
										<a href="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->kartu_keluarga }}" data-toggle="lightbox" data-title="Curriculum Vitae" data-gallery="gallery">
											<img src="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->kartu_keluarga }}" class="img-fluid mb-2" alt="white sample"/>
											<div class="caption">
												<p class="text-center mt-2 mb-2">Kartu Keluarga</p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="thumbnail">
										<a href="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->ktp }}" data-toggle="lightbox" data-title="Curriculum Vitae" data-gallery="gallery">
											<img src="http://localhost/github/abata_loker/storage/app/public/{{ $lamaran->ktp }}" class="img-fluid mb-2" alt="white sample"/>
											<div class="caption">
												<p class="text-center mt-2 mb-2">KTP</p>
											</div>
										</a>
									</div>
								</div>
							</div>
							
							<hr style="border: 2px solid #000;">
							{{-- ========================================== susunan keluarga ========================================================================= --}}
							
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
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- Filterizr-->
<script src="{{ asset('plugins/filterizr/jquery.filterizr.min.js') }}"></script>

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

	$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })

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