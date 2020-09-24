<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@if((auth()->user()->role == 'admin'))
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Data Master</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="/siswa" class="">Siswa</a></li>
									<li><a href="/guru" class="">Guru</a></li>
									<li><a href="/nuppk" class="">NUPPK</a></li>
									<li><a href="/semester" class="">Semester</a></li>
									<li><a href="/mapel" class="">Mata Pelajaran</a></li>
									<li><a href="/kom" class="">Kompetesi Keahlian</a></li>
									<li><a href="/kelas" class="">Kelas</a></li>
									<li><a href="#" class="">Ruangan</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Manajemen Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li><a href="/rombel" class="">Rombel</a></li>
									<li><a href="/listabsen" class="">Absen</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Penilaian Siswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="/jurnalsikap" class="">Penilaian Sikap</a></li>
									<li><a href="/listtugas" class="">Input Nilai Tugas</a></li>
									<li><a href="/listkinerja" class=""><i class="lnr lnr-file-empty"></i> <span>Input Nilai Praktek</span></a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages9" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pengelolaan Nilai</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages9" class="collapse ">
								<ul class="nav">
									<li><a href="/rekniltugas" class="">Rekap Nilai Tugas</a></li>
									<li><a href="/index" class="">Rekap Nilai Praktek</a></li>
									<li><a href="/nilrap" class="">Nilai Keseluruhan</a></li>
								</ul>
							</div>
						</li>
						@endif
						@if((auth()->user()->role == 'tu'))
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Data Master</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="/siswa" class="">Siswa</a></li>
									<li><a href="/guru" class="">Guru</a></li>
									<li><a href="/nuppk" class="">NUPPK</a></li>
									<li><a href="/semester" class="">Semester</a></li>
									<li><a href="/mapel" class="">Mata Pelajaran</a></li>
									<li><a href="/kom" class="">Kompetesi Keahlian</a></li>
									<li><a href="/kelas" class="">Kelas</a></li>
									<li><a href="/ruanglihat" class="">Ruangan</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Manajemen Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li><a href="/rombel" class="">Rombel</a></li>
									<li><a href="/listabsen" class="">Absen</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Penilaian Siswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="/jurnalsikap" class="">Penilaian Sikap</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages9" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pengelolaan Nilai</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages9" class="collapse ">
								<ul class="nav">
									<li><a href="/rekniltugas" class="">Rekap Nilai Tugas</a></li>
									<li><a href="/index" class="">Rekap Nilai Praktek</a></li>
									<li><a href="/nilrap" class="">Rekap Nilai Raport</a></li>
								</ul>
							</div>
						</li>
						@endif
						@if((auth()->user()->role == 'guru'))
						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Manajemen Data</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li><a href="/listabguru" class="">Absen</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Penilaian Siswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="/jurnalsikap" class="">Penilaian Sikap</a></li>
									<li><a href="/listtugguru" class="">Input Nilai Tugas</a></li>
									<li><a href="/listgurukem" class="">Input Nilai Praktek</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages9" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pengelolaan Nilai</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages9" class="collapse ">
								<ul class="nav">
									<li><a href="/rekniltugas" class="">Rekap Nilai Tugas</a></li>
									<li><a href="/index" class="">Rekap Nilai Praktek</a></li>
									<li><a href="/nilrap" class="">Rekap Nilai Raport</a></li>
								</ul>
							</div>
						</li>
						@endif
						@if((auth()->user()->role == 'siswa'))
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Penilaian Siswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="/listabsen" class="">Absen</a></li>
									<li><a href="/jurnalsiswa" class="">Jurnal Siswa</a></li>
									<li><a href="/raport" class="">Nilai Keseluruhan</a></li>
								</ul>
							</div>
						</li>
						@endif
					</ul>
				</nav>
			</div>
		</div>