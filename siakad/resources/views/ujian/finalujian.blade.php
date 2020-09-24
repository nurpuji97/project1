@extends('mastercbt.master')

@section('header')
    <style style="text/css">
        body{
            font-family: arial;
            font-size: 15px;
            line-height: 1.6em;
        }

        li{
            list-style: none;
        }

        a{
            text-decoration: none;
        }

        .container{
            width:60%;
            margin: 0 auto;
            overflow: auto;
        }

        header{
            border-bottom: 3px #f4f4f4 solid;
        }

        footer{
            border-bottom: 3px #f4f4f4 solid;
            text-align: center;
            padding-top:5px
        }

        main{
            padding-bottom:20px;
        }

        a.start{
            display:inline-block;
            color: #666;
            background: #f4f4f4;
            border: 1px dotted #ccc;
            padding: 6px 13px;
        }
    </style>
@stop

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
							<h3 class="panel-title"></h3>
                        </div>
						<div class="panel-body">

                        @if($listujian->jenis_ujian == "pas")
                            <body>
                                <header>
                                    <div class="container">
                                            <h1>Ujian Akhir Semester</h1>
                                    </div>
                                </header>
                                <main>
                                    <div class="container">
                                        <h2>You're Done !</h2>
                                            <p>Congrats! You Have Completed The test</p>
                                            <form action="/input/{{$listujian->id}}/pas" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col-12 col-md-3">
                                                    @if((auth()->user()->role == 'admin'))
                                                    <select name="siswa_id" id="select" class="form-control">
                                                            @foreach($rom as $sh)
                                                                @if($sh->kelas->rombel == $listujian->kelas->rombel) 
                                                                    <option value="#">Please select</option>
                                                                    <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}}</option>
                                                                @endif
                                                            @endforeach
                                                    </select>
                                                    @endif
                                                        @if((auth()->user()->role == 'siswa'))
                                                            <input type="hidden" name="siswa_id" value="{{$siswa->id}}" id="">
                                                        @endif  
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="hidden" name="mapel_id" value="{{$listujian->mapel->id}}" id="">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="hidden" name="semester_id" value="{{$listujian->semester->id}}" id="">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="hidden" name="kelas_id" value="{{$listujian->kelas->id}}" id="">
                                                </div>    
                                            </div>

                                            @php 
                                            
                                            $soal = $listujian->total_question;
                                            $h1 = $rt/$soal;
                                            $h2 = $h1*100;
                                            $h3 = intval($h2); 

                                            @endphp

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nilai</label></div>
                                                <div class="col-12 col-md-2">
                                                    <input type="text" name="nilaipas" value="{{$h3}}">
                                                </div>
                                            </div>
                                            @if((auth()->user()->role == 'guru'))
                                                <a href="/listguru" type="button" class="btn btn-warning">Cancel</a> 
                                            @endif
                                            
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                            </form>
                                            
                                    </div>
                                </main>
                        </body>                            
                        @endif
                        @if($listujian->jenis_ujian == "pts")
                            <body>
                                <header>
                                    <div class="container">
                                            <h1>Ujian Tengah Semester</h1>
                                    </div>
                                </header>
                                <main>
                                    <div class="container">
                                        <h2>You're Done !</h2>
                                            <p>Congrats! You Have Completed The test</p>
                                            <form action="/input/{{$listujian->id}}/pts" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{method_field('PUT')}}

                                            <div class="row form-group">
                                                <div class="col-12 col-md-3">
                                                        @if((auth()->user()->role == 'admin'))
                                                        <select name="siswa_id" id="select" class="form-control">
                                                            @foreach($rom as $sh)
                                                                @if($sh->kelas->rombel == $listujian->kelas->rombel) 
                                                                    <option value="#">Please select</option>
                                                                    <option value="{{$sh->siswa->id}}">{{$sh->siswa->nama}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @endif
                                                        
                                                        @if((auth()->user()->role == 'siswa'))
                                                            <input type="hidden" name="siswa_id" value="{{$siswa->id}}" id="">
                                                        @endif  
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input type="hidden" name="mapel_id" value="{{$listujian->mapel->id}}" id="">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="hidden" name="semester_id" value="{{$listujian->semester->id}}" id="">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input type="hidden" name="kelas_id" value="{{$listujian->kelas->id}}" id="">
                                                </div>    
                                            </div>

                                            @php 
                                            
                                            $soal = $listujian->total_question;
                                            $h1 = $rt/$soal;
                                            $h2 = $h1*100;
                                            $h3 = intval($h2); 

                                            @endphp

                                            <div class="row form-group">
                                                <div class="col col-md-2"><label for="select" class=" form-control-label">Nilai</label></div>
                                                <div class="col-12 col-md-2">
                                                    <input type="text" name="nilaipts" value="{{$h3}}">
                                                </div>
                                            </div>
                                            @if((auth()->user()->role == 'guru'))
                                                <a href="/listguru" type="button" class="btn btn-warning">keluar</a> 
                                            @endif
                                            
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                            </form>
                                            
                                    </div>
                                </main>
                        </body>
                        @endif                        

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