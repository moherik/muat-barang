<?php

namespace App\Http\Livewire\PacketType;

use App\Models\PacketType;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormModal extends Component
{
    use WithFileUploads;

    public $modalTitle, $logo, $title, $color, $desc;

    public $editMode = false;
    public $editPacketTypeId = null;

    public $createRules = [
        'logo' => 'required|image|max:1024',
        'title' => 'required|string|min:5',
        'color' => 'string',
        'desc' => 'string',
    ];

    public $updateRules = [
        'logo' => 'image|max:1024',
        'title' => 'required|string|min:5',
        'color' => 'string',
        'desc' => 'string',
    ];

    protected $listeners = [
        'showEditModal' => 'editMode',
        'updatePacketType' => 'updatePacketType'
    ];

    public function mount()
    {
        $this->modalTitle = 'Create';
        $this->resetPropValue();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->createRules);
    }

    public function updatedEditMode($propertyName)
    {
        $this->validateOnly($propertyName, $this->updateRules);
    }

    public function render()
    {
        return view('livewire.packet-type.form-modal');
    }

    /**
     * Save new packet type
     */
    public function addPacketType()
    {
        $validatedData = $this->validate($this->createRules);

        $filename = $this->uploadImage($this->logo, 'images/packet-type-logo');
        $validatedData['logo'] = $filename;

        $store = PacketType::create($validatedData);
        if ($store) {
            $this->emitTo('packet-type.packet-type-component', 'reloadData');
            $this->emit('showToast', [
                'headerText' => 'Info',
                'bodyText' => 'Berhasil menyimpan data'
            ]);
        }

        $this->emit('closeModal');
        $this->resetPropValue();
    }

    /**
     * Show modal in edit mode
     * @param int $packetTypeId
     * 
     * @return void
     */
    public function editMode($packetTypeId)
    {
        $this->editMode = true;
        $this->modalTitle = 'Edit';

        $record = PacketType::where('id', $packetTypeId)->first();
        if ($record) {
            $this->editPacketTypeId = $record->id;
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
    public function updatePacketType()
    {
        $validatedData = $this->validate($this->updateRules);

        $record = PacketType::where('id', $this->editPacketTypeId)->first();
        if ($record) {
            $newFilename = $this->updateLogo($this->logo, $record->logo);
            $validatedData['logo'] = $newFilename;

            $store = $record->update($validatedData);
            if ($store) {
                $this->emitTo('packet-type.packet-type-component', 'reloadData');
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
            $filename = $this->uploadImage($newImageData, 'images/packet-type-logo');

            if ($filename != null) {
                Storage::disk('public')->delete('images/packet-type-logo/' . $oldFilename);
                return $filename;
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
    public function uploadImage($imageData, $path)
    {
        $filename = 'packet-type-logo-' . time() . '.png';
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
        $this->editMode = false;
        $this->editPacketTypeId = null;
        $this->logo = '';
        $this->title = '';
        $this->color = '';
        $this->desc = '';
    }
}
