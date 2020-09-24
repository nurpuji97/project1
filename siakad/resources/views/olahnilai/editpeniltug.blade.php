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
                   <h3>Transkip Rekap Nilai Tugas</h3> <br>
                    <div class="card-body card-block">
                        <form action="/add/nilai/tugas" method="post" name="ffrom" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama siswa</label></div>
                            <div class="col-12 col-md-3">
                                <select name="siswa_id" id="select" class="form-control">                                
                                    <option value="{{$reniltug->siswa->id}}">{{$reniltug->siswa->nama}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-3">
                                <select name="kelas_id" id="select" class="form-control">
                                    <option value="{{$reniltug->kelas->id}}">{{$reniltug->kelas->rombel}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Mata Pelajaran</label></div>
                            <div class="col-12 col-md-3">
                                <select name="mapel_id" id="select" class="form-control">
                                    <option value="{{$reniltug->mapel->id}}">{{$reniltug->mapel->nama_mapel}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Semester</label></div>
                            <div class="col-12 col-md-3">
                                <select name="semester_id" id="select" class="form-control">
                                    <option value="{{$reniltug->semester->id}}">{{$reniltug->semester->semester}} {{$reniltug->semester->tahunpelajaran}}</option>
                                </select>
                            </div>
                        </div>
                        
                        @php 
                            $prak1=$reniltug->tug1;
                            $prak2=$reniltug->tug2; 
                            $prak3=$reniltug->tug3; 
                            $prak4=$reniltug->tug4;
                            $prak5=$reniltug->tug5;
                            $prak6=$reniltug->tug6;
                            $prak7=$reniltug->tug7;
                            $prak8=$reniltug->tug8;
                            $prak9=$reniltug->tug9;
                            $prak10=$reniltug->tug10;
                            $prak11=$reniltug->tug11;
                            $prak12=$reniltug->tug12;
                            $totprak=$prak1+$prak2+$prak3+$prak4+$prak5+$prak6+$prak7+$prak8+$prak9+$prak10+$prak11+$prak12;
                            $jumtotprak=$totprak/12;  
                        @endphp

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 1</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug1" value="{{$prak1}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 2</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug2" value="{{$prak2}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 3</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug3" value="{{$prak3}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 4</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug4" value="{{$prak4}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 5</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug5" value="{{$prak5}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 6</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug6" value="{{$prak6}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 7</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug7" value="{{$prak7}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 8</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug8" value="{{$prak8}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 9</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug9" value="{{$prak9}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 10</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug10" value="{{$prak10}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 11</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug11" value="{{$prak11}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">tugas 12</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="tug12" value="{{$prak12}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Total Nilai Tugas</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="nilai_tugas" value="{{intval($jumtotprak)}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div> 

                        <div class="modal-footer">
                          <a href="/rekniltugas" type="sumbit" class="btn btn-secondary">Cancel</a>
                          <!--<button type="button" class="btn btn-danger" onclick="cek()">cek</button>-->
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

        function cek() {

                    //total kalkulasi 
                    var tug1=parseInt(document.ffrom.tug1.value);             
                    var tug2=parseInt(document.ffrom.tug2.value);  
                    var tug3=parseInt(document.ffrom.tug3.value);
                    var tug4=parseInt(document.ffrom.tug4.value);
                    var tug5=parseInt(document.ffrom.tug5.value);
                    var tug6=parseInt(document.ffrom.tug6.value);
                    var tug7=parseInt(document.ffrom.tug7.value);
                    var tug8=parseInt(document.ffrom.tug8.value);
                    var tug9=parseInt(document.ffrom.tug9.value);
                    var tug10=parseInt(document.ffrom.tug10.value);
                    var tug11=parseInt(document.ffrom.tug11.value);
                    var tug12=parseInt(document.ffrom.tug12.value);

                    var totalkal=parseInt(tug1+tug2+tug3+tug4+tug5+tug6+tug7+tug8+tug9+tug10+tug11+tug12);
                    var jumkal=parseInt(totalkal/12);
                    ffrom.nilai_tugas.value=jumkal;  

                }

    </script>
@stop