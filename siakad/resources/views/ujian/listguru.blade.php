@extends('mastercbt.master')

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
							<h3 class="panel-title">List Ujian</h3>
                        </div>
                        @php 
                            $tanggal = date('Y-m-d H:i:s');
                        @endphp

                        <div class="card-body">
                                <table class="table table-striped" id="table12">
                                    <thead>
                                        <tr>
                                            <th>Nama Guru</th>
                                            <th>Mata Pelajaran</th>
                                            <th>kelas</th>
                                            <th>Semester</th>
                                            <th>Tanggal Ujian</th>
                                            <th>Tanggal Ujian Berakhir</th>
                                            <th>Waktu</th>
                                            <th>Jumlah Soal</th>
                                            <th>Ruangan</th>
                                            <th>Jenis Ujian</th>
                                            <th>
                                                <button class=" mb-1" type="button" data-toggle="modal" data-target="#largeModal">+</button>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($guru2->listujian as $hb)                         
                                        <tr>
                                            <td>{{$hb->guru->nama_guru}}</td>
                                            <td>{{$hb->mapel->nama_mapel}}</td>
                                            <td>{{$hb->kelas->rombel}}</td>
                                            <td>{{$hb->semester->semester}} {{$hb->semester->tahunpelajaran}}</td>
                                            <td>{{$hb->exam_datetime}}</td>
                                            <td>{{$hb->exam_end}}</td>
                                            <td>{{$hb->exam_duration}} Menit</td>
                                            <td>{{$hb->total_question}} Soal</td>
                                            <td>{{$hb->ruangan->kode_ruangan}}</td>
                                            <td> 
                                                @if($hb->jenis_ujian == "pas")
                                                    <span class="label label-info">Ujian Akhir Semester</span>
                                                @endif
                                                @if($hb->jenis_ujian == "pts")
                                                    <span class="label label-info">Ujian Tengah Semester</span>
                                                @endif
                                            </td>
                                            <td> 
                                                    @if($hb->jenis_ujian == "pas")
                                                    
                                                    <a href="/lihat/{{$hb->id}}/buatsoal" class="btn btn-info"><i class="lnr lnr-file-add"></i></a>
                                                    <a href="/edit/{{$hb->id}}/listujian" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a> 
                                                    <a href="/delete/{{$hb->id}}/listujian" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a>
                                                    @endif
                                                    @if($hb->jenis_ujian == "pts")
                                                    
                                                    <a href="/lihat/{{$hb->id}}/buatsoal" class="btn btn-info"><i class="lnr lnr-file-add"></i></a>     
                                                    <a href="/edit/{{$hb->id}}/listujian" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a> 
                                                    <a href="/delete/{{$hb->id}}/listujian" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a>
                                                    @endif
                                            </td>
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
                        <strong>Form Input</strong> List Ujian
                    </div>

                    <div class="card-body card-block">
                        <form action="/add/listujian" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Guru</label></div>
                            <div class="col-12 col-md-3">
                                <select name="guru_id" id="select" class="form-control">
                                    @if((auth()->user()->role == 'guru'))
                                    <option value="{{$guru2->id}}">{{$guru2->nama_guru}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Mata Pelajaran</label></div>
                            <div class="col-12 col-md-3">
                                <select name="mapel_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($mapel as $sk)
                                    <option value="{{$sk->id}}">{{$sk->nama_mapel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-3">
                                <select name="kelas_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($kelas as $sh)
                                    <option value="{{$sh->id}}">{{$sh->rombel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Ruangan</label></div>
                            <div class="col-12 col-md-3">
                                <select name="ruangan_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($ruang as $sk)
                                    <option value="{{$sk->id}}">{{$sk->kode_ruangan}} {{$sk->nama_ruangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Semester</label></div>
                            <div class="col-12 col-md-3">
                                <select name="semester_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($sem as $sk)
                                    <option value="{{$sk->id}}">{{$sk->semester}} {{$sk->tahunpelajaran}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal </label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="datetime-local" name="exam_datetime" id="tgl" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Berakhir</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="datetime-local" name="exam_end" id="tgl" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group"> 
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">waktu</label>
                            </div> 
                            <div class="col-12 col-md-3">
                                <input type="text" name="exam_duration" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small> 
                            </div> Menit
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jumlah Pertanyaan</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="text" name="total_question" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small> 
                            </div> Soal
                        </div> 

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jenis Ujian</label>
                            </div>
                            <div class="col-12 col-md-3" >
                                <select name="jenis_ujian" id="main_menu" select="custom-select" class="form-control">
                                    <option value="pts">Ujian Tengah Semester</option>
                                    <option value="pas">Ujian Akhir Semester</option>
                                </select>
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
    <script>
        $(document).ready(function(){
        $('#table12').DataTable();
        });

    </script>
@stop