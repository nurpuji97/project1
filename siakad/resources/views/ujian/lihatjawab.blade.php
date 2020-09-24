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
							<h3 class="panel-title">Data Jawaban {{$soal->soal_text}}</h3>
                        </div>
                        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Tambah Data</button> 
                    
                        <a href="/lihat/{{$listujian->id}}/buatsoal" class="btn btn-info">Kembali</a> </br>
                        <div class="card-body">
                                <table class="table table-striped" id="table12">
                                    <thead>
                                        <tr>
                                            <th>Correct</th>
                                            <th>Jawaban</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($soal->jawabujian as $hb)                         
                                        <tr>
                                            <td>{{$hb->is_correct}}</td>
                                            <td>{{$hb->jawaban}}</td>
                                            <td> 
                                                <a href="/hapus/{{$listujian->id}}/{{$soal->id}}/{{$hb->id}}/jawaban" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus')" ><i class="fa fa-trash-o"></i></a></td>
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
                        <strong>Form Input</strong> Jawaban
                    </div>

                    <div class="card-body card-block">
                        <form action="/add/{{$listujian->id}}/{{$soal->id}}/jawaban" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label"></label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="hidden" name="soal_ujian_id" value="{{$soal->id}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small> 
                            </div> 
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jawaban</label>
                            </div>
                            <div class="col-12 col-md-3" >
                                <select name="is_correct" id="main_menu" select="custom-select" class="form-control">
                                    <option value="0">Salah</option>
                                    <option value="1">Benar</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">text</label>
                            </div>
                            <div class="col-12 col-md-9">
                            <textarea name="jawaban" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div> 
                        </div> 

                        @if( $soal->jawabujian->count() >= 4 )
                        <div class="alert alert-info" role="alert">
							<i class="fa fa-info-circle"></i> Terima Kasih Anda Telah memasukan jawaban
						</div>
                        @endif

                        <div class="modal-footer">
                        @if( $soal->jawabujian->count() >= 4 )
                            <button type="button" class="btn btn-info" data-dismiss="modal">kembali</button>
                        @endif
                        @if( $soal->jawabujian->count() >= 0 )
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        @else

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