@extends('masterklien.master')

@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                   <div class="row">
                   <h3>Update Data</h3> <br>
                    <div class="card-body card-block">
                        <form action="/rombel/{{$index->id}}/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Siswa</label></div>
                            <div class="col-12 col-md-9">
                                <select name="siswa_id" id="select" class="form-control">
                                    <option value="{{$index->siswa->id}}">{{$index->siswa->nama}}</option>
                                    @foreach($siswa as $sh)
                                    <option value="{{$sh->id}}">{{$sh->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Kelas</label></div>
                            <div class="col-12 col-md-9">
                                <select name="kelas_id" value="{{$index->kelas->rombel}}" id="select" class="form-control">
                                    <option value="{{$index->kelas->id}}">{{$index->kelas->rombel}}</option>
                                    @foreach($kelas as $sk)
                                    <option value="{{$sk->id}}">{{$sk->rombel}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
      

                        <div class="modal-footer">
                          <a href="/rombel" type="sumbit" class="btn btn-secondary">Cancel</a> 
                          <button type="submit" class="btn btn-warning" onclick="return confirm('Yakin Mau di update')">Confirm</button>
                        </div>                                                        
                    </form>
                </div>

				   </div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@stop