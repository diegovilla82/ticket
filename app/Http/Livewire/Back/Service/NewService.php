<?php

namespace App\Http\Livewire\Back\Service;

use App\Models\User;
use App\Models\Device;
use App\Models\Estado;
use App\Models\Service;
use Livewire\Component;

class NewService extends Component
{
    public $service, $estadoSelected = 1, $deviceSelected = 1, $userSelected = 1, $deviceIdModal;

    protected $rules = [
        'estadoSelected'   => 'required',
        'service.problema' => 'required',
        'service.solucion' => '',
        'deviceSelected' => 'required',
        'service.user_id' => '',
    ];

    public function save_service() {
        // Si deviceIdModal tiene valor es porque esta siendo llamado desde el modal y debo usar este valor
        $this->deviceSelected = $this->deviceIdModal ? $this->deviceIdModal : $this->deviceSelected;
        $this->validate();
        
        Service::create([
            'estado_id' => $this->estadoSelected,
            'problema'  => $this->service->problema,
            'solucion'  => $this->service->solucion,
            'device_id' => $this->deviceSelected,
            'user_id'   => $this->userSelected,
        ]);

        //Si es llamado del modal debo redireccionar a la vista de servicios por dispositivo
        if($this->deviceIdModal) {
            return redirect()->route('admin.device.services', $this->deviceSelected);
        }
            return redirect()->route('admin.service.index');


    }

    public function mount($deviceIdModal = null) {
        $this->service = new Service();
        $this->deviceIdModal = $deviceIdModal;
    }

    public function render() {
        $estados = Estado::orderBy('descripcion')->pluck('descripcion','id');
        $devices = Device::orderBy('descripcion')->pluck('descripcion','id');
        $users = User::orderBy('name')->pluck('name','id');
        
        // Si deviceIdModal tiene valor debo redireccionar a la vista del modal
        $vista = $this->deviceIdModal ? 'livewire.back.device.add-service' : 'livewire.back.service.new-service';
        
        return view($vista, [
            'estados' => $estados,
            'devices' => $devices,
            'users' => $users
        ]);
    }
}
