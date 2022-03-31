<?php

namespace App\Http\Livewire\Back\Device;

use App\Models\Area;
use App\Models\Device;
use Livewire\Component;
use App\Http\Traits\toast;
use App\Models\Device_type;
use CodeItNow\BarcodeBundle\Utils\QrCode;

class EditDevice extends Component
{
    use toast;
    public $device, $user;
    public $deviceTypeSelected = 0, $areaSelected = 0;

    protected $rules = [
        'device.descripcion' => '',
        'device.inventario' => 'required|integer|digits_between:4,6|unique:devices,inventario',
        'device.fecha_compra' => '',
        'device.cantidad' => '',
        'deviceTypeSelected' => '',
        'areaSelected' => '',
    ];

    public function mount(Device $device){
        $this->device = $device;
        $this->deviceTypeSelected = $this->device->device_type_id;
        $this->areaSelected = $this->device->area_id;
    }
    

    public function save_device(){
        $this->validate();
        $this->device->device_type_id = $this->deviceTypeSelected;
        $this->device->area_id = $this->areaSelected;
        $this->device->save();
            
        $this->toast('Dispositivo Actualizado');        
    }


    public function delete_device(){
        $this->device->delete();

        return redirect()->route('admin.device.index');
    }


    public function render()
    {
        $devicesTypes = Device_type::orderBy('descripcion')->pluck('descripcion','id');
        $areas = Area::orderBy('descripcion')->pluck('descripcion','id');
        
        $qrCode = new QrCode();

        $ruta = route('admin.device.services', $this->device->id);
        $qrCode
            ->setText($ruta)
            ->setSize(200)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
            ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
            ->setLabel($this->device->inventario)
            ->setLabelFontSize(14)
            ->setImageType(QrCode::IMAGE_TYPE_PNG)
        ;

        $qr = '<img src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'" />';

        return view('livewire.back.device.edit-device', [
            'devicesTypes' => $devicesTypes,
            'areas' => $areas,
            'qr' => $qr
        ]);
    }
}
