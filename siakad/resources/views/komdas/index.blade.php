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
							<h3 class="panel-title">Data Kompetensi Dasar</h3>
                        </div>
                        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button> </br>
                        <div class="card-body">
                                <table class="table table-striped" id="table19">
                                    <thead>
                                        <tr>
                                            <th>Kode Kompetensi Dasar</th>
                                            <th>Kompetensi Dasar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($index as $hb)                         
                                        <tr>
                                            <td>{{$hb->kode_komdas}}</td>
                                            <td>{{$hb->nama_komdas}}</td>
                                            <td> <a href="/komdas/{{$hb->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin Mau di Hapus')">Delete</a></td>
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
                        <strong>Form Input</strong> Kompetensi Dasar
                    </div>

                    <div class="card-body card-block">
                        <form action="/inputkomdas" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kode Kompetensi Dasar</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="kode_komdas" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">         
                                </small>
                            </div>
                        </div> 

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kompetensi Dasar</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nama_komdas" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">         
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

@stop