<div class="modal show" style="padding-right: 15px; display: {{ $show }}; background: rgba(0,0,0,0.4)"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">
                    <i class="fas fa-pencil-alt mr-2"></i> Proses Pesanan
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    wire:click="$set('show', 'hidden')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <x-adminlte-select name="kurir_id" wire:model="kurir_id" label="Kurir"  >
                    <option>Pilih Kurir</option>
                    @foreach ($kurirs as $kurir)
                        <option value="{{$kurir->id}}">{{$kurir->full_name}}</option>
                    @endforeach
                </x-adminlte-select>
                <div class="form-group">
                    <a href={{"https://wa.me/$courir_wa?text=$kurirMsg"}} target="_blank">
                        @if ($kurir_id == null)
                            <x-adminlte-button disabled wire:click="sendMsg" label="Kirim Pesan Ke Kurir" theme="success" class="btn-block" icon="fab fa-whatsapp"/>
                        @else
                            <x-adminlte-button  wire:click="sendMsg" label="Kirim Pesan Ke Kurir" theme="success" class="btn-block" icon="fab fa-whatsapp"/>
                        @endif
                    </a>
                </div>
                <div class="form-group">
                    <a href={{"https://wa.me/$toko_wa?text=$tokoMsg"}} target="_blank">
                        @if ($counter >= 1)
                            <x-adminlte-button  wire:click="sendMsg" label="Kirim Pesan Ke Toko" theme="success" class="btn-block" icon="fab fa-whatsapp"/>
                        @else
                            <x-adminlte-button  disabled wire:click="sendMsg" label="Kirim Pesan Ke Toko" theme="success" class="btn-block" icon="fab fa-whatsapp"/>
                        @endif
                    </a>
                </div>
                <div class="form-group">
                    
                    <a href={{"https://wa.me/$customer_wa?text=$customerMsg"}} target="_blank">
                        @if ($counter >= 2)
                            <x-adminlte-button  wire:click="sendMsg" label="Kirim Pesan Ke Customer" theme="success" class="btn-block" icon="fab fa-whatsapp"/>
                        @else
                            <x-adminlte-button disabled wire:click="sendMsg" label="Kirim Pesan Ke Customer" theme="success" class="btn-block" icon="fab fa-whatsapp"/>
                        @endif
                        
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <x-adminlte-button label="Batal" theme="primary" wire:click="$set('show', 'hidden')" />
                <button  {{$isChatDone ? '' : 'disabled'}} type="button" class="btn btn-default bg-warning" data-dismiss="modal"
                    wire:click="done()">
                    Selesai
                </button>
            </div>
        </div>
    </div>
</div>
