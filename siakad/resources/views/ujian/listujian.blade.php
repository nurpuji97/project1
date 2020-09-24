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
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($index as $hb)                         
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
                                                @if((auth()->user()->role == 'admin'))
                                                    @if($hb->jenis_ujian == "pas")
                                                        @if( $hb->total_question == $hb->soalujian->count() )
                                                            <span class="label label-success">Ada Soal</span>
                                                        @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                            <span class="label label-danger">belum ada soal</span>
                                                        @else
                                                            <span class="label label-warning">soal belum selesai</span>
                                                        @endif
                                                    @endif
                                                    @if($hb->jenis_ujian == "pts")
                                                        @if( $hb->total_question == $hb->soalujian->count() )
                                                            <span class="label label-success">Ada Soal</span>
                                                        @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                            <span class="label label-danger">belum ada soal</span>
                                                        @else
                                                            <span class="label label-warning">soal belum selesai</span>
                                                        @endif
                                                    @endif
                                                @endif
                                                @if((auth()->user()->role == 'tu'))
                                                    @if($hb->jenis_ujian == "pas")
                                                        @if( $hb->total_question == $hb->soalujian->count() )
                                                            <span class="label label-success">Ada Soal</span>
                                                        @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                            <span class="label label-danger">belum ada soal</span>
                                                        @else
                                                            <span class="label label-warning">soal belum selesai</span>
                                                        @endif
                                                    @endif
                                                    @if($hb->jenis_ujian == "pts")
                                                        @if( $hb->total_question == $hb->soalujian->count() )
                                                            <span class="label label-success">Ada Soal</span>
                                                        @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                            <span class="label label-danger">belum ada soal</span>
                                                        @else
                                                            <span class="label label-warning">soal belum selesai</span>
                                                        @endif
                                                    @endif
                                                @endif
                                                @if((auth()->user()->role == 'siswa'))
                                                    @if($hb->jenis_ujian == "pas")
                                                        @if( $hb->exam_datetime >= $tanggal )
                                                            @if( $hb->total_question == $hb->soalujian->count() )
                                                                <span class="label label-success">Siap</span>
                                                            @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                                <span class="label label-danger">belum ada soal</span>
                                                            @else
                                                                <span class="label label-warning">soal belum selesai</span>
                                                            @endif
                                                        @elseif ( $hb->exam_end <= $tanggal )
                                                            <span class="label label-danger">Waktu Habis</span>
                                                        @else
                                                            @if( $hb->total_question == $hb->soalujian->count() )
                                                                <span class="label label-success">Siap</span>
                                                            @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                                <span class="label label-danger">belum ada soal</span>
                                                            @else
                                                                <span class="label label-warning">soal belum selesai</span>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @if($hb->jenis_ujian == "pts")
                                                        @if( $hb->exam_datetime >= $tanggal )
                                                            @if( $hb->total_question == $hb->soalujian->count() )
                                                                <span class="label label-success">Siap</span>
                                                            @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                                <span class="label label-danger">belum ada soal</span>
                                                            @else
                                                                <span class="label label-warning">soal belum selesai</span>
                                                            @endif
                                                        @elseif ( $hb->exam_end <= $tanggal )
                                                            <span class="label label-danger">Waktu Habis</span>
                                                        @else
                                                            @if( $hb->total_question == $hb->soalujian->count() )
                                                                <span class="label label-success">Siap</span>
                                                            @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                                <span class="label label-danger">belum ada soal</span>
                                                            @else
                                                                <span class="label label-warning">soal belum selesai</span>
                                                            @endif
                                                        @endif                                                    
                                                    @endif
                                                @endif
                                            </td>
                                            <td> 
                                                @if((auth()->user()->role == 'admin'))
                                                    @if($hb->jenis_ujian == "pas")
                                                    <a href="/index/{{$hb->id}}/ujian" class="btn btn-success">lihat Soal</a>
                                                        @if( $hb->total_question != $hb->soalujian->count() ) 
                                                            <a href="/lihat/{{$hb->id}}/buatsoal" class="btn btn-info">Buat Soal</a>
                                                        @endif     
                                                    <a href="/edit/{{$hb->id}}/listujian" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a> 
                                                    <a href="/delete/{{$hb->id}}/listujian" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a>
                                                    @endif
                                                    @if($hb->jenis_ujian == "pts")
                                                    <a href="/index/{{$hb->id}}/ujian" class="btn btn-success">lihat Soal</a>
                                                        @if( $hb->total_question != $hb->soalujian->count() ) 
                                                            <a href="/lihat/{{$hb->id}}/buatsoal" class="btn btn-info">Buat Soal</a>
                                                        @endif     
                                                    <a href="/edit/{{$hb->id}}/listujian" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a> 
                                                    <a href="/delete/{{$hb->id}}/listujian" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a>
                                                    @endif 
                                                @endif
                                                @if((auth()->user()->role == 'tu'))
                                                    @if($hb->jenis_ujian == "pas")
                                                    <a href="/index/{{$hb->id}}/ujian" class="btn btn-success">lihat Soal</a>
                                                        @if( $hb->total_question != $hb->soalujian->count() ) 
                                                            <a href="/lihat/{{$hb->id}}/buatsoal" class="btn btn-info">Buat Soal</a>
                                                        @endif     
                                                    <a href="/edit/{{$hb->id}}/listujian" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a> 
                                                    <a href="/delete/{{$hb->id}}/listujian" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a>
                                                    @endif
                                                    @if($hb->jenis_ujian == "pts")
                                                    <a href="/index/{{$hb->id}}/ujian" class="btn btn-success">lihat Soal</a>
                                                        @if( $hb->total_question != $hb->soalujian->count() ) 
                                                            <a href="/lihat/{{$hb->id}}/buatsoal" class="btn btn-info">Buat Soal</a>
                                                        @endif     
                                                    <a href="/edit/{{$hb->id}}/listujian" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a> 
                                                    <a href="/delete/{{$hb->id}}/listujian" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a>
                                                    @endif 
                                                @endif
                                                @if((auth()->user()->role == 'siswa'))
                                                    @if($hb->jenis_ujian == "pas")
                                                        @if( $hb->exam_datetime >= $tanggal )
                                                            @if( $hb->total_question == $hb->soalujian->count() )
                                                                <a href="/index/{{$hb->id}}/ujian" class="btn btn-info"><i class="lnr lnr-pencil"></i></a>
                                                            @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                                <span class="label label-danger">X</span>
                                                            @else
                                                                <span class="label label-danger">X</span>
                                                            @endif
                                                        @elseif ( $hb->exam_end <= $tanggal )
                                                            <span class="label label-danger">X</span>
                                                        @else
                                                            @if( $hb->total_question == $hb->soalujian->count() )
                                                                <a href="/index/{{$hb->id}}/ujian" class="btn btn-info"><i class="lnr lnr-pencil"></i></a>
                                                            @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                                <span class="label label-danger">X</span>
                                                            @else
                                                                <span class="label label-danger">X</span>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @if($hb->jenis_ujian == "pts")
                                                        @if( $hb->exam_datetime >= $tanggal )
                                                            @if( $hb->total_question == $hb->soalujian->count() )
                                                                <a href="/index/{{$hb->id}}/ujian" class="btn btn-info"><i class="lnr lnr-pencil"></i></a>
                                                            @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                                <span class="label label-danger">X</span>
                                                            @else
                                                                <span class="label label-danger">X</span>
                                                            @endif
                                                        @elseif ( $hb->exam_end <= $tanggal )
                                                            <span class="label label-danger">X</span>
                                                        @else
                                                            @if( $hb->total_question == $hb->soalujian->count() )
                                                                <a href="/index/{{$hb->id}}/ujian" class="btn btn-info"><i class="lnr lnr-pencil"></i></a>
                                                            @elseif( $hb->total_question != !Empty($hb->soalujian->count()))
                                                                <span class="label label-danger">X</span>
                                                            @else
                                                                <span class="label label-danger">X</span>
                                                            @endif
                                                        @endif                                                    
                                                    @endif 
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

@stop

@section('footer')
    <script>
        $(document).ready(function(){
        $('#table12').DataTable();
        });

    </script>
@stop