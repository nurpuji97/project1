@extends('masterklien.master')

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
                        <form action="/update/{{$list->id}}/absensi" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Guru</label></div>
                            <div class="col-12 col-md-3">
                                <select name="guru_id"  id="select" class="form-control">
                                @if((auth()->user()->role == 'tu'))
                                    <option value="#">Please select</option>
                                    @foreach($guru as $sh)
                                    <option value="{{$sh->id}}" @if($list->guru->id == $sh->id) selected @endif>{{$sh->nama_guru}}</option>
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
                                @if((auth()->user()->role == 'tu'))
                                    <option value="#">Please select</option>
                                    @foreach($mapel as $sk)
                                    <option value="{{$sk->id}}" @if($list->mapel->id == $sk->id) selected @endif>{{$sk->nama_mapel}}</option>
                                    @endforeach
                                @endif
                                @if((auth()->user()->role == 'guru'))
                                    <option value="{{$list->mapel->id}}">{{$list->mapel->nama_mapel}}</option>
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-3">
                                <select name="kelas_id" id="select" class="form-control">
                                @if((auth()->user()->role == 'tu'))
                                    <option value="#">Please select</option>
                                    @foreach($kelas as $sh)
                                    <option value="{{$sh->id}}" @if($list->kelas->id == $sh->id) selected @endif>{{$sh->rombel}}</option>
                                    @endforeach
                                @endif
                                @if((auth()->user()->role == 'guru'))
                                    <option value="{{$list->kelas->id}}">{{$list->kelas->rombel}}</option>
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Semester</label></div>
                            <div class="col-12 col-md-3">
                                <select name="semester_id" id="select" class="form-control">
                                @if((auth()->user()->role == 'tu'))
                                    <option value="#">Please select</option>
                                    @foreach($sem as $sk)
                                    <option value="{{$sk->id}}" @if($list->semester->id == $sk->id) selected @endif>{{$sk->semester}} {{$sk->tahunpelajaran}}</option>
                                    @endforeach
                                @endif
                                @if((auth()->user()->role == 'guru'))
                                    <option value="{{$list->semester->id}}">{{$list->semester->semester}} {{$list->semester->tahunpelajaran}}</option>
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Ruangan</label></div>
                            <div class="col-12 col-md-3">
                                <select name="ruangan_id" id="select" class="form-control">
                                @if((auth()->user()->role == 'tu'))
                                    <option value="#">Please select</option>
                                    @foreach($ruang as $sk)
                                    <option value="{{$sk->id}}" @if($list->ruangan->id == $sk->id) selected @endif>{{$sk->kode_ruangan}} ({{$sk->nama_ruangan}})</option>
                                    @endforeach
                                @endif
                                @if((auth()->user()->role == 'guru'))
                                    <option value="{{$list->semester->id}}">{{$list->ruangan->kode_ruangan}} {{$list->ruangan->nama_ruangan}}</option>
                                @endif
                                </select>
                            </div>
                        </div>

                        @if((auth()->user()->role == 'tu'))
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Hari</label>
                            </div>
                            <div class="col-12 col-md-3" >
                                <select name="hari" id="main_menu" select="custom-select" class="form-control">
                                    <option value="senin" @if($list->hari == 'senin') selected @endif>Senin</option>
                                    <option value="selasa" @if($list->hari == 'selasa') selected @endif>Selasa</option>
                                    <option value="rabu" @if($list->hari == 'rabu') selected @endif>Rabu</option>
                                    <option value="kamis" @if($list->hari == 'kamis') selected @endif>Kamis</option>
                                    <option value="jumat" @if($list->hari == 'jumat') selected @endif>Jum'at</option>
                                    <option value="sabtu" @if($list->hari == 'sabtu') selected @endif>Sabtu</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jam</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="jam" value="{{$list->jam}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>
                        @endif

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tugas Ke-</label>
                            </div>
                            <div class="col-12 col-md-3" >
                                <select name="tugas" id="main_menu" select="custom-select" class="form-control">
                                    <option value="tugas1" @if($list->tugas == 'tugas1') selected @endif>Tugas 1</option>
                                    <option value="tugas2" @if($list->tugas == 'tugas2') selected @endif>Tugas 2</option>
                                    <option value="tugas3" @if($list->tugas == 'tugas3') selected @endif>Tugas 3</option>
                                    <option value="tugas4" @if($list->tugas == 'tugas4') selected @endif>Tugas 4</option>
                                    <option value="tugas5" @if($list->tugas == 'tugas5') selected @endif>Tugas 5</option>
                                    <option value="tugas6" @if($list->tugas == 'tugas6') selected @endif>Tugas 6</option>
                                    <option value="tugas7" @if($list->tugas == 'tugas7') selected @endif>Tugas 7</option>
                                    <option value="tugas8" @if($list->tugas == 'tugas8') selected @endif>Tugas 8</option>
                                    <option value="tugas9" @if($list->tugas == 'tugas9') selected @endif>Tugas 9</option>
                                    <option value="tugas10" @if($list->tugas == 'tugas10') selected @endif>Tugas 10</option>
                                    <option value="tugas11" @if($list->tugas == 'tugas11') selected @endif>Tugas 11</option>
                                    <option value="tugas12" @if($list->tugas == 'tugas12') selected @endif>Tugas 12</option>
                                </select>
                            </div>
                        </div>

                        @if((auth()->user()->role == 'tu'))
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Pembobotan Nilai Tugas</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Tugas Pendahuluan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="botugpend" value="{{$list->botugpend}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Tugas Pelaksanaan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="botugpelak" value="{{$list->botugpelak}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Tugas Kesimpulan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="botugkesim" value="{{$list->botugkesim}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Tugas Tampilan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="botugtamp" value="{{$list->botugtamp}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Tugas Keterbacaan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="botugbaca" value="{{$list->botugbaca}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Pembobotan Nilai Raport</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Nilai Tertulis</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="b_ter" value="{{$list->b_ter}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bobot Nilai Kemampuan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="b_kem" value="{{$list->b_kem}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>
                        @endif

                        <div class="modal-footer">
                        @if((auth()->user()->role == 'tu'))
                            <a href="/listabsen" type="sumbit" class="btn btn-secondary">Cancel</a>
                        @endif
                        @if((auth()->user()->role == 'guru'))
                            <a href="/listtugguru" type="sumbit" class="btn btn-secondary">Cancel</a>
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