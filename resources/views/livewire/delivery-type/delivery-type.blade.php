@section('title')
Jenis Pengiriman
@stop

@section('content:header')
Jenis Pengiriman
@stop

@section('content:breadcrumb')
<div class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
<div class="breadcrumb-item">Jenis Pengiriman</div>
@stop

@section('modal')
<livewire:delivery-type.form-modal />
@stop

{{-- content:body section --}}
<div class="card">

    <div class="card-header">
        <div class="spinner-border spinner-border-sm mr-3" wire:loading role="status">
            <span class="sr-only">Loading...</span>
        </div>

        <h4>Data</h4>

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
            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#formModal" aria-expanded="false">
                <span class="iconify mr-2" data-icon="mdi:text-box-plus-outline" data-inline="false" data-width="15" data-height="15"></span>
                Tambah
            </a>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="20">#</th>
                        <th width="50">Ikon</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tag</th>
                        <th width="100"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($deliveryTypes as $deliveryType)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{!! $deliveryType->icon_tag !!}</td>
                        <td>{{$deliveryType->title}}</td>
                        <td>{{$deliveryType->desc}}</td>
                        <td>
                            <span class="badge badge-primary">{{$deliveryType->tag}}</span>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle" aria-expanded="false" data-boundary="viewport">Aksi</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" wire:click.prevent="edit({{$deliveryType->id}})" class="dropdown-item has-icon">
                                        <span class="iconify mr-3" data-icon="mdi:square-edit-outline" data-inline="false" data-width="15" data-height="15"></span>Edit
                                    </a>
                                    <a href="#" wire:click.prevent="destroy({{$deliveryType->id}})" class="dropdown-item has-icon text-danger">
                                        <span class="iconify mr-3" data-icon="mdi:trash-can-outline" data-inline="false" data-width="15" data-height="15"></span>Hapus
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Tidak ada data.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="table-pagination px-4 mb-4 mt-2">
            {{ $deliveryTypes->links() }}
        </div>
    </div>

</div>