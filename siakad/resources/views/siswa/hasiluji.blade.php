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
							<h3 class="panel-title"> <strong> Ujian Tengah Semester </strong> </h3>
                        </div>
                        <div class="card-body">
                                <table class="table">
									<tbody>
										<tr>
											<td>Nama Guru : {{$listujian->guru->nama_guru}}</td>
                                            <td>Mata Pelajaran : {{$listujian->mapel->nama_mapel}}</td>  
										</tr>
                                        <tr>
                                            <td>Kelas, Semester/ Tahun Pelajaran : {{$listujian->kelas}}, {{$listujian->semester->semester}} {{$listujian->semester->tahunpelajaran}}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Ujian & jam : {{$listujian->exam_datetime}}</td>
                                            <td>Tanggal Ujian Berakhir & jam : {{$listujian->exam_end}}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu : {{$listujian->exam_duration}} Menit</td>
											<td>Jumlah Soal : {{$listujian->total_question}} Buah</td>
                                        </tr>
									</tbody>
								</table>
                                
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Soal</th>
                                            <th>Gambar</th>
                                            <th>Jawaban</th>
                                            <th>Keterangan</th>
                                            <th>Point</th>
                                        </tr>
                                    </thead>
                                    @php $benar = 0; @endphp
                                    @php $salah = 0; @endphp
                                    <tbody>
                                    @foreach($siswa->buatjawab as $ac)
                                        @if($ac->listujian->mapel->id == $listujian->mapel->id)
                                            @if($ac->listujian->guru->id == $listujian->guru->id)                    
                                                <tr>
                                            <!--    <td>{{$ac->listujian->mapel->nama_mapel}}</td> /!-->
                                                    <td>{{$ac->buatsoal->soal_text}}</td>
                                                    <td>{{$ac->buatsoal->soal_gambar}}</td>
                                                    <td>{{$ac->buatsoal->benar_jawab}}</td>  
                                                    <td>{{$ac->jawaban}}</td>
                                                    <td>
                                                        @if($ac->buatsoal->benar_jawab == $ac->jawaban)
                                                        <span class="label label-success">Jawaban Benar</span>
                                                        @endif
                                                        @if($ac->buatsoal->benar_jawab != $ac->jawaban)
                                                        <span class="label label-danger">Jawaban Salah</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($ac->buatsoal->benar_jawab == $ac->jawaban)
                                                            {{$ac->listujian->jawaban_benar}}
                                                            @php $benar += $ac->listujian->jawaban_benar; @endphp
                                                        @endif
                                                        @if($ac->buatsoal->benar_jawab != $ac->jawaban)
                                                            {{$ac->listujian->jawaban_salah}}
                                                            @php $salah += $ac->listujian->jawaban_salah; @endphp
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                @if($listujian->mapel->id == $listujian->mapel->id)
                                                    @if($listujian->guru->id == $listujian->guru->id)
                                                        @php
                                                            $hit1 = $benar - $salah;
                                                            $hit2 = $hit1 / 100;
                                                            $hit3 = $hit2 * 100;
                                                            echo "Hasil = ".$hit3."0"." ";

                                                            if($hit3 > 8){
                                                                echo "Sangat Kompeten";
                                                            } elseif ($hit3 >= 7 and $hit3 <= 6){
                                                                echo "Kompeten";
                                                            } elseif ($hit3 >= 5 and $hit3 <= 4){
                                                                echo "Kurang Kompeten";
                                                            } else {
                                                                echo "Belum Kompeten";
                                                            }  
                                                        @endphp  
                                                    @endif
                                                @endif
                                            </th>                               
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <a href="/list" class="btn btn-info">Kembali</a> </td>
                                        </tr>
                                    </tbody> 
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
        var mapel = {!!$listujian->id!!};

        function cekMapel(mapel){
            return mapel == {!!$listujian->id!!};
        }

        function myFunction(){
            document.getElementById("test").innerHTML = mapel.filter();
        }
    </script>
@stop