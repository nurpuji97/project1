<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashcbt" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@if((auth()->user()->role == 'admin'))
							<li><a href="/list" class=""><i class="lnr lnr-file-empty"></i> <span>Ujian</span></a></li>
						@endif
						@if((auth()->user()->role == 'tu'))
							<li><a href="/list" class=""><i class="lnr lnr-file-empty"></i> <span>Ujian</span></a></li>
						@endif
						@if((auth()->user()->role == 'guru'))
							<li><a href="/listguru" class=""><i class="lnr lnr-file-empty"></i> <span>Ujian</span></a></li>
						@endif
						@if((auth()->user()->role == 'siswa'))
							<li><a href="/list" class=""><i class="lnr lnr-file-empty"></i> <span>Ujian</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>