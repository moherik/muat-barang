<?php

namespace App\Http\Livewire\PacketCategory;

use App\Models\PacketCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormModal extends Component
{
    use WithFileUploads;

    public $modalTitle, $logo, $title, $desc;

    public $saveAndNew = false;
    public $editMode = false;
    public $editPacketCategoryId = null;

    protected $rules = [
        'title' => 'required|string',
        'logo' => 'image|max:500',
        'desc' => 'string',
    ];

    protected $listeners = [
        'showEditModal' => 'editMode',
        'updatePacketCategory' => 'updatePacketCategory',
        'resetPropValue' => 'resetPropValue'
    ];

    public function mount()
    {
        $this->modalTitle = 'Tambah Kategori';
        $this->resetPropValue();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.packet-category.form-modal');
    }

    /**
     * Save new packet category
     * 
     * @return void
     */
    public function addPacketCategory()
    {
        $validatedData = $this->validate();

        if ($this->logo != "" || $this->logo != null) {
            $filename = 'packet-category-logo-' . time() . '.png';
            $newFilename = $this->uploadImage($this->logo, 'images/packet-category-logo', $filename);
            $validatedData['logo'] = $newFilename;
        }

        $store = PacketCategory::create($validatedData);
        if ($store) {
            $this->emitTo('packet-category.packet-category', 'reloadData');
            $this->emit('showToast', [
                'headerText' => 'Info',
                'bodyText' => 'Berhasil menyimpan data'
            ]);
        }

        if (!$this->saveAndNew)
            $this->emit('closeModal');

        $this->resetPropValue();
    }

    /**
     * Save packet category and reset properties without close modal
     * 
     * @return void
     */
    public function saveAndNew()
    {
        $this->saveAndNew = true;
        $this->addPacketCategory();
    }

    /**
     * Show modal in edit mode
     * @param int $PacketCategoryId
     * 
     * @return void
     */
    public function editMode($packetCategoryId)
    {
        $this->editMode = true;
        $this->modalTitle = 'Ubah Kategori';

        $record = PacketCategory::where('id', $packetCategoryId)->first();
        if ($record) {
            $this->editPacketCategoryId = $record->id;
            $this->title = $record->title;
            $this->color = $record->color;
            $this->desc = $record->desc;

            $this->emit('showModal');
        }
    }

    /**
     * Update packet type
     * 
     * @return void
     */
    public function updatePacketCategory()
    {
        $validatedData = $this->validate();

        $record = PacketCategory::where('id', $this->editPacketCategoryId)->first();
        if ($record) {
            $newFilename = $this->updateLogo($this->logo, $record->logo);
            $validatedData['logo'] = $newFilename;

            $store = $record->update($validatedData);
            if ($store) {
                $this->emitTo('packet-category.packet-category', 'reloadData');
                $this->emit('showToast', [
                    'headerText' => 'Info',
                    'bodyText' => 'Berhasil mengubah data'
                ]);
            }

            $this->emit('closeModal');
            $this->resetPropValue();
        }
    }

    /**
     * Update logo
     * @param ImageData $newImageData
     * @param string $oldfilename
     * 
     * @return string $filename
     */
    public function updateLogo($newImageData, $oldFilename)
    {
        if ($newImageData != null || $newImageData != "") {
            $filename = 'packet-category-logo-' . time() . '.png';
            $newFilename = $this->uploadImage($newImageData, 'images/packet-category-logo', $filename);

            if ($newFilename != null) {
                Storage::disk('public')->delete('images/packet-category-logo/' . $oldFilename);
                return $newFilename;
            } else {
                return $oldFilename;
            }
        }

        return $oldFilename;
    }

    /**
     * Upload image
     * @param ImageData $imageData
     * @param string $path
     * 
     * @return string $filename
     * @return null
     */
    public function uploadImage($imageData, $path, $filename)
    {
        $upload = $imageData->storeAs($path, $filename, 'public');
        if ($upload) {
            return $filename;
        }

        return null;
    }

    /**
     * Reset all property value
     * 
     * @return void
     */
    public function resetPropValue()
    {
        $this->saveAndNew = false;
        $this->editMode = false;
        $this->editPacketCategoryId = null;
        $this->logo = '';
        $this->title = '';
        $this->desc = '';
    }
}
