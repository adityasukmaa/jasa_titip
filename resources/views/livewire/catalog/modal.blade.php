<div id="modal-dialog" class="zoom-anim-dialog display-none">
    <div class="small-dialog-header">
        <h3>{{$name}}</h3>
    </div>
    <div class="content">
        <h5>Quantity</h5>
        <div class="numbers-row">
            <div wire:click="inc" class="inc button_inc">+</div>
            <div wire:click="dec" class="dec button_inc">-</div>
        <input disabled type="number"  class="qty2 form-control" name="qty" wire:model="qty" style="background-color: rgba(0, 0, 0, 0)" >
        </div>
    </div>
    <div class="footer">
        <div class="row small-gutters">
            <div class="col-12">
                <button type="reset" class="close-btn btn_1 full-width">OK</button>
            </div>
        </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close"></button>
</div>