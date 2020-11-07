<?php

namespace App\Http\Livewire\PacketType;

use App\Models\PacketType;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class PacketTypeComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $message, $searchText;

    protected $listeners = [
        'reloadData' => 'resetPage',
    ];

    public function mount()
    {
        $this->message = "Hello World";
        $this->searchText = '';
    }

    public function render()
    {
        return view('livewire.packet-type.index', [
            'packetTypes' => PacketType::where('title', 'like', '%' . $this->searchText . '%')->orderBy('created_at', 'desc')->paginate(10)
        ])
            ->extends('layouts.app')
            ->section('content:body');
    }

    public function resetSearch()
    {
        $this->searchText = '';
        $this->resetPage();
    }

    public function editPacketType($id)
    {
        $this->emitTo('packet-type.form-modal', 'showEditModal', ['packetTypeId' => $id]);
    }

    public function deletePacketType($id)
    {
        $record = PacketType::where('id', $id)->first();
        if ($record->delete()) {
            if ($record->logo)
                Storage::disk('public')->delete('images/packet-type-logo/' . $record->logo);

            $this->emit('showToast', [
                'headerText' => 'Info',
                'bodyText' => 'Berhasil menghapus data'
            ]);

            $this->resetPage();
        }
    }
}
