<?php

namespace App\Http\Livewire\PacketType;

use App\Models\PacketType as Model;
use Livewire\Component;
use Livewire\WithPagination;

class PacketType extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $message, $searchText;

    public function mount()
    {
        $this->message = "Hello World";
        $this->searchText = '';
    }

    public function render()
    {
        return view('livewire.packet-type.index', [
            'packetTypes' => Model::where('title', 'like', '%' . $this->searchText . '%')->paginate(10)
        ])
            ->extends('layouts.app')
            ->section('content:body');
    }

    public function resetSearch()
    {
        $this->searchText = '';
        $this->resetPage();
    }

    public function deletePacketType($id)
    {
        if ($id) {
            $delete = Model::where('id', $id)->delete();
            if ($delete) {
                $this->resetPage();
            }
        }
    }
}
