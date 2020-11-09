<?php

namespace App\Http\Livewire\PacketCategory;

use App\Models\PacketCategory as Model;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class PacketCategory extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $message, $searchText;

    protected $listeners = [
        'reloadData' => 'resetPage',
        'resetSearch',
        'search',
    ];

    public function mount()
    {
        $this->message = "Hello World";
        $this->searchText = '';
    }

    public function render()
    {
        return view('livewire.packet-category.index', [
            'packetCategories' => Model::where('title', 'like', '%' . $this->searchText . '%')->orderBy('created_at', 'desc')->paginate(10)
        ])
            ->extends('layouts.app')
            ->section('content:body');
    }

    public function search($text)
    {
        $this->searchText = $text;
    }

    public function resetSearch()
    {
        $this->searchText = '';
        $this->resetPage();
    }

    public function editPacketCategory($id)
    {
        $this->emitTo('packet-category.form-modal', 'showEditModal', ['packetCategoryId' => $id]);
    }

    public function deletePacketCategory($id)
    {
        $record = Model::where('id', $id)->first();
        if ($record->delete()) {
            if ($record->logo)
                Storage::disk('public')->delete('images/packet-category-logo/' . $record->logo);

            $this->emit('showToast', [
                'headerText' => 'Info',
                'bodyText' => 'Berhasil menghapus data'
            ]);

            $this->resetPage();
        }
    }
}
