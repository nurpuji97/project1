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
                        <form action="/listkinerja/{{$kin->id}}/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Guru</label></div>
                            <div class="col-12 col-md-3">
                                <select name="guru_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($guru as $sh)
                                    <option value="{{$sh->id}}" @if($kin->guru->id == $sh->id) selected @endif>{{$sh->nama_guru}}</option>
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
                                    <option value="{{$sh->id}}" @if($kin->kelas->id == $sh->id) selected @endif>{{$sh->rombel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Mata Pelajaran</label></div>
                            <div class="col-12 col-md-3">
                                <select name="mapel_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($mapel as $sh)
                                    <option value="{{$sh->id}}" @if($kin->mapel->id == $sh->id) selected @endif>{{$sh->nama_mapel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Semester</label></div>
                            <div class="col-12 col-md-3">
                                <select name="semester_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($sem as $sh)
                                    <option value="{{$sh->id}}" @if($kin->semester->id == $sh->id) selected @endif>{{$sh->semester}} {{$sh->tahunpelajaran}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Model Penilaian</label>
                            </div>
                            <div class="col-12 col-md-3" >
                                <select name="model_skor" id="main_menu" select="custom-select" class="form-control">
                                    <option value="#">Please select</option>
                                    <option value="praktik" @if($kin->model_skor == "praktik") selected @endif>Praktik</option>
                                    <option value="proyek" @if($kin->model_skor == "proyek") selected @endif>Proyek</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jenis Model Penilaian</label>
                            </div>
                            <div class="col-12 col-md-2" >
                                <select name="jenis_model_skor" id="sub_menu" select="custom-select" class="form-control">
                                    
                                </select>
                            </div>
                            <div class="col-12 col-md-3" >
                                {{$kin->jenis_model_skor}}
                                
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Bobot Persiapan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="bobot_persiapan" value="{{$kin->bobot_persiapan}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Bobot Proses</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="bobot_proses" value="{{$kin->bobot_proses}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Bobot Hasil</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="bobot_hasil" value="{{$kin->bobot_hasil}}" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Deskripsi</label>
                            </div>
                            <div class="col-12 col-md-3">
                            <textarea name="deskripsi" id="textarea-input" rows="9" placeholder="content...." class="form-control">{{$kin->deskripsi}}</textarea></div>
                        </div> 

                        <div class="modal-footer">
                        @if((auth()->user()->role == 'admin'))
                        <a href="/listkinerja" type="sumbit" class="btn btn-secondary">Cancel</a>
                        @endif
                        @if((auth()->user()->role == 'tu'))
                        <a href="/listkinerja" type="sumbit" class="btn btn-secondary">Cancel</a>
                        @endif
                        @if((auth()->user()->role == 'guru'))
                        <a href="/listgurukem" type="sumbit" class="btn btn-secondary">Cancel</a>
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

@section('footer')
    <script language="javascript" type="text/javascript">

        var jen={
            praktik:['praktik_1','praktik_2','praktik_3','praktik_4'],
            proyek:['nilai_akhir']
        }

        // getting the main and menus
        var main= document.getElementById('main_menu');
        var sub= document.getElementById('sub_menu');

        //trigger the event when main menu change occurs
        main.addEventListener('change',function(){
            var selected_option = jen[this.value];
            while (sub.options.length > 0) {
                sub.options.remove(0);
            }
            
            Array.from(selected_option).forEach(function(el){
                let option = new Option(el, el);
                sub.appendChild(option);
            });
            
        });

    </script>
@stop