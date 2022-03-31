<?php

namespace App\Http\Livewire\Back\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ListService extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $services = Service::orderByDesc('created_at')
        ->paginate(7);

        return view('livewire.back.service.list-service',
    [ "services" => $services ]);
    }
}
