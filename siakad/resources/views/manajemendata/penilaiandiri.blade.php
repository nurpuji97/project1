@extends('masterklien.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                   <div class="row">
                   <div class="panel">
				   		@if(session('sukses'))
							<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<i class="fa fa-info-circle"></i> {{session('sukses')}}
							</div>
						@endif					   
						<div class="panel-heading">
							<h3 class="panel-title">Data Penilaian Diri</h3>
                        </div>
                        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button> </br>
                        <div class="card-body">
                                <table class="table table-striped" id="table19">
                                    <thead>
                                        <tr>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Semester</th>
                                            <th>pernyataan Diri</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lpdiri as $hb)                         
                                        <tr>
                                            <td>{{$hb->siswa->nama}}</td>
                                            <td>{{$hb->kelas->rombel}}</td>
                                            <td>{{$hb->semester->semester}}</td>
                                            <td>{{$hb->pernyataandiri->pernyataan}}</td>
                                            <td>{{$hb->pilihan}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
					</div>
				   </div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

       <!-- modal/!-->
	   <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Masukan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span>
                        </button>
                    </div>

            <div class="modal-body">                
                <div class="card">
                    <div class="card-header">
                        <strong>Form Input</strong> Penilaian Diri
                    </div>

                    <div class="card-body card-block">
                        <form action="/inputpenilaiandiri" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Siswa</label></div>
                            <div class="col-12 col-md-9">
                                <select name="siswa_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($siswa as $sh)
                                    <option value="{{$sh->id}}">{{$sh->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-9">
                                <select name="kelas_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($kelas as $sk)
                                    <option value="{{$sk->id}}">{{$sk->rombel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Semester</label></div>
                            <div class="col-12 col-md-9">
                                <select name="semester_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($semester as $sk)
                                    <option value="{{$sk->id}}">{{$sk->semester}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Penyataan Diri</label></div>
                            <div class="col-12 col-md-9">
                                <select name="pernyataandiri_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($pd as $sk)
                                    <option value="{{$sk->id}}">{{$sk->pernyataan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Pilih Salah Satu</label></div>
                            <div class="col-12 col-md-9">

                            <label class="fancy-checkbox">
								<input type="radio" name="pilihan" value="ya">
								<span>Ya</span>
							</label>

                            <label class="fancy-checkbox">
								<input type="radio"name="pilihan" value="tidak">
								<span>Tidak</span>
							</label>

                            </div>
                        </div>                                             

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>                                                        
                    </form>
                </div>
            </div>

@stop

@section('footer')
    <script>
        $(document).ready(function(){
        $('#table19').DataTable();
        });
    </script>
@stop