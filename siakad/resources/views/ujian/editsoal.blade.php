@extends('mastercbt.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                   <div class="row">
                        @if(session('sukses'))
							<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<i class="fa fa-info-circle"></i> {{session('sukses')}}
							</div>
						@endif	
                   <h3>Update Data</h3> <br>
                    <div class="card-body card-block">
                        <form action="/update/{{$listujian->id}}/{{$soal->id}}/buatsoal" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"></label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="hidden" name="list_ujian_id" value="{{$listujian->id}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small> 
                            </div> 
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Soal Text</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <textarea name="soal_text" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{$soal->soal_text}}</textarea></div>   
                        </div> 

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Soal Gambar</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <img src="{{URL::to('/images/'.$soal->soal_gambar)}}" alt="">
                                <input type="file" name="soal_gambar" value="{{$soal->soal_gambar}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                            
                                </small> 
                            </div> 
                        </div>

                               

                        <div class="modal-footer">
                          <a href="/lihat/{{$listujian->id}}/buatsoal" type="sumbit" class="btn btn-secondary">Cancel</a> 
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