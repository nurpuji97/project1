@extends('masterklien.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                   <div class="row">
                   <div class="panel">					   
						<div class="panel-heading">
							<h3 class="panel-title">Jurnal Siswa</h3>
                        </div>
						<div class="panel-body">
							<table id="table1" class="table table-hover">
								<thead>
									<tr>
										<th>Tanggal</th>
                                        <th>Kelas</th>
                                        <th>Catatan</th>
                                        <th>Nilai Karakter</th>
									</tr>
								</thead>
								<tbody>
								@foreach($siswa->jurnalsikap as $bn)
									<tr>
										<td>{{$bn->tanggal}}</td>
                                        <td>{{$bn->kelas->rombel}}</td>
                                        <td>{{$bn->catatan_perilaku}}</td>
                                        <td>{{$bn->nilaikarakter->nuppk}}</td>
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

@stop