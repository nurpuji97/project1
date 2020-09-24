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
                        <form action="/nilrap/{{$nilrap->id}}/update" method="post" name="ffrom" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                            <div class="col-12 col-md-3">
                                <select name="siswa_id" id="select" class="form-control">                                
                                    <option value="{{$nilrap->siswa->id}}">{{$nilrap->siswa->nama}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-3">
                                <select name="kelas_id" id="select" class="form-control">
                                    <option value="{{$nilrap->kelas->id}}">{{$nilrap->kelas->rombel}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Mata Pelajaran</label></div>
                            <div class="col-12 col-md-3">
                                <select name="mapel_id" id="select" class="form-control">
                                    <option value="{{$nilrap->mapel->id}}">{{$nilrap->mapel->nama_mapel}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Semester</label></div>
                            <div class="col-12 col-md-3">
                                <select name="semester_id" id="select" class="form-control">
                                    <option value="{{$nilrap->semester->id}}">{{$nilrap->semester->semester}} {{$nilrap->semester->tahunpelajaran}}</option>
                                </select>
                            </div>
                        </div>
                        
                        @php
                            $tugas=$nilrap->nilai_tugas;
                            $pts=$nilrap->nilai_pts;
                            $pas=$nilrap->nilai_pas;
                            $nilter=$tugas+$pts+$pas;
                            $totnilter=$nilter/3;

                            $prak=$nilrap->nilai_prak;
                            $pro=$nilrap->nilai_pro;
                            $nilkem=$prak+$pro;
                            $totnilkem=$nilkem/2;

                            $b1=$nilrap->b_ter;
                            $b2=$nilrap->b_kem;   
                            $jumnil1=$totnilter*$b1;
                            $jumnil2=$totnilkem*$b2;
                            $jumnil3=$jumnil1+$jumnil2;
                            $totnil=$jumnil3/100;  
                        @endphp

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Tertulis</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="jml_nilai_ter" value="{{intval($totnilter)}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Praktek</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="jml_nilai_kem" value="{{intval($totnilkem)}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Raport</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="nilai_raport" value="{{intval($totnil)}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div> 

                        <div class="modal-footer">
                          <a href="/nilrap" type="sumbit" class="btn btn-secondary">Cancel</a>
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