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
                        @if($absen->tugas == "tugas1")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>1</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas1" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif
                        @if($absen->tugas == "tugas2")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>2</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas2" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif					   
                        @if($absen->tugas == "tugas3")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>3</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas3" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif
                        @if($absen->tugas == "tugas4")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>4</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas4" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif
                        @if($absen->tugas == "tugas5")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>5</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas5" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif
                        @if($absen->tugas == "tugas6")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>6</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas6" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif
                        @if($absen->tugas == "tugas7")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>7</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas7" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif
                        @if($absen->tugas == "tugas8")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>8</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas8" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif
                        @if($absen->tugas == "tugas9")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>9</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas9" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif
                        @if($absen->tugas == "tugas10")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>10</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas10" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif
                        @if($absen->tugas == "tugas11")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>11</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas11" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif
                        @if($absen->tugas == "tugas12")
                        <div class="panel-heading">
							        <h2 class="panel-title">Penilaian</h2>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>12</th>
                                                <th><div align="center">Pendahuluan</div></th>
                                                <th><div align="center">Pelaksanaan</div></th>
                                                <th><div align="center">Kesimpulan</div></th>
                                                <th><div align="center">Tampilan</div></th>
                                                <th><div align="center">Keterbacaan</div></th>
                                                <th><div align="center">Total</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="/add/tugas12" name="ffrom" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nama Siswa</label></div>
                                                <div class="col-12 col-md-2">
                                                    <select name="siswa_id" id="select" class="form-control">
                                                        <option value="#">Please select</option>
                                                        @foreach($rom as $sh)
                                                            @if($sh->kelas->rombel == $absen->kelas->rombel) 
                                                                <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}} ({{$sh->kelas->rombel}})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <select name="mapel_id" id="select" class="form-control">
                                                        <option value="{{$absen->mapel->id}}">{{$absen->mapel->nama_mapel}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="semester_id" id="select" class="form-control">
                                                        <option value="{{$absen->semester->id}}">{{$absen->semester->semester}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select name="kelas_id" id="select" class="form-control">
                                                        <option value="{{$absen->kelas->id}}">{{$absen->kelas->rombel}}</option>
                                                    </select>
                                                </div>  
                                            </div>
                            
                                                <tr>
                                                    <td>Skor Perolehan</td>
                                                    <td> <input type="text" name="skor_pendahuluan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_pelaksanaan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_kesimpulan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_tampilan" class="form-input" id=""> </td>
                                                    <td> <input type="text" name="skor_keterbacaan" class="form-input" id=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                
                                                    @php 
                                                        $nilmax = 100;
                                                    @endphp
                                                    <td>Skor Maksimal</td>
                                                    <td> <input type="text" name="skor_max_pendahuluan"  value="{{$nilmax}}" id="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_pelaksanaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_kesimpulan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_tampilan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="skor_max_keterbacaan" value="{{$nilmax}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot</td>
                                                    <td> <input type="text" name="bobot_pendahuluan"  value="{{$absen->botugpend}}" id="" disabled> </td>
                                                    <td> <input type="text" name="bobot_pelaksanaan" value="{{$absen->botugpelak}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_kesimpulan" value="{{$absen->botugkesim}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_tampilan" value="{{$absen->botugtamp}}" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="bobot_keterbacaan" value="{{$absen->botugbaca}}" id="" onclick="" disabled> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td> <input type="text" name="nilai_pendahuluan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_pelaksanaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_kesimpulan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_tampilan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_keterbacaan" value="" id="" onclick="" disabled> </td>
                                                    <td> <input type="text" name="nilai_total" value="" id="" onclick=""> </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button type="submit" class="btn btn-primary">Confirm</button></td>
                                                    <td><button type="button" class="btn btn-danger" onclick="cek()">cek</button></td>
                                                    @if((auth()->user()->role == 'admin'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'tu'))
                                                        <td><a href="/listtugas" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                    @if((auth()->user()->role == 'guru'))
                                                        <td><a href="/listtugguru" type="sumbit" class="btn btn-warning">Cancel</a> </td>
                                                    @endif
                                                   
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                          </div>
                        @endif                                   

                            </div>
					</div>
				   </div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

@stop

@section('footer')
    <script language="javascript" type="text/javascript"> 

        function cek() {
            //pendahuluan
            var skor_pendahuluan=parseInt(document.ffrom.skor_pendahuluan.value);
            var skor_max_pendahuluan=parseInt(document.ffrom.skor_max_pendahuluan.value);
            var bobot_pendahuluan=parseInt(document.ffrom.bobot_pendahuluan.value);

            //pelaksanaan
            var skor_pelaksanaan=parseInt(document.ffrom.skor_pelaksanaan.value);
            var skor_max_pelaksanaan=parseInt(document.ffrom.skor_max_pelaksanaan.value);
            var bobot_pelaksanaan=parseInt(document.ffrom.bobot_pelaksanaan.value);

            //kesimpulan
            var skor_kesimpulan=parseInt(document.ffrom.skor_kesimpulan.value);
            var skor_max_kesimpulan=parseInt(document.ffrom.skor_max_kesimpulan.value);
            var bobot_kesimpulan=parseInt(document.ffrom.bobot_kesimpulan.value);

            //tampilan
            var skor_tampilan=parseInt(document.ffrom.skor_tampilan.value);
            var skor_max_tampilan=parseInt(document.ffrom.skor_max_tampilan.value);
            var bobot_tampilan=parseInt(document.ffrom.bobot_tampilan.value);

            //keterbacaan
            var skor_keterbacaan=parseInt(document.ffrom.skor_keterbacaan.value);
            var skor_max_keterbacaan=parseInt(document.ffrom.skor_max_keterbacaan.value);
            var bobot_keterbacaan=parseInt(document.ffrom.bobot_keterbacaan.value); 
            
            //kalkulasi pendahuluan
            var jumlahper=skor_pendahuluan/skor_max_pendahuluan;
            var jumlahper2=parseInt(jumlahper*bobot_pendahuluan);
            ffrom.nilai_pendahuluan.value=jumlahper2;

            //kalkulasi pelaksanaan
            var jumlahper=skor_pelaksanaan/skor_max_pelaksanaan;
            var jumlahper2=parseInt(jumlahper*bobot_pelaksanaan);
            ffrom.nilai_pelaksanaan.value=jumlahper2;

            //kalkulasi kesimpulan
            var jumlahper=skor_kesimpulan/skor_max_kesimpulan;
            var jumlahper2=parseInt(jumlahper*bobot_kesimpulan);
            ffrom.nilai_kesimpulan.value=jumlahper2;

            //kalkulasi tampilan
            var jumlahper=skor_tampilan/skor_max_tampilan;
            var jumlahper2=parseInt(jumlahper*bobot_tampilan);
            ffrom.nilai_tampilan.value=jumlahper2;

            //kalkulasi keterbacaan
            var jumlahper=skor_keterbacaan/skor_max_keterbacaan;
            var jumlahper2=parseInt(jumlahper*bobot_keterbacaan);
            ffrom.nilai_keterbacaan.value=jumlahper2;


            //total kalkulasi 
            var nilai_pendahuluan=parseInt(document.ffrom.nilai_pendahuluan.value);             
            var nilai_pelaksanaan=parseInt(document.ffrom.nilai_pelaksanaan.value);  
            var nilai_kesimpulan=parseInt(document.ffrom.nilai_kesimpulan.value);
            var nilai_tampilan=parseInt(document.ffrom.nilai_tampilan.value);
            var nilai_keterbacaan=parseInt(document.ffrom.nilai_keterbacaan.value);

            var totalkal=parseInt(nilai_pendahuluan+nilai_pelaksanaan+nilai_kesimpulan+nilai_tampilan+nilai_keterbacaan);
            ffrom.nilai_total.value=totalkal;  

        }
    </script> 
@stop