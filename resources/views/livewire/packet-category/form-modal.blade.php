<div wire:ignore.self class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="formModal" aria-modal="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <form wire:submit.prevent="{{!$editMode ? 'store' : 'update'}}">
                <div class="modal-header">
                    <h5 class="modal-title">{{!$editMode ? $addTitle : $editTitle}}</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori Paket</label>
                        <input type="text" class="form-control {{$errors->has('title') ? 'border-danger' : ''}}" wire:model="title">
                        @error('title')
                        <span class="text-danger form-text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ikon</label>
                        <input type="file" class="form-control {{$errors->has('icon') ? 'border-danger' : ''}}" wire:model="icon">
                        @if($editMode)
                        <span class="form-text text-info">
                            <span class="iconify mr-2" data-icon="mdi:information-outline" data-inline="false"></span>
                            Kosongkan jika tidak ingin mengubah ikon
                        </span>
                        @endif
                        @if ($icon)
                        <div class="mt-2">
                            <p class="text-small my-0">Ikon Preview:</p>
                            <img src="{{ $icon->temporaryUrl() }}" class="img rounded img-thumbnail" alt="ikon preview" width="50" height="70">
                        </div>
                        @endif
                        @error('icon')
                        <span class="text-danger form-text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control h-25 {{$errors->has('desc') ? 'border-danger' : ''}}" wire:model="desc"></textarea>
                        @error('desc')
                        <span class="text-danger form-text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Warna</label>
                        <input type="color" class="form-control {{$errors->has('color') ? 'border-danger' : ''}}" wire:model="color">
                        @error('color')
                        <span class="text-danger form-text">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <div class="mr-auto">
                        <label class="custom-switch p-0">
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" wire:model="is_active">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Aktif?</span>
                        </label>
                        @error('is_active')
                        <span class="text-danger form-text">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-shadow">Simpan</button>
                    @if(!$editMode)
                    <button type="button" wire:click.prevent="storeAndNew" class="btn btn-primary btn-shadow">Simpan & Buat Baru</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>