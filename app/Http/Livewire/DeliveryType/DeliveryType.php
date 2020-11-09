<?php

namespace App\Http\Livewire\DeliveryType;

use App\Models\DeliveryType as Model;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class DeliveryType extends Component
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
        return view('livewire.delivery-type.delivery-type', [
            'deliveryTypes' => Model::where('title', 'ilike', '%' . $this->searchText . '%')->orderBy('created_at', 'desc')->paginate(10)
        ])
            ->extends('layouts.app')
            ->section('content:body');
    }

    public function resetSearch()
    {
        if ($this->searchText != '') {
            $this->searchText = '';
            $this->resetPage();
        }
    }

    public function edit($id)
    {
        $this->emitTo('delivery-type.form-modal', 'edit', $id);
    }

    public function destroy($id)
    {
        $record = Model::where('id', $id)->first();
        if ($record->delete()) {
            if ($record->logo)
                Storage::disk('public')->delete('images/delivery-type-icon/' . $record->logo);

            $this->emit('showToast', [
                'headerText' => 'Info',
                'bodyText' => 'Berhasil menghapus data'
            ]);

            $this->resetPage();
        }
    }
}
