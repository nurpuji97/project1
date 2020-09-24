@extends('mastercbt.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                   <div class="row">
                   <h3>Update List Ujian</h3> <br>
                        @if(session('sukses'))
							<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<i class="fa fa-info-circle"></i> {{session('sukses')}}
							</div>
						@endif
                    <div class="card-body card-block">
                        <form action="/update/{{$listujian->id}}/listujian" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Guru</label></div>
                            <div class="col-12 col-md-3">
                                <select name="guru_id"  id="select" class="form-control">
                                @if((auth()->user()->role == 'admin'))
                                    <option value="#">Please select</option>
                                    @foreach($guru as $sh)
                                    <option value="{{$sh->id}}" @if($listujian->guru->id == $sh->id) selected @endif>{{$sh->nama_guru}}</option>
                                    @endforeach
                                @endif
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
                                    <option value="{{$sk->id}}" @if($listujian->mapel->id == $sk->id) selected @endif>{{$sk->nama_mapel}}</option>
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
                                    <option value="{{$sh->id}}" @if($listujian->kelas->id == $sh->id) selected @endif>{{$sh->rombel}}</option>
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
                                    <option value="{{$sk->id}}" @if($listujian->semester->id == $sk->id) selected @endif>{{$sk->semester}} {{$sk->tahunpelajaran}}</option>
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
                                    <option value="{{$sk->id}}" @if($listujian->ruangan->id == $sk->id) selected @endif>{{$sk->kode_ruangan}} {{$sk->nama_ruangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal </label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="datetime-local" value="{{date('Y-m-d\TH:i', strtotime($listujian->exam_datetime))}}" name="exam_datetime" id="tgl" placeholder="Text">  <small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Berakhir</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="datetime-local" name="exam_end" value="{{date('Y-m-d\TH:i', strtotime($listujian->exam_end))}}" id="tgl" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group"> 
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">waktu</label>
                            </div> 
                            <div class="col-12 col-md-3">
                                <input type="text" name="exam_duration" value="{{$listujian->exam_duration}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small> 
                            </div> Menit
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jumlah Pertanyaan</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="text" name="total_question" value="{{$listujian->total_question}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small> 
                            </div> Soal
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jenis Ujian</label>
                            </div>
                            <div class="col-12 col-md-3" >
                                <select name="jenis_ujian" id="main_menu" select="custom-select" class="form-control">
                                    <option value="pts" @if($listujian->jenis_ujian == 'pts') selected @endif>Ujian Tengah Semester</option>
                                    <option value="pas" @if($listujian->jenis_ujian == 'pas') selected @endif>Ujian Akhir Semester</option>
                                </select>
                            </div>
                        </div>                       

                        <div class="modal-footer">
                        @if((auth()->user()->role == 'admin'))
                            <a href="/list" type="sumbit" class="btn btn-secondary">Cancel</a>
                        @endif
                        @if((auth()->user()->role == 'guru'))
                            <a href="/listguru" type="sumbit" class="btn btn-secondary">Cancel</a>
                        @endif 
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