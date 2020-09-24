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
							<h3 class="panel-title">List Absensi</h3>
                        </div>
                        @if((auth()->user()->role == 'tu'))
                            <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button> </br>
                        @endif
                        <div class="card-body">
                                <table id="table112" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Guru</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kelas</th>
                                            <th>Semester</th>
                                            <th>hari</th>
                                            <th>jam</th>
                                            <th>Ruangan</th>
                                            @if((auth()->user()->role == 'siswa'))
                                            <th>Absensi</th>
                                            @endif
                                            @if((auth()->user()->role == 'tu'))
                                                <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($index as $rt)                  
                                        <tr>
                                            <td>{{$rt->guru->nama_guru}}</td>
                                            <td>{{$rt->mapel->nama_mapel}}</td>
                                            <td>{{$rt->kelas->rombel}}</td>
                                            <td>{{$rt->semester->semester}} {{$rt->semester->tahunpelajaran}}</td>
                                            <td>{{$rt->hari}}</td>
                                            <td>{{$rt->jam}}</td>
                                            <td>{{$rt->ruangan->kode_ruangan}}</td>
                                            @if((auth()->user()->role == 'siswa'))
                                            <td>
                                                <a href="/add/{{$rt->id}}/absensi" class="btn btn-info"><i class="lnr lnr-file-add"></i></a>
                                            </td>
                                            @endif
                                            @if((auth()->user()->role == 'tu'))
                                            <td> 
                                                <a href="/hapus/{{$rt->id}}/absensi" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')"><i class="fa fa-trash-o"></i></a>
                                                <a href="/edit/{{$rt->id}}/absensi" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a>  
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
                        <strong>Form Input</strong> Absensi
                    </div>

                    <div class="card-body card-block">
                        <form action="/add/listabsen" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Guru</label></div>
                            <div class="col-12 col-md-3">
                                <select name="guru_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($guru as $sh)
                                    <option value="{{$sh->id}}">{{$sh->nama_guru}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-3">
                                <select name="kelas_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($kelas as $sh)
                                    <option value="{{$sh->id}}">{{$sh->rombel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Mata Pelajaran</label></div>
                            <div class="col-12 col-md-3">
                                <select name="mapel_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($mapel as $sh)
                                    <option value="{{$sh->id}}">{{$sh->nama_mapel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Ruangan</label></div>
                            <div class="col-12 col-md-3">
                                <select name="ruangan_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($ruang as $sh)
                                    <option value="{{$sh->id}}">{{$sh->kode_ruangan}} ({{$sh->nama_ruangan}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Semester</label></div>
                            <div class="col-12 col-md-3">
                                <select name="semester_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($sem as $sh)
                                    <option value="{{$sh->id}}">{{$sh->semester}} {{$sh->tahunpelajaran}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Hari</label>
                            </div>
                            <div class="col-12 col-md-3" >
                                <select name="hari" id="main_menu" select="custom-select" class="form-control">
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="jumat">Jum'at</option>
                                    <option value="sabtu">Sabtu</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jam</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="jam" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tugas Ke-</label>
                            </div>
                            <div class="col-12 col-md-3" >
                                <select name="tugas" id="main_menu" select="custom-select" class="form-control">
                                    <option value="tugas1">Tugas 1</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Pembobotan Nilai Tugas</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Tugas Pendahuluan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="botugpend" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Tugas Pelaksanaan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="botugpelak" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Tugas Kesimpulan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="botugkesim" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Tugas Tampilan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="botugtamp" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Tugas Keterbacaan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="botugbaca" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Pembobotan Nilai Raport</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Nilai Tertulis</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="b_ter" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Nilai Kemampuan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="b_kem" placeholder="Text"><small class="form-text text-muted">
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