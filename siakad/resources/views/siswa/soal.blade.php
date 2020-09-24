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
							<h3 class="panel-title"></h3>
                        </div>
						<div class="panel-body">
						
                            

							<div class="col-md-9">
							@php  $b = 0; @endphp
							@php  $c = 0; @endphp

							@foreach($listujian->soalujian as $hb)
								<form action="/list/jawabsoal" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}

								<table class="table" >
									<thead>
										<input type="hidden" name="siswa_id[]" value="{{$siswa->id}}">
										<input type="hidden" name="listujian_id[]" value="{{$listujian->id}}">
										<tr>
                                            <th> 
												 @php  $b++; echo $b; @endphp. {{$hb->soal_text}} {{$hb->soal_gambar}} <input type="hidden" name="buatsoal_id[]" value="{{$hb->id}}"> 
											</th>
										</tr>
									</thead>
									<tbody>
									@php  $c++; @endphp										
											<tr>
												<td><input type="radio" name="jawaban[@php  echo $c; @endphp]"  id="asc1" value="{{$hb->jawab1}}">{{$hb->jawab1}}</td>
												<td><input type="radio" name="jawaban[@php  echo $c; @endphp]"  id="asc2" value="{{$hb->jawab2}}">{{$hb->jawab2}}</td>  
											</tr>
											<tr>
												<td style="width:5%"><input type="radio" name="jawaban[@php  echo $c; @endphp]"  id="asc3" value="{{$hb->jawab3}}">{{$hb->jawab3}}</td>
												<td style="width:5%"><input type="radio" name="jawaban[@php  echo $c; @endphp]"  id="asc4" value="{{$hb->jawab4}}">{{$hb->jawab4}}</td>  
											</tr>
									</tbody>
								</table> 
                                    @endforeach

									<button type="submit" class="btn btn-primary">Confirm</button>
									<a href="/list" class="btn btn-danger">Kembali</a>
							</div>
							<div class="col-md-3">
								<div>Waktu Anda <span id="time"></span> minutes</div>
								
							</div>
                                </form>

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
				window.location.href="/jawabsoal";
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
