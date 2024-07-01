<div  class="modal show"  style="padding-right: 15px; display: {{$show}}; background: rgba(0,0,0,0.4)"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">
                    <i class="fas fa-trash-alt mr-2"></i> Konfirmasi penghapusan data
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="$set('show', 'hidden')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus data Order<span style="font-weight: 600"> </span>
            </div>
            <div class="modal-footer">
                <x-adminlte-button label="Batal" theme="primary" wire:click="$set('show', 'hidden')"/>
                <button type="button" class="btn btn-default bg-danger" data-dismiss="modal" wire:click="destroy('{{$order_id}}')">
                    Hapus 
                </button>
            </div>
        </div>
    </div>
</div>
