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
							<h3 class="panel-title">Absensi Mata Pelajaran {{$absen->mapel->nama_mapel}} Kelas {{$absen->kelas->rombel}} </h3>
                        </div>
                       
                        @if((auth()->user()->role == 'admin'))
                        <a href="/listabsen" class="btn btn-info">Kembali</a> </br>
                        @endif
                        @if((auth()->user()->role == 'tu'))
                        <a href="/listabsen" class="btn btn-info">Kembali</a> </br>
                        @endif
                        @if((auth()->user()->role == 'siswa'))
                        <a href="/listabsen" class="btn btn-info">Kembali</a> </br>
                        @endif
                        @if((auth()->user()->role == 'guru'))
                        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button>
                        <a href="/listabguru" class="btn btn-info">Kembali</a> </br>
                        @endif
                        <div class="card-body">
                                <table id="table112" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Siswa</th>
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
                                            @if((auth()->user()->role == 'guru'))
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($absen->absen as $rt)                  
                                        <tr>
                                            <td>{{$rt->siswa->nama}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            @if((auth()->user()->role == 'guru'))
                                            <td>
                                                <a href="#" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a>
                                            </td>
                                            @endif
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
                        <strong>Form Input</strong> input Absensi
                    </div>

                    <div class="card-body card-block">
                        <form action="/input/{{$absen->id}}/temnilkes" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"></label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="hidden" name="listabsen_id" value="{{$absen->id}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                            <div class="col-12 col-md-3">
                                <select name="siswa_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($rom as $sh)
                                        @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                            <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-3">
                                <select name="kelas_id" id="select" class="form-control">
                                    <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Mata Pelajaran</label></div>
                            <div class="col-12 col-md-3">
                                <select name="mapel_id" id="select" class="form-control">
                                    <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Semester</label></div>
                            <div class="col-12 col-md-3">
                                <select name="semester_id" id="select" class="form-control">
                                    <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"></label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="hidden" name="b_ter" value="{{$absen->b_ter}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"></label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="hidden" name="b_kem" value="{{$absen->b_kem}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
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
        $('#table112').DataTable();
        });

    </script>

@stop