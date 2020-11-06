<?php

namespace App\Http\Livewire\PacketType;

use App\Models\PacketType;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormModal extends Component
{
    use WithFileUploads;

    public $modalTitle, $logo, $title, $color, $desc;

    protected $rules = [
        'logo' => 'required|image|max:1024',
        'title' => 'required|string|min:5',
    ];

    public function mount()
    {
        $this->modalTitle = 'Create';
        $this->logo = '';
        $this->title = '';
        $this->color = '';
        $this->desc = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validate = $this->validate();

        $this->logo->store('photos');

        PacketType::create($validate);
    }

    public function render()
    {
        return view('livewire.packet-type.form-modal');
    }
}
