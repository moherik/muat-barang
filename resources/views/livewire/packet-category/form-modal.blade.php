<div>
    <div wire:ignore.self class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="formModal" aria-modal="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="{{!$editMode ? 'addPacketCategory' : 'updatePacketCategory'}}">
                    <div class="modal-header">
                        <h5 class="modal-title">{{$modalTitle}}</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
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
                            <label>Logo</label>
                            <input type="file" class="form-control {{$errors->has('logo') ? 'border-danger' : ''}}" wire:model="logo">
                            @if($editMode)
                            <span class="form-text text-info">
                                <span class="iconify mr-2" data-icon="mdi:information-outline" data-inline="false"></span>Kosongkan jika tidak ingin mengubah gambar</span>
                            @endif
                            @if ($logo)
                            <div class="mt-2">
                                <p class="text-small my-0">Logo Preview:</p>
                                <img src="{{ $logo->temporaryUrl() }}" class="img rounded img-thumbnail" alt="logo preview" width="50" height="70">
                            </div>
                            @endif
                            @error('logo')
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
                    </div>
                    <div class="modal-footer bg-whitesmoke">
                        <button type="submit" class="btn btn-primary btn-shadow">Simpan</button>
                        @if(!$editMode)
                        <button type="button" wire:click.prevent="saveAndNew" class="btn btn-primary btn-shadow">Simpan & Buat Baru</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>