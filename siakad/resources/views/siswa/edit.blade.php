@extends('masterklien.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                   <div class="row">
                   <h3>Update Data</h3> <br>
                    <div class="card-body card-block">
                        <form action="/siswa/{{$siswa->id}}/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NIS</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nis" value="{{$siswa->nis}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                <!--        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NISN</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nisn" value="{{$siswa->nisn}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                            </div> /!-->

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nama" value="{{$siswa->nama}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div> 

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">Avatar</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <input type="file" name="avatar" value="{{$siswa->avatar}}" id="file-input" name="file-input" class="form-control-file">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Jenis Kelamin</label></div>
                            <div class="col-12 col-md-9">
                                <select name="jeniskelamin" value="{{$siswa->jeniskelamin}}" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    <option value="laki-laki" @if($siswa->jeniskelamin == 'laki-laki') selected @endif>Laki-Laki</option>
                                    <option value="perempuan" @if($siswa->jeniskelamin == 'perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="tempatlahir" value="{{$siswa->tempatlahir}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" value="{{$siswa->tanggallahir}}" name="tanggallahir" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Agama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="agama" value="{{$siswa->agama}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Status Keluarga</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="statuskeluarga" value="{{$siswa->statuskeluarga}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Anak Ke</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="anakke" value="{{$siswa->anakke}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <textarea name="alamat" id="textarea-input" rows="9" placeholder="content...." class="form-control">{{$siswa->alamat}}</textarea></div>
                        </div>                                    

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">telepon Rumah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" value="{{$siswa->telprumah}}" name="telprumah" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Sekolah Asal</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="sekolahasal" value="{{$siswa->sekolahasal}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small>
                            </div>
                        </div>

                        <div class="modal-footer">
                          <a href="/siswa" type="sumbit" class="btn btn-secondary">Cancel</a> 
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