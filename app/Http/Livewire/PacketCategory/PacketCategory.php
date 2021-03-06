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

    public $searchText = "";

    protected $listeners = [
        'resetPage',
        'resetSearch',
    ];

    public function render()
    {
        return view('livewire.packet-category.packet-category', [
            'packetCategories' => Model::where('title', 'ilike', '%' . $this->searchText . '%')->orderBy('created_at', 'desc')->paginate(10)
        ])
            ->extends('layouts.app')
            ->section('content:body');
    }

    public function resetSearch()
    {
        $this->searchText = '';
        $this->resetPage();
    }

    public function edit($id)
    {
        $this->emitTo('packet-category.form-modal', 'edit', $id);
    }

    public function destroy($id)
    {
        $record = Model::where('id', $id)->first();
        if ($record->delete()) {
            if ($record->icon)
                Storage::disk('public')->delete('images/packet-category-icon/' . $record->icon);

            $this->emit('showToast', [
                'headerText' => 'Info',
                'bodyText' => 'Berhasil menghapus data'
            ]);

            $this->resetPage();
        }
    }
}
