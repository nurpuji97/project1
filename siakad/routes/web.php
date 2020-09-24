<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/testa','AdminController@test');

Route::get('/logcbt','AuthController@loginujian')->name('login');
Route::post('/postlogcbt','AuthController@postlogincbt');
Route::get('/logoutcbt','AuthController@logoutcbt');


Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::middleware(['auth','checkRole:admin,siswa,guru,tu'])->group(function() {
    Route::get('/dashcbt','AdminController@indexcbt');
    
    Route::get('/dashboard','AdminController@index');

    Route::get('/list','UjianController@lihatlistujian');
    Route::get('/index/{id}/ujian','UjianController@indexujian');
    Route::get('/soal/{id}/ujian','UjianController@soalujian');
    Route::post('/final/{id}/ujian','UjianController@hasilujian');
    Route::put('/input/{id}/pts','UjianController@hasilpts');
    Route::put('/input/{id}/pas','UjianController@hasilpas');
    
    Route::get('/listabsen','TugasController@listabsen');
    Route::get('/add/{id}/absensi','TugasController@addabsensi');

});

Route::middleware(['auth','checkRole:admin,tu'])->group(function() {

    Route::get('/siswa','SiswaController@index');
    Route::post('/inputsiswa','SiswaController@tambahsiswa');
    Route::get('/siswa/{id}/edit','SiswaController@editsiswa');
    Route::put('/siswa/{id}/update','SiswaController@updatesiswa');
    Route::get('/siswa/{id}/delete','SiswaController@deletesiswa');

    Route::get('/guru','GuruController@index');
    Route::post('/inputguru','GuruController@tambahguru');
    Route::get('/guru/{id}/edit','GuruController@editguru');
    Route::put('/guru/{id}/update','GuruController@updateguru');
    Route::get('/guru/{id}/delete','GuruController@deleteguru');

    Route::get('/kelas','KelasController@index');
    Route::get('/kelas/cari','KelasController@cari');
    Route::post('/inputkelas','KelasController@tambahkelas');
    Route::get('/kelas/{id}/edit','KelasController@editsiswa');
    Route::put('/kelas/{id}/update','KelasController@updatekelas');
    Route::get('/kelas/{id}/delete','KelasController@deletekelas');

    Route::get('/mapel','MapelController@index');
    Route::post('/inputmapel','MapelController@tambahmapel');
    Route::get('/mapel/{id}/edit','MapelController@editmapel');
    Route::put('/mapel/{id}/update','MapelController@updatemapel');
    Route::get('/mapel/{id}/delete','MapelController@deletemapel');

    Route::get('/nuppk','AdminController@lihatnuppk');
    Route::post('/inputnuppk','AdminController@inputnuppk');
    Route::get('/nuppk/{id}/delete','AdminController@deletenuppk');

    Route::get('/kom','AdminController@lihatkom');
    Route::post('/inputkom','AdminController@inputkom');
    Route::get('/kom/{id}/delete','AdminController@deletekom');

    Route::get('/semester','AdminController@lihatsem');
    Route::post('/inputsemester','AdminController@inputsem');
    Route::get('/sem/{id}/delete','AdminController@deletesem');

    Route::get('/rombel','RombelController@index');
    Route::post('/inputrombel','RombelController@inputrombel');
    Route::get('/rombel/{id}/delete','RombelController@deleterombel');
    Route::get('/rombel/{id}/edit','RombelController@editrombel');
    Route::put('/rombel/{id}/update','RombelController@updaterombel');

    
    /*
    Route::get('/diri','PenilaianTemanController@lihatpernyataandiri');
    Route::post('/inputpertanyaandiri','PenilaianTemanController@tambahpernyataandiri');
    Route::get('/diri/{id}/delete','PenilaianTemanController@hapuspernyataandiri');

    Route::get('/teman','PenilaianTemanController@lihatpernyataanteman');
    Route::post('/inputpertanyaanteman','PenilaianTemanController@tambahpernyataanteman');
    Route::get('/teman/{id}/delete','PenilaianTemanController@hapuspernyataanteman');
    
    Route::get('/penilaiandiri','PenilaianTemanController@lihatpenilaiandiri');
    Route::post('/inputpenilaiandiri','PenilaianTemanController@addpenilaiandiri');

    Route::get('/penilaianteman','PenilaianTemanController@lihatpenilaianteman');
    Route::post('/inputpenilaianteman','PenilaianTemanController@addpenilaianteman');
    
    Route::get('/komdas','KompedasarController@lihatkomdas');
    Route::post('/inputkomdas','KompedasarController@inputkomdas');
    Route::get('/komdas/{id}/delete','KompedasarController@hapuskomdas');
    */
    Route::get('/listkinerja','KemampuanController@index');
    Route::post('/inputlistkinerja','KemampuanController@tambahlistkin');
    Route::get('/listkinerja/{id}/edit','KemampuanController@editlist');
    Route::put('/listkinerja/{id}/update','KemampuanController@updatelistkin');
    Route::get('/listkinerja/{id}/delete','KemampuanController@hapuslistkin');
    Route::get('/lemskokin/{id}/lihat','KemampuanController@lemskokin');
    Route::post('/listkinerja/{id}/insert','KemampuanController@insertlemsko');
    Route::get('/listkinerja/{idkin}/lihat/{idlem}/delete','KemampuanController@hapuslemsko');

    Route::get('/ruanglihat','AdminController@lihatruang');
    Route::post('/inputruang','AdminController@tambahruang');
    Route::get('/ruanglihat/{id}/edit','AdminController@editruang');
    Route::put('/ruanglihat/{id}/update','AdminController@updateruang');
    Route::get('/ruanglihat/{id}/delete','AdminController@deleteruang');
    

});

