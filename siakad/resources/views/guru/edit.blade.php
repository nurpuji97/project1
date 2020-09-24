@extends('masterklien.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                   <div class="row">
                   <h3>Update Data</h3> <br>
                    <div class="card-body card-block">
                        <form action="/guru/{{$guru->id}}/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NIP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nip" value="{{$guru->nip}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                    <!--    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NPWP</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="npwp" value="{{$guru->npwp}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>  /!-->

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nama_guru" value="{{$guru->nama_guru}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div> 

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">Avatar</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <input type="file" name="avatar" value="{{$guru->avatar}}" id="file-input" name="file-input" class="form-control-file">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Kelamin</label></div>
                            <div class="col-12 col-md-9">
                                <select name="jenis_kelamin" value="{{$guru->jenis_kelamin}}" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    <option value="laki-laki" @if($guru->jenis_kelamin == 'laki-laki') selected @endif>Laki-Laki</option>
                                    <option value="perempuan" @if($guru->jenis_kelamin == 'perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="tempat_lahir" value="{{$guru->tempat_lahir}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" value="{{$guru->tanggal_lahir}}" name="tanggal_lahir" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Agama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="agama" value="{{$guru->agama}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Status Pegawai</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="status_pegawai" value="{{$guru->status_pegawai}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                    <!--    <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <textarea name="alamat" id="textarea-input" rows="9" placeholder="content...." class="form-control">{{$guru->alamat}}</textarea></div>
                        </div>           

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Status Pernikahan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="status_pernikahan" value="{{$guru->status_pernikahan}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>                         

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">telepon Rumah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" value="{{$guru->telp}}" name="telp" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div> /!-->

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Gelar Pendidikan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="gelar_pendidikan" value="{{$guru->gelar_pendidikan}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Lulusan Universitas</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="lulusan_universitas" value="{{$guru->lulusan_universitas}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="modal-footer">
                          <a href="/guru" type="sumbit" class="btn btn-secondary">Cancel</a> 
                          <button type="submit" class="btn btn-warning" onclick="return confirm('Yakin Mau di update')">Confirm</button>
                        </div>                                                        
                    </form>
                </div>
				   </div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@endsection