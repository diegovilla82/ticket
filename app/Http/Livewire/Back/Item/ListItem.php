<?php

namespace App\Http\Livewire\Back\Item;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ListItem extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render(){

        $items = Item::orderByDesc('created_at')
            ->paginate(4);

        return view('livewire.back.item.list-item',[
            'items' => $items
        ]);
    }
}
