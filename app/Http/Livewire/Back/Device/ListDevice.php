<?php

namespace App\Http\Livewire\Back\Device;

use App\Models\Device;
use Livewire\Component;
use Livewire\WithPagination;

class ListDevice extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render(){

        $devices = Device::orderByDesc('created_at')
            ->paginate(4);

        return view('livewire.back.device.list-device',[
            'devices' => $devices
        ]);
    }
}
