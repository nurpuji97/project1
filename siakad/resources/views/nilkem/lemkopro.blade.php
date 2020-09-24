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
							<h3 class="panel-title">Data Lembar Skor Kinerja</h3>
                        </div>
                        
                     
                          <div align="justify">
                              <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button>
                            </br>
                              
                          </div>
            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> <input type="text" name="" value="Sub Komponen" id="" onclick="" disabled> </th>
                                            <th> <input type="text" name="" value="Input Nilai" id="" onclick="" disabled></th>
                                            <th> <input type="text" name="" value="Aksi" id="" onclick="" disabled></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php  $per = 0; @endphp
                                    @foreach($kin->lemskokin as $ac)
                                        @if($ac->komponen == "persiapan")                         
                                            <tr>
                                                <td>{{$ac->sub_komponen}} @php $per += $ac->no; @endphp </td>
                                                <td> <input type="text" name="pern" onblur="findTotal()" id="pern"> </td>
                                                <td> 
                                                    <a href="/listkinerja/{{$kin->id}}/lihat/{{$ac->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    </tfooter>
                                </table>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> <input type="text" name="" value="Sub Komponen" id="" onclick="" disabled> </th>
                                            <th> <input type="text" name="" value="Input Nilai" id="" onclick="" disabled></th>
                                            <th> <input type="text" name="" value="Aksi" id="" onclick="" disabled></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $pro = 0; @endphp
                                    @foreach($kin->lemskokin as $ac)
                                        @if($ac->komponen == "proses")                         
                                            <tr>
                                                <td>{{$ac->sub_komponen}}  @php $pro += $ac->no; @endphp</td>
                                                <td> <input type="text" name="proses" onblur="findTotal1()" id="proses"> </td>
                                                <td> 
                                                    <a href="/listkinerja/{{$kin->id}}/lihat/{{$ac->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    </tfooter>
                                </table>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> <input type="text" value="Sub Komponen" onclick="" disabled> </th>
                                            <th> <input type="text" value="Input Nilai" onclick="" disabled></th>
                                            <th> <input name="" type="text" disabled="disabled" id="" onclick="" value="Aksi" /></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $has = 0; @endphp
                                    @foreach($kin->lemskokin as $ac)
                                        @if($ac->komponen == "hasil")                         
                                            <tr>
                                                <td>
                                                    {{$ac->sub_komponen}} 
                                                    @php $has += $ac->no; @endphp
                                                </td>
                                                <td> <input type="text" name="hasil" onblur="findTotal2()" id="hasil"> </td>
                                                <td> 
                                                    <a href="/listkinerja/{{$kin->id}}/lihat/{{$ac->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    </tfooter>
                                </table>

                                <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><div align="center">Persiapan</div></th>
                                                <th><div align="center">Proses</div></th>
                                                <th><div align="center">Hasil</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/upaddnilpro" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $kin->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$kin->mapel->id}}">{{$kin->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$kin->semester->id}}">{{$kin->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$kin->kelas->id}}">{{$kin->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_persiapan" class="form-input" id="skor_persiapan"> </td>
                                                    <td> <input type="text" name="skor_proses" class="form-input" id="skor_proses"> </td>
                                                    <td> <input type="text" name="skor_hasil" class="form-input" id="skor_hasil"> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                        $max_per = $per * $nilmax;
                                                        $max_pro = $pro * $nilmax;
                                                        $max_has = $has * $nilmax;
                                                        
                                                      
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_persiapan"  value="{{$max_per}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_proses" value="{{$max_pro}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_hasil" value="{{$max_has}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_persiapan"  value="{{$kin->bobot_persiapan}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_proses" value="{{$kin->bobot_proses}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_hasil" value="{{$kin->bobot_hasil}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_persiapan" value="" id="nilai_persiapan" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_proses" value="" id="nilai_proses" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_hasil" value="" id="nilai_hasil" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listkinerja" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listkinerja" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listgurukem" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>   

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
                        <strong>Form Input</strong> 
                    </div>

                    <div class="card-body card-block">
                        <form action="/listkinerja/{{$kin->id}}/insert" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label"></label></div>
                            <div class="col-12 col-md-3">
                                <select name="list_skor_kinerja_id" id="select" class="form-control">
                                   <option value="{{$kin->id}}">{{$kin->id}}</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <select name="no" id="select" class="form-control">
                                   <option value="1">1</option>
                                </select>
                            </div>                               
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Komponen</label>
                            </div>
                            <div class="col-12 col-md-3" >
                                <select name="komponen" id="select" class="form-control">
                                    <option value="persiapan">Persiapan</option>
                                    <option value="proses">Proses</option>
                                    <option value="hasil">Hasil</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Sub Komponen</label>
                            </div>
                            <div class="col-12 col-md-3">
                            <textarea name="sub_komponen" id="textarea-input" rows="9" placeholder="content...." class="form-control"></textarea></div>
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
    <script language="javascript" type="text/javascript"> 
        function findTotal(){
            var arr = document.getElementsByName('pern');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            document.getElementById('skor_persiapan').value = tot;
        }
        function findTotal1(){
            var arr = document.getElementsByName('proses');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            document.getElementById('skor_proses').value = tot;
        }
        function findTotal2(){
            var arr = document.getElementsByName('hasil');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            document.getElementById('skor_hasil').value = tot;
        }
        function hitungTotal(){
            var ab = document.getElementsByName('skor_persiapan');
            var ac = document.getElementsByName('skor_max_persiapan');
            var bc = document.getElementsByName('bobot_persiapan');

            document.getElementByName('nilai_persiapan').innerHTML = (parseInt(ab)/parseInt(ac))*parseInt(bc);  
        }
        function cek() {
            //persiapan
            var skor_persiapan=parseInt(document.ffrom.skor_persiapan.value);
            var skor_max_persiapan=parseInt(document.ffrom.skor_max_persiapan.value);
            var bobot_persiapan=parseInt(document.ffrom.bobot_persiapan.value); 
            
            //proses
            var skor_proses=parseInt(document.ffrom.skor_proses.value);
            var skor_max_proses=parseInt(document.ffrom.skor_max_proses.value);
            var bobot_proses=parseInt(document.ffrom.bobot_proses.value);

            //hasil
            var skor_hasil=parseInt(document.ffrom.skor_hasil.value);
            var skor_max_hasil=parseInt(document.ffrom.skor_max_hasil.value);
            var bobot_hasil=parseInt(document.ffrom.bobot_hasil.value);

            //kalkulasi persiapan
            var jumlahper=skor_persiapan/skor_max_persiapan;
            var jumlahper2=parseInt(jumlahper*bobot_persiapan);
            ffrom.nilai_persiapan.value=jumlahper2;

            //kalkulasi proses
            var jumlahpro=skor_proses/skor_max_proses;
            var jumlahpro2=jumlahpro*bobot_proses;
            ffrom.nilai_proses.value=jumlahpro2;
            
            //kalkulasi hasil
            var jumlahhas=skor_hasil/skor_max_hasil;
            var jumlahhas2=parseInt(jumlahhas*bobot_hasil);
            ffrom.nilai_hasil.value=jumlahhas2;

            //total kalkulasi 
            var nilai_persiapan=parseInt(document.ffrom.nilai_persiapan.value);             
            var nilai_proses=parseInt(document.ffrom.nilai_proses.value);  
            var nilai_hasil=parseInt(document.ffrom.nilai_hasil.value);

            var totalkal=parseInt(nilai_persiapan+nilai_proses+nilai_hasil);
            ffrom.nilai_total.value=totalkal;  

        }
    </script> 
@stop