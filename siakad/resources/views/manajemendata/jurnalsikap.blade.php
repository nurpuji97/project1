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
							<h3 class="panel-title">Data Kelas</h3>
                        </div>
                        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button> </br>
                        <div class="card-body">
                                <table class="table table-striped" id="table12">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Catatan Perilaku</th>
                                            <th>Nilai Utama Penguatan Pendidikan Karakter</th>
                                            @if((auth()->user()->role == 'admin'))
                                            <th>Aksi</th>
                                            @endif
                                            @if((auth()->user()->role == 'tu'))
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($index as $hb)                         
                                        <tr>
                                            <td>{{$hb->tanggal}}</td>
                                            <td>{{$hb->siswa->nama}}</td>
                                            <td>{{$hb->kelas->rombel}}</td>
                                            <td>{{$hb->catatan_perilaku}}</td>
                                            <td>{{$hb->nilaikarakter->nuppk}}</td>
                                            @if((auth()->user()->role == 'admin'))
                                            <td> <a href="/jurnalsikap/{{$hb->id}}/edit" class="btn btn-warning">Edit</a> <a href="/jurnalsikap/{{$hb->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" >Hapus</a></td>
                                            @endif
                                            @if((auth()->user()->role == 'tu'))
                                            <td> <a href="/jurnalsikap/{{$hb->id}}/edit" class="btn btn-warning">Edit</a> <a href="/jurnalsikap/{{$hb->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" >Hapus</a></td>
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
                        <strong>Form Input</strong> Kelas
                    </div>

                    <div class="card-body card-block">
                        <form action="/inputjurnal" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" name="tanggal" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">@php echo "tanggal sekarang  ".date('d/m/yy'); @endphp</small>
                            </div>
                        </div>

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
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Catatan Perilaku</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="catatan_perilaku" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nilai Karakter</label></div>
                            <div class="col-12 col-md-9">
                                <select name="nilaikarakter_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($nk as $k)
                                    <option value="{{$k->id}}">{{$k->nuppk}}</option>
                                    @endforeach
                                </select>
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
        $('#table12').DataTable();
        });
    </script>
@stop