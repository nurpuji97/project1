@extends('masterklien.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                   <div class="row">
                   <h3>Update Data</h3> <br>
                    <div class="card-body card-block">
                        <form action="/kelas/{{$kelas->id}}/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tingkat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="tingkat" value="{{$kelas->tingkat}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                            
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Siswa</label></div>
                            <div class="col-12 col-md-9">
                                <select name="kompeahli_id" id="select" class="form-control">
                                    <option value="{{$kelas->kompeahli->nama_kom}}">{{$kelas->kompeahli->nama_kom}} (Please select)</option>
                                    @foreach($kom as $sh)
                                    <option value="{{$sh->id}}">{{$sh->nama_kom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Rombongan Belajar</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="rombel" value="{{$kelas->rombel}}" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">  
                                </small>
                            </div>
                        </div>       

                        <div class="modal-footer">
                          <a href="/kelas" type="sumbit" class="btn btn-secondary">Cancel</a> 
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