Route::middleware(['auth','checkRole:admin'])->group(function() {

    //kosong
    
});

Route::middleware(['auth','checkRole:admin,guru,tu'])->group(function() { //untuk guru dan tu
    Route::get('/jurnalsikap','JurnalSikapController@index');
    Route::post('/inputjurnal','JurnalSikapController@addjurnal');
    Route::get('/jurnalsikap/{id}/edit','JurnalSikapController@editjurnal');
    Route::put('/jurnalsikap/{id}/update','JurnalSikapController@updatejurnal');
    Route::get('/jurnalsikap/{id}/delete','JurnalSikapController@deletejurnal');

    Route::post('/inputlistkinerja','KemampuanController@tambahlistkin');
    Route::get('/listkinerja/{id}/edit','KemampuanController@editlist');
    Route::put('/listkinerja/{id}/update','KemampuanController@updatelistkin');
    Route::get('/listkinerja/{id}/delete','KemampuanController@hapuslistkin');
    Route::get('/lemskokin/{id}/lihat','KemampuanController@lemskokin');
    Route::post('/listkinerja/{id}/insert','KemampuanController@insertlemsko');
    Route::get('/listkinerja/{idkin}/lihat/{idlem}/delete','KemampuanController@hapuslemsko');

    Route::get('/lemskopro/{id}/lihat','KemampuanController@lemskopro');
    Route::post('/listkinerjapro/{id}/insert','KemampuanController@insertlemskopro');
    Route::get('/listkinerjapro/{idkin}/lihat/{idlem}/delete','KemampuanController@hapuslemskopro');

    Route::post('/addnilrekpra','KemampuanController@addrekpra');
    Route::put('/upaddnilrekpra','KemampuanController@uptaddrekpra2');
    Route::put('/upaddnilrekpra3','KemampuanController@uptaddrekpra3');
    Route::put('/upaddnilrekpra4','KemampuanController@uptaddrekpra4');

    Route::get('/index','OlahNilaiController@index');
    Route::post('/cari/olahnilai','OlahNilaiController@cari');
    Route::get('/penilpra/{id}/edit','OlahNilaiController@editnilpra');
    Route::put('/upnilra','OlahNilaiController@innilpro');
    Route::put('/upaddnilpro','OlahNilaiController@innilpra');

    Route::get('/rekniltugas','OlahNilaiController@lihatpeniltug');
    Route::post('/cari/peniltug','OlahNilaiController@caritug');
    Route::get('/peniltug/{id}/edit','OlahNilaiController@editniltug');

    Route::get('/listtugas','TugasController@listtugas');
    
    Route::get('/edit/{id}/absensi','TugasController@editabsenguru');
    Route::put('/update/{id}/absensi','TugasController@updateabsenguru');
    Route::get('/hapus/{id}/absensi','TugasController@deleteabsenguru');
    Route::post('/add/listabsen','TugasController@addlistabsen');

    Route::post('/input/{id}/temnilkes','TugasController@innilsis');
    Route::get('/input/{id}/tugas','TugasController@inputtugas');
    
    Route::put('/add/tugas1','TugasController@addniltug1');
    Route::put('/add/tugas2','TugasController@addniltug2');
    Route::put('/add/tugas3','TugasController@addniltug3');
    Route::put('/add/tugas4','TugasController@addniltug4');
    Route::put('/add/tugas5','TugasController@addniltug5');
    Route::put('/add/tugas6','TugasController@addniltug6');
    Route::put('/add/tugas7','TugasController@addniltug7');
    Route::put('/add/tugas8','TugasController@addniltug8');
    Route::put('/add/tugas9','TugasController@addniltug9');
    Route::put('/add/tugas10','TugasController@addniltug10');
    Route::put('/add/tugas11','TugasController@addniltug11');
    Route::put('/add/tugas12','TugasController@addniltug12');

    Route::put('/add/nilai/tugas','OlahNilaiController@inniltug');

    Route::get('/edit/{id}/listujian','UjianController@editlistujian');
    Route::put('/update/{id}/listujian','UjianController@updatelistujian');
    Route::get('/delete/{id}/listujian','UjianController@deletelistujian');
    Route::post('/add/listujian','UjianController@addlistujian');

    Route::get('/lihat/{id}/buatsoal','UjianController@buatsoal');
    Route::post('/add/{id}/buatsoal','UjianController@addsoal');
    Route::get('/edit/{idlist}/{idsoal}/buatsoal','UjianController@editadd');
    Route::put('/update/{idlist}/{idsoal}/buatsoal','UjianController@updatesoal');
    Route::get('/hapus/{idlist}/{idsoal}/buatsoal','UjianController@hapussoal');
    Route::get('/lihat/{idlist}/{idsoal}/jawaban','UjianController@lihatjawaban');
    Route::post('/add/{idlist}/{idsoal}/jawaban','UjianController@addjawaban');
    Route::get('/hapus/{idlist}/{idsoal}/{idjawab}/jawaban','UjianController@hapusjawab');

    Route::get('/nilrap','OlahNilaiController@readnilai');
    Route::get('/nilrap/{id}/edit','OlahNilaiController@editnilai');
    Route::put('/nilrap/{id}/update','OlahNilaiController@updatenilai');
    Route::post('/cari/nilai','OlahNilaiController@carinil');
    
    

});

Route::middleware(['auth','checkRole:guru'])->group(function() { //untuk guru
    Route::get('/listguru','UjianController@lihatlistujianguru');

    Route::get('/listgurukem','GuruController@listkemguru');

    Route::get('/listtugguru','TugasController@listtugasguru');
     
    Route::get('/listabguru','TugasController@listabsenguru'); 
});

Route::middleware(['auth','checkRole:siswa'])->group(function() { //untuk tu
    Route::get('/jurnalsiswa','SiswaController@lihatjurnalsiswa');
    Route::get('/nilaidirisiswa','SiswaController@lihatpenilaiandiri');
    Route::post('/inputnilaidirisiswa','SiswaController@addpenilaiansiswa');

    Route::get('/nilaitemansiswa','SiswaController@lihatpenilaianteman');
    Route::post('/inputnilaitemansiswa','SiswaController@addpenilaianteman');

    Route::get('/raport','OlahNilaiController@readnilaisis');
    Route::post('/cari/raport','OlahNilaiController@carinilsis');
    Route::get('/raport/{id}','OlahNilaiController@linilsis');


});

