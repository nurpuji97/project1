@extends('masterklien.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                   <div class="row">
                   <h3>Update Data</h3> <br>
                    <div class="card-body card-block">
                        <form action="/ruanglihat/{{$ruang->id}}/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">kode</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="kode_ruangan" value="{{$ruang->kode_ruangan}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nama_ruangan" value="{{$ruang->nama_ruangan}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small>
                            </div>
                        </div>

                        <div class="modal-footer">
                          <a href="/ruanglihat" type="sumbit" class="btn btn-secondary">Cancel</a> 
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