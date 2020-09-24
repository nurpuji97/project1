@extends('masterklien.master')

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

                    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Mata Pelajaran</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                {{$nilrap->mapel->nama_mapel}}
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai praktek</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" value="{{$nilrap->nilai_prak}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Ujian Praktek</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" value="{{$nilrap->nilai_pro}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Tugas</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" value="{{$nilrap->nilai_tugas}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Penilaian Tengah Semester</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" value="{{$nilrap->nilai_pts}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Penilaian Akhir Semester</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" value="{{$nilrap->nilai_pas}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div> 

                        <div class="modal-footer">
                          <a href="/raport" type="sumbit" class="btn btn-danger">keluar</a>
                        </div>                                                        
                    </form>
                </div>

				   </div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@endsection

@section('footer')
    <script language="javascript" type="text/javascript">


    </script>
@stop