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
							<h3 class="panel-title">Data guru</h3>
                        </div>
                        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button> </br>
						<div class="panel-body">
							<table id="table2" class="table table-hover">
								<thead>
									<tr>
                                            
                                            <th>Nama Guru</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Agama</th>
                                            <th>Status Pegawai</th>
                                            <th>Gelar Pendidikan</th>
                                            <th>Perguruan Tinggi</th>
                                            <th>Aksi</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($index as $guru)                         
                                    <tr>
                                        
                                        <td>{{$guru->nama_guru}}</td>
                                        <td>{{$guru->jenis_kelamin}}</td>
                                        <td>{{$guru->tempat_lahir}}</td>
                                        <td>{{$guru->tanggal_lahir}}</td>
                                        <td>{{$guru->agama}}</td>
                                        <td>{{$guru->status_pegawai}}</td>
                                        <td>{{$guru->gelar_pendidikan}}</td>
                                        <td>{{$guru->lulusan_universitas}}</td>
                                        <td> <a href="/guru/{{$guru->id}}/edit" class="btn btn-warning">Edit</a> <a href="/guru/{{$guru->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" >Hapus</a></td>
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
                        <strong>Form Input</strong> Guru
                    </div>

                    <div class="card-body card-block">
                    <form action="/inputguru" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NIP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nip" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->get('nip') as $error)
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
                                <label for="text-input" class=" form-control-label">NPWP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="npwp"  id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->get('npwp') as $error)
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
                                <input type="text" name="nama_guru" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->get('nama_guru') as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    @endif           
                                </small>
                            </div>
                        </div> 

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Role</label></div>
                            <div class="col-12 col-md-9">
                                <select name="role" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    <option value="tu">Staff Tu</option>
                                    <option value="guru">Guru</option>
                                </select>
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
                                <select name="jenis_kelamin" id="select" class="form-control">
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
                                <input type="text" name="tempat_lahir" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('tempat_lahir') as $error)
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
                                <input type="date" name="tanggal_lahir" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('tanggal_lahir') as $error)
                                <li>{{$error}}</li>
                                @endforeach
                                </ul>
                                </div>
                                @endif         
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

                    <!--    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Status Pernikahan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="status_pernikahan" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('status_pernikahan') as $error)
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
                                <label for="text-input" class=" form-control-label">Status Pegawai</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="status_pegawai" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('status_pegawai') as $error)
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
                                <input type="text" name="telp" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('telp') as $error)
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
                                <label for="text-input" class=" form-control-label">Gelar Pendidikan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="gelar_pendidikan" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('gelar_pendidikan') as $error)
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
                                <label for="text-input" class=" form-control-label">Perguruan Tinggi</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="lulusan_universitas" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->get('lulusan_universitas') as $error)
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
        $('#table2').DataTable();
        });
    </script>
@stop