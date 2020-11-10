<?php

namespace App\Http\Livewire\DeliveryType;

use App\Models\DeliveryType;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormModal extends Component
{
    use WithFileUploads;

    public $addTitle = 'Tambah Jenis Pengiriman';
    public $editTitle = 'Ubah Jenis Pengiriman';

    public $icon = "";
    public $title = "";
    public $desc = "";
    public $color = "";
    public $tag = "";
    public $is_active = 0;

    public $storeAndNew = false;
    public $editMode = false;
    public $editId = null;

    protected $rules = [
        'title' => 'required|string|max:50',
        'icon' => 'image|max:500',
        'desc' => 'string',
        'color' => 'string|max:10',
        'tag' => 'string|max:100',
        'is_active' => '',
    ];

    protected $listeners = [
        'edit',
        'update',
        'resetPropValue'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.delivery-type.form-modal');
    }

    /**
     * Save new packet category
     * 
     * @return void
     */
    public function store()
    {
        $validatedData = $this->validate();

        if ($this->icon != "" || $this->icon != null) {
            $filename = time() . 'delivery-type-icon.png';
            $path = '/images/delivery-type-icon/';
            $newFilename = createImage($this->icon, $path, $filename);
            $validatedData['icon'] = $newFilename;
        }

        $store = DeliveryType::create($validatedData);
        if ($store) {
            $this->emitTo('delivery-type.delivery-type', 'resetPage');
            $this->emit('showToast', [
                'headerText' => 'Info',
                'bodyText' => 'Berhasil menyimpan data'
            ]);
        } else {
            $this->emit('showToast', [
                'headerText' => 'Error',
                'bodyText' => 'Terjadi kesalahan saat menyimpan data'
            ]);
        }

        if (!$this->storeAndNew)
            $this->emit('closeModal');

        $this->resetPropValue();
    }

    /**
     * Save packet category and reset properties without close modal
     * 
     * @return void
     */
    public function storeAndNew()
    {
        $this->storeAndNew = true;
        $this->store();
    }

    /**
     * Show modal in edit mode
     * @param int $id
     * 
     * @return void
     */
    public function edit($id)
    {
        $this->editMode = true;

        $record = DeliveryType::where('id', $id)->first();
        if (!$record) {
            $this->emit('showToast', [
                'headerText' => 'Error',
                'bodyText' => 'Data tidak ditemukan'
            ]);
        }

        $this->editId = $record->id;
        $this->title = $record->title;
        $this->desc = $record->desc;
        $this->color = $record->color;
        $this->tag = $record->tag;
        $this->is_active = $record->is_active;

        $this->emit('showModal');
    }

    /**
     * Update packet type
     * 
     * @return void
     */
    public function update()
    {
        $validatedData = $this->validate();

        $record = DeliveryType::where('id', $this->editId)->first();
        if (!$record) {
            $this->emit('showToast', [
                'headerText' => 'Error',
                'bodyText' => 'Data tidak ditemukan'
            ]);
        }

        $filename =  time() . '-delivery-type-icon.png';
        $path = '/images/delivery-type-icon/';
        $newFilename = updateImage($this->icon, $path, $filename, $record->icon);
        $validatedData['icon'] = $newFilename;

        $store = $record->update($validatedData);
        if ($store) {
            $this->emitTo('delivery-type.delivery-type', 'resetPage');
            $this->emit('showToast', [
                'headerText' => 'Info',
                'bodyText' => 'Berhasil mengubah data'
            ]);
        } else {
            $this->emit('showToast', [
                'headerText' => 'Error',
                'bodyText' => 'Terjadi kesalahan saat menyimpan data'
            ]);
        }

        $this->emit('closeModal');
        $this->resetPropValue();
    }

    /**
     * Reset all property value
     * 
     * @return void
     */
    public function resetPropValue()
    {
        $this->storeAndNew = false;
        $this->editMode = false;
        $this->editId = null;

        $this->icon = "";
        $this->title = "";
        $this->desc = "";
        $this->color = "";
        $this->tag = "";
        $this->is_active = 0;
    }
}
