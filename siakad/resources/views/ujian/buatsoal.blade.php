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
							<h3 class="panel-title">Data Soal Ujian</h3>
                        </div>
                        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button> 
                        @if((auth()->user()->role == 'admin'))
                        <a href="/list" class="btn btn-info">Kembali</a> </br>
                        @endif
                        @if((auth()->user()->role == 'tu'))
                        <a href="/list" class="btn btn-info">Kembali</a> </br>
                        @endif
                        @if((auth()->user()->role == 'guru'))
                        <a href="/listguru" class="btn btn-info">Kembali</a> </br>
                        @endif
                        <div class="card-body">
                                <table class="table table-striped" id="table12">
                                    <thead>
                                        <tr>
                                            <th>Soal Text</th>
                                            <th>Soal Gambar</th>
                                            <th>Tambah Jawaban</th>
                                            <th>Aksi Soal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listujian->soalujian as $hb)                         
                                        <tr>
                                            <td>{{$hb->soal_text}}</td>
                                            <td>{{$hb->soal_gambar}}</td>
                                            <td><a href="/lihat/{{$listujian->id}}/{{$hb->id}}/jawaban" class="btn btn-success"><i class="lnr lnr-file-add"></i></a></td>
                                            <td>
                                                <a href="/edit/{{$listujian->id}}/{{$hb->id}}/buatsoal" class="btn btn-warning"><i class="lnr lnr-pencil"></i></a> 
                                                <a href="/hapus/{{$listujian->id}}/{{$hb->id}}/buatsoal" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a></td>
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
                        <strong>Form Input</strong> Soal Ujian
                    </div>

                    <div class="card-body card-block">
                        <form action="/add/{{$listujian->id}}/buatsoal" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"></label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="hidden" name="list_ujian_id" value="{{$listujian->id}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small> 
                            </div> 
                        </div>

                        @php
                            $op = $listujian->soalujian->count();
                            $op2 = $op+1;
                        @endphp

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nomor Soal</label>
                            </div>
                            <div class="col-12 col-md-2">
                                <input type="number" name="question_number"  value="{{$op2}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                                                         
                                </small> 
                            </div> 
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Soal Text</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <textarea name="soal_text" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div> 
                        </div> 

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Soal Gambar</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" name="soal_gambar"  id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                            
                                </small> 
                            </div> 
                        </div>

                        @if( $listujian->soalujian->count() == $listujian->total_question )
                        <div class="alert alert-info" role="alert">
							<i class="fa fa-info-circle"></i> Terima Kasih Anda Telah membuat soal
						</div>
                        @endif

                        <div class="modal-footer">
                        @if( $listujian->soalujian->count() == $listujian->total_question )
                            <button type="button" class="btn btn-info" data-dismiss="modal">kembali</button>
                        @endif
                        @if( $listujian->soalujian->count() != $listujian->total_question )
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        @endif
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