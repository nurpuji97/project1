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
							<h3 class="panel-title">Data Rekap Nilai Tugas</h3>
                        </div>
                        
						<div class="panel-body">
                            <form action="/cari/peniltug" name="cari" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                    <button type="submit" class="btn btn-primary">Cari</button>    
                                </div>
                            </form>

                            <table class="table table-striped" id="table3">
                                <thead>
                                     <tr>
                                        <th>Nama Siswa</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Semester</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>Total Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reniltug as $aa)                      
                                    <tr>
                                        <td>{{$aa->siswa->nama}}</td>
                                        <td>{{$aa->mapel->nama_mapel}}</td>
                                        <td>{{$aa->kelas->rombel}}</td>
                                        <td>{{$aa->semester->semester}} {{$aa->semester->tahunpelajaran}}</td>
                                        <td>{{$aa->tug1}}</td>
                                        <td>{{$aa->tug2}}</td>
                                        <td>{{$aa->tug3}}</td>
                                        <td>{{$aa->tug4}}</td>
                                        <td>{{$aa->tug5}}</td>
                                        <td>{{$aa->tug6}}</td>
                                        <td>{{$aa->tug7}}</td>
                                        <td>{{$aa->tug8}}</td>
                                        <td>{{$aa->tug9}}</td>
                                        <td>{{$aa->tug10}}</td>
                                        <td>{{$aa->tug11}}</td>
                                        <td>{{$aa->tug12}}</td>
                                        <td>{{$aa->nilai_tugas}}</td>
                                        <td> <a href="/peniltug/{{$aa->id}}/edit" class="btn btn-info">Transkrip</a>
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