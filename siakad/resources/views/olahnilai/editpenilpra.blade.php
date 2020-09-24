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
                   <h3>Transkrip Rekap Nilai Praktek</h3> <br>
                    <div class="card-body card-block">
                        <form action="/upnilra" method="post" name="ffrom" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Guru</label></div>
                            <div class="col-12 col-md-3">
                                <select name="siswa_id" id="select" class="form-control">                                
                                    <option value="{{$reprakem->siswa->id}}">{{$reprakem->siswa->nama}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-3">
                                <select name="kelas_id" id="select" class="form-control">
                                    <option value="{{$reprakem->kelas->id}}">{{$reprakem->kelas->rombel}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Mata Pelajaran</label></div>
                            <div class="col-12 col-md-3">
                                <select name="mapel_id" id="select" class="form-control">
                                    <option value="{{$reprakem->mapel->id}}">{{$reprakem->mapel->nama_mapel}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Semester</label></div>
                            <div class="col-12 col-md-3">
                                <select name="semester_id" id="select" class="form-control">
                                    <option value="{{$reprakem->semester->id}}">{{$reprakem->semester->semester}} {{$reprakem->semester->tahunpelajaran}}</option>
                                </select>
                            </div>
                        </div>
                        
                        @php 
                            $prak1=$reprakem->praktik_1;
                            $prak2=$reprakem->praktik_2; 
                            $prak3=$reprakem->praktik_3; 
                            $prak4=$reprakem->praktik_4;
                            $totprak=$prak1+$prak2+$prak3+$prak4;
                            $jumtotprak=$totprak/4;  
                        @endphp

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">praktik 1</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="praktik_1" value="{{$prak1}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">praktik 2</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="praktik_2" value="{{$prak2}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">praktik 3</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="praktik_3" value="{{$prak3}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">praktik_4</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="praktik_4" value="{{$prak4}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Total Nilai Praktik</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="nilai_prak" value="{{intval($jumtotprak)}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div> 

                        <div class="modal-footer">
                          <a href="/index" type="sumbit" class="btn btn-secondary">Cancel</a>
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

@section('footer')
    <script language="javascript" type="text/javascript">


    </script>
@stop