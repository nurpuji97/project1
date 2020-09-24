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
							<h3 class="panel-title">Jadwal Mengajar</h3>
                        </div>

                        <div class="card-body">
                                <table id="table112" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Mata Pelajaran</th>
                                            <th>Kelas</th>
                                            <th>Semester</th>
                                            <th>hari</th>
                                            <th>jam</th>
                                            <th>Ruangan</th>
                                            <th>Absensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($guru2->listabsen as $rt)                  
                                        <tr>
                                            <td>{{$rt->mapel->nama_mapel}}</td>
                                            <td>{{$rt->kelas->rombel}}</td>
                                            <td>{{$rt->semester->semester}} {{$rt->semester->tahunpelajaran}}</td>
                                            <td>{{$rt->hari}}</td>
                                            <td>{{$rt->jam}}</td>
                                            <td>{{$rt->ruangan->kode_ruangan}}</td>
                                            <td>
                                                <a href="/add/{{$rt->id}}/absensi" class="btn btn-info"><i class="lnr lnr-file-add"></i></a>
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
        $('#table112').DataTable();
        });

    </script>

@stop