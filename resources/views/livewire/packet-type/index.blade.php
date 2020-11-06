@section('title')
Jenis Paket
@stop

@section('content:header')
Jenis Paket
@stop

@section('content:breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
<div class="breadcrumb-item">Jenis Paket</div>
@stop

@section('modal')
<livewire:packet-type.form-modal />
@stop

{{-- content:body section --}}
<div>
    <div class="card">
        <div class="card-header">
            <h4>
                Data
                <div wire:loading>
                    Processing...
                </div>
            </h4>
            <div class="card-header-form mr-2">
                <div class="input-group">
                    <input type="text" wire:model.debounce.500ms="searchText" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary" wire:click="resetSearch">
                            <span class="iconify" data-icon="mdi:close" data-inline="false" width="18" height="18"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-header-action">
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle" aria-expanded="false">Options</a>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 27px, 0px);">
                        <a href="#" class="dropdown-item has-icon" data-toggle="modal" data-target="#formModal">
                            <span class="iconify mr-3" data-icon="mdi:text-box-plus-outline" data-inline="false" data-width="15" data-height="15"></span>Tambah
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Judul</th>
                            <th>Warna</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packetTypes as $packetType)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{$packetType->logo}}" class="img" width="32" height="32" /></td>
                            <td>{{$packetType->title}}</td>
                            <td>{{$packetType->color}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle" aria-expanded="false">Aksi</a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 27px, 0px);">
                                        <a href="#" class="dropdown-item has-icon">
                                            <span class="iconify mr-3" data-icon="mdi:square-edit-outline" data-inline="false" data-width="15" data-height="15"></span>Edit
                                        </a>
                                        <a href="#" wire:click.prevent="deletePacketType({{$packetType->id}})" class="dropdown-item has-icon text-danger">
                                            <span class="iconify mr-3" data-icon="mdi:trash-can-outline" data-inline="false" data-width="15" data-height="15"></span>Hapus
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-pagination px-4 mb-4 mt-2">
                {{ $packetTypes->links() }}
            </div>
        </div>
    </div>
</div>