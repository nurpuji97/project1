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
							<h3 class="panel-title">Data Siswa</h3>
                        </div>
                        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button> </br>
						<div class="panel-body">
							<table id="table1" class="table table-hover">
								<thead>
									<tr>
										<th>NIS</th>
										<th>Nama Siswa</th>
										<th>Jenis Kelamin</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Agama</th>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
								@foreach($index as $bn)
									<tr>
										<td>{{$bn->nis}}</td>
										<td>{{$bn->nama}}</td>
										<td>{{$bn->jeniskelamin}}</td>
										<td>{{$bn->tempatlahir}}</td>
										<td>{{$bn->tanggallahir}}</td>
										<td>{{$bn->agama}}</td>
										<td> <a href="/siswa/{{$bn->id}}/edit" class="btn btn-warning">Edit</a> <a href="/siswa/{{$bn->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin Mau di Hapus')">Delete</a></td>
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
                        <strong>Form Input</strong> siswa
                    </div>

                    <div class="card-body card-block">
                        <form action="/inputsiswa" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NIS</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nis" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->get('nis') as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    @endif                                
                                </small>
                            </div>
                        </div>

                    <!--    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NISN</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nisn"  id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->get('nisn') as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    @endif           
                                </small>
                            </div>
                        </div> 
                        
                                                <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Status Keluarga</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="statuskeluarga" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('statuskeluarga') as $error)
                                <li>{{$error}}</li>
                                @endforeach
                                </ul>
                                </div>
                                @endif
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Anak Ke</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="anakke" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('anakke') as $error)
                                <li>{{$error}}</li>
                                @endforeach
                                </ul>
                                </div>
                                @endif
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <textarea name="alamat" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                            @if($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                            @foreach($errors->get('alamat') as $error)
                            <li>{{$error}}</li>
                            @endforeach
                            </ul>
                            </div>
                            @endif    
                        </div>                                    

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">telepon Rumah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="telprumah" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('telprumah') as $error)
                                <li>{{$error}}</li>
                                @endforeach
                                </ul>
                                </div>
                                @endif
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Sekolah Asal</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="sekolahasal" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('sekolahasal') as $error)
                                <li>{{$error}}</li>
                                @endforeach
                                </ul>
                                </div>
                                @endif
                                </small>
                            </div>
                        </div> /!-->

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nama" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->get('nama') as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    @endif           
                                </small>
                            </div>
                        </div> 

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">Avatar</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <input type="file" name="avatar" id="file-input" name="file-input" class="form-control-file">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email Input</label></div>
                             <div class="col-12 col-md-9">
                             <input type="email" name="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control"><small class="help-block form-text">
                             @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                            @foreach($errors->get('email') as $error)
                                <li>{{$error}}</li>
                            @endforeach
                                </ul>
                                </div>
                            @endif
                             </small></div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9">
                            <input type="password" name="password" id="password-input" name="password-input" placeholder="Password" class="form-control"><small class="help-block form-text">Please enter a complex password</small></div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Kelamin</label></div>
                            <div class="col-12 col-md-9">
                                <select name="jeniskelamin" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="tempatlahir" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('tempatlahir') as $error)
                                <li>{{$error}}</li>
                                @endforeach
                                </ul>
                                </div>
                                @endif         
                                </small>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" name="tanggallahir" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Agama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="agama" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('agama') as $error)
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
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>                                                        
                    </form>
                </div>
            </div>

@stop

@section('footer')
    <script>
        $(document).ready(function(){
        $('#table1').DataTable();
        });
    </script>
@stop