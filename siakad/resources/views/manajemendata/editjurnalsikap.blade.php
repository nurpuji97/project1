@extends('masterklien.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                   <div class="row">
                   <h3>Update Data</h3> <br>
                    <div class="card-body card-block">
                        <form action="/jurnalsikap/{{$index->id}}/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal </label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" name="tanggal" value="{{$index->tanggal}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">@php echo "tanggal sekarang  ".date('d/m/yy'); @endphp</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Siswa</label></div>
                            <div class="col-12 col-md-9">
                                <select name="siswa_id" id="select" class="form-control">
                                    <option value="{{$index->siswa->id}}">{{$index->siswa->nama}} (Please select)</option>
                                    @foreach($siswa as $sh)
                                    <option value="{{$sh->id}}">{{$sh->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-9">
                                <select name="kelas_id" id="select" class="form-control">
                                    <option value="{{$index->kelas->id}}">{{$index->kelas->rombel}} (Please select)</option>
                                    @foreach($kelas as $sk)
                                    <option value="{{$sk->id}}">{{$sk->rombel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Catatan Perilaku</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="catatan_perilaku" value="{{$index->catatan_perilaku}}" id="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">                           
                                </small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Nilai Karakter</label></div>
                            <div class="col-12 col-md-9">
                                <select name="nilaikarakter_id" id="select" class="form-control">
                                    <option value="{{$index->nilaikarakter->id}}">{{$index->nilaikarakter->nuppk}} (Please select)</option>
                                    @foreach($nk as $k)
                                    <option value="{{$k->id}}">{{$k->nuppk}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
      

                        <div class="modal-footer">
                          <a href="/jurnalsikap" type="sumbit" class="btn btn-secondary">Cancel</a> 
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