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
						<div class="panel-body">
                            <table class="table table-striped" id="table3">
                                <thead>
                                     <tr>
                                        <th>Tingkat</th>
                                        <th>Kompetensi Keahlian</th>
                                        <th>Rombongan Belajar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($index as $kelas)                         
                                    <tr>
                                        <td>{{$kelas->tingkat}}</td>
                                        <td>{{$kelas->kompeahli->nama_kom}}</td>
                                        <td>{{$kelas->rombel}}</td>
                                        <td> <a href="/kelas/{{$kelas->id}}/edit" class="btn btn-warning">Edit</a> <a href="/kelas/{{$kelas->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" >Hapus</a></td>
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
                        <form action="/inputkelas" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tingkat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="tingkat" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->get('tingkat') as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    @endif                                
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kompetensi Keahlian</label></div>
                            <div class="col-12 col-md-9">
                                <select name="kompeahli_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($kom as $sk)
                                    <option value="{{$sk->id}}">{{$sk->nama_kom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Rombongan Belajar</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="rombel" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->get('rombel') as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    @endif           
                                </small>
                            </div>
                        </div>                         

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Mau Tambah Data')">Confirm</button>
                        </div>                                                        
                    </form>
                </div>
            </div>

@stop

@section('footer')
    <script>
        $(document).ready(function(){
        $('#table3').DataTable();
        });
    </script>
@stop