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
							<h3 class="panel-title">List Penilaian keterampilan</h3>
                        </div>
                        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button> </br>
                        <div class="card-body">
                                <table id="table112" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Guru</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kelas</th>
                                            <th>Semester</th>
                                            <th>Model penilaian</th>
                                            
                                            <th>Jenis Model penilaian</th>
                                            <th>Nilai Bobot Persiapan</th>
                                            <th>Nilai Bobot Proses</th>
                                            <th>Nilai Bobot Hasil</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($index as $ac)                         
                                        <tr>
                                            <td>{{$ac->guru->nama_guru}}</td>
                                            <td>{{$ac->mapel->nama_mapel}}</td>
                                            <td>{{$ac->kelas->rombel}}</td>
                                            <td>{{$ac->semester->semester}} {{$ac->semester->tahunpelajaran}}</td>
                                            <td>{{$ac->model_skor}}</td>
                                            <td>{{$ac->jenis_model_skor}}</td>
                                            
                                            <td>{{$ac->bobot_persiapan}}</td>
                                            <td>{{$ac->bobot_proses}}</td>
                                            <td>{{$ac->bobot_hasil}}</td>
                                            <td>{{$ac->deskripsi}}</td>
                                            <td> 
                                                <a href="/listkinerja/{{$ac->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')"><i class="fa fa-trash-o"></i></a>
                                                <a href="/listkinerja/{{$ac->id}}/edit" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a>
                                                @if($ac->model_skor == "praktik")
                                                <a href="/lemskokin/{{$ac->id}}/lihat" class="btn btn-info"><i class="lnr lnr-inbox"></i> Praktik</a>
                                                @endif
                                                @if($ac->model_skor == "proyek")
                                                <a href="/lemskopro/{{$ac->id}}/lihat" class="btn btn-info"><i class="lnr lnr-inbox"></i> Proyek</a>
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
                        <strong>Form Input</strong> list Skor Kinerja
                    </div>

                    <div class="card-body card-block">
                        <form action="/inputlistkinerja" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nama Guru</label></div>
                            <div class="col-12 col-md-3">
                                <select name="guru_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($guru as $sh)
                                    <option value="{{$sh->id}}">{{$sh->nama_guru}}</option>
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
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Mata Pelajaran</label></div>
                            <div class="col-12 col-md-3">
                                <select name="mapel_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($mapel as $sh)
                                    <option value="{{$sh->id}}">{{$sh->nama_mapel}}</option>
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
                                    <option value="{{$sh->id}}">{{$sh->semester}} {{$sh->tahunpelajaran}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Ruangan</label></div>
                            <div class="col-12 col-md-3">
                                <select name="ruangan_id" id="select" class="form-control">
                                    <option value="#">Please select</option>
                                    @foreach($ruang as $sh)
                                    <option value="{{$sh->id}}">{{$sh->kode_ruangan}} ({{$sh->nama_ruangan}})</option>
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
                                    <option value="praktik">Praktik</option>
                                    <option value="proyek">Proyek</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jenis Model Penilaian</label>
                            </div>
                            <div class="col-12 col-md-3" >
                                <select name="jenis_model_skor" id="sub_menu" select="custom-select" class="form-control">

                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Bobot Persiapan</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="bobot_persiapan" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Bobot Proses</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="bobot_proses" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nilai Bobot Hasil</label>
                            </div>
                            <div class="col-12 col-md-9" >
                                <input type="text" name="bobot_hasil" placeholder="Text"><small class="form-text text-muted">
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Deskripsi</label>
                            </div>
                            <div class="col-12 col-md-3">
                            <textarea name="deskripsi" id="textarea-input" rows="9" placeholder="content...." class="form-control"></textarea></div>
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
        $('#table112').DataTable();
        });

    </script>

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