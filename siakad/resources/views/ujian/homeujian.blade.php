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
                            <body>
                                <header>
                                    <div class="container">
                                    @if($listujian->jenis_ujian == "pas")
                                        <h1>Ujian Akhir Semester</h1>
                                    @endif
                                    @if($listujian->jenis_ujian == "pts")
                                        <h1>Ujian Tengah Semester</h1>
                                    @endif
                                    </div>
                                </header>
                                <main>
                                    <div class="container">
                                        <h2>{{$listujian->mapel->nama_mapel}}</h2> 
                                        <p>This is a multiple choice quiz to test your knowledge PHP</p>
                                        <ul>
                                            <li> <strong>Number Of Questions:</strong> {{$listujian->soalujian->count()}}</li>
                                            <li> <strong>Type:</strong> Multiple Choice </li>
                                            <li> <strong>Estimated Time:</strong> {{$listujian->exam_duration}} Minutes </li>
                                        </ul>
                                        <a href="/soal/{{$listujian->id}}/ujian" class="start"> Start Quiz</a>
                                        @if((auth()->user()->role == 'admin'))
                                            <a href="/list" class="btn btn-danger"> Keluar</a>
                                        @endif
                                        @if((auth()->user()->role == 'tu'))
                                            <a href="/list" class="btn btn-danger"> Keluar</a>
                                        @endif
                                        @if((auth()->user()->role == 'guru'))
                                            <a href="/listguru" class="btn btn-danger"> Keluar</a>
                                        @endif
                                        @if((auth()->user()->role == 'siswa'))
                                            <a href="/list" class="btn btn-danger"> Keluar</a>
                                        @endif   
                                    </div>
                                </main>
                            </body>
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