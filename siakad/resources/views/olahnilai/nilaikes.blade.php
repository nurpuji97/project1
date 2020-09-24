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
							<h3 class="panel-title">Data Rekap Nilai Raport</h3>
                        </div>
                        
						<div class="panel-body">
                            <form action="/cari/nilai" name="cari" method="post" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-1"><label for="select" class=" form-control-label">Cari </label></div>
                                    <div class="col-12 col-md-3">
                                        <select name="mapel_id" id="select" class="form-control">
                                        @foreach($mapel as $sh)
                                            <option value="{{$sh->id}}">{{$sh->nama_mapel}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <select name="semester_id" id="select" class="form-control">
                                        @foreach($sem as $sh)
                                            <option value="{{$sh->id}}">{{$sh->semester}} {{$sh->tahunpelajaran}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <select name="kelas_id" id="select" class="form-control">
                                        @foreach($kelas as $sh)
                                            <option value="{{$sh->id}}">{{$sh->rombel}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Confirm</button>    
                                </div>
                            </form>

                            <table class="table table-striped" id="table3">
                                <thead>
                                     <tr>
                                        <th>Nama Siswa</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Semester</th>
                                        <th>Nilai Tertulis</th>
                                        <th>Nilai Kemampuan</th>
                                        <th>Nilai Akhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($nilrap as $gh)                 
                                    <tr>
                                        <td>{{$gh->siswa->nama}}</td>
                                        <td>{{$gh->mapel->nama_mapel}}</td>
                                        <td>{{$gh->kelas->rombel}}</td>
                                        <td>{{$gh->semester->semester}} {{$gh->semester->tahunpelajaran}}</td>
                                        <td>{{$gh->jml_nilai_ter}}</td>
                                        <td>{{$gh->jml_nilai_kem}}</td>
                                        <td>{{$gh->nilai_raport}}</td>
                                        <td> 
                                            <a href="/nilrap/{{$gh->id}}/edit" class="btn btn-info">Transkrip</a>
                                        </td>
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

@stop

@section('footer')
    <script>
        $(document).ready(function(){
        $('#table3').DataTable();
        });
    </script>
@stop