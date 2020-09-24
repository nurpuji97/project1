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

        .current {
            padding:10px;
            background:#f4f4f4;
            border: 1px dotted #ccc;
            margin: 20px 0 10px 0;
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
                                        <div class="current" id="time"> Menit </div>
                                        @php $kk = 0;@endphp
                                        @foreach($listujian->soalujian as $tt)
                                        <form action="/final/{{$listujian->id}}/ujian" method="post" onsubmit="return score()">
                                            {{ csrf_field() }}
                                        <p class="question">
                                            {{$tt->soal_text}}
                                        </p>
                                        @php $kk++;@endphp
                                            <ul class="choices">
                                                @foreach($jawab as $bb)
                                                    @if($bb->soal_ujian_id == $tt->id)
                                                        <li> <input type="radio" name="jawaban[@php echo $kk ;@endphp]" value="{{$bb->is_correct}}">{{$bb->jawaban}}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            
                                        @endforeach    
                                            <input type="submit" value="Submit">
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
                                        <div class="current" id="time"> Menit </div>
                                        @php $kk = 0;@endphp
                                        @foreach($listujian->soalujian as $tt)
                                        <form action="/final/{{$listujian->id}}/ujian" method="post" onsubmit="return score()">
                                            {{ csrf_field() }}
                                        <p class="question">
                                            {{$tt->soal_text}}
                                        </p>
                                        @php $kk++;@endphp
                                            <ul class="choices">
                                                @foreach($jawab as $bb)
                                                    @if($bb->soal_ujian_id == $tt->id)
                                                        <li> <input type="radio" name="jawaban[@php echo $kk ;@endphp]" value="{{$bb->is_correct}}">{{$bb->jawaban}}</li>
                                                    @endif
                                                @endforeach
                                            </ul> 
                                        @endforeach    
                                            <input type="submit" value="Submit">
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
    <script language="javascript" type="text/javascript">
        
        function startTimer(duration, display) {
		var timer = duration, minutes, seconds;
		var downloadTimer = setInterval(function () {
			minutes = parseInt(timer / 60, 10);
			seconds = parseInt(timer % 60, 10);

			minutes = minutes < 10 ? "0" + minutes : minutes;
			seconds = seconds < 10 ? "0" + seconds : seconds;

			display.textContent = minutes + ":" + seconds;

			if (--timer < 0) {
				clearInterval(downloadTimer);
				document.getElementById("time").innerHTML = "Finished";
				}
			}, 1000);
		}

		window.onload = function () {
    		var fiveMinutes = 60 * {!!$listujian->exam_duration!!},
        	display = document.querySelector('#time');
			startTimer(fiveMinutes, display);
    		
		};

    </script>
@stop