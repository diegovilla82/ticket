<?php

namespace App\Http\Livewire\Back\Service;

use App\Models\User;
use App\Models\Device;
use App\Models\Estado;
use App\Models\Service;
use Livewire\Component;
use App\Http\Traits\toast;

class EditService extends Component
{
    use toast;
    public $service, $estadoSelected, $deviceSelected, $userSelected;

    protected $rules = [
        'estadoSelected'   => 'required',
        'service.problema' => 'required',
        'service.solucion' => '',
        'deviceSelected' => 'required',
        'service.user_id' => '',
    ];

    public function mount(Service $service){
        $this->service = $service;
        $this->deviceSelected = $service->device_id;
        $this->estadoSelected = $service->estado_id;
        $this->userSelected = $service->user_id;
    }

    public function save_service(){
        $this->validate();
        $this->service->save();
            
        $this->toast('Servicio Actualizado');        
    }

    public function delete_service(){
        $this->service->delete();

        return redirect()->route('admin.service.index');
    }


    public function render()
    {
        $estados = Estado::orderBy('descripcion')->pluck('descripcion','id');
        $devices = Device::orderBy('descripcion')->pluck('descripcion','id');
        $users = User::orderBy('name')->pluck('name','id');
        
        return view('livewire.back.service.edit-service', [
            'estados' => $estados,
            'devices' => $devices,
            'users' => $users,

        ]);
    }
}
