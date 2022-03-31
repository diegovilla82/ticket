<?php

use App\Http\Livewire\Front\Home;
use App\Http\Livewire\Front\Contacto;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Front\Noticia\ShowNoticia;
use App\Models\Device;
use CodeItNow\BarcodeBundle\Utils\QrCode;
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

Route::get('/', Home::class)->name('home');
//
Auth::routes();

Route::get('/qrgenerator/{id}', function ($id) {

    // $device = Device::find($id);
    // dd($device);
    // $ruta = route('admin.device.edit', $device->id);

    $ruta = 'https://defensordelpueblo.chaco.gob.ar/assets/files/biblioteca/informe_anual_2021.pdf';
    $qrCode = new QrCode();
$qrCode
    ->setText($ruta)
    ->setSize(130)
    ->setPadding(3)
    ->setErrorCorrection('high')
    ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
    ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
    // ->setLabel($device->inventario)
    ->setLabelFontSize(16)
    ->setImageType(QrCode::IMAGE_TYPE_PNG)
;
echo '<img src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'" />';
})->name('qrgenerator');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
