<div>
    <div class="row">
        <div class="col-md-9">
            <x-admin.card title="Datos del dispositivo">
                @include('livewire.back.device.form')
            </x-admin.card>
        </div>
        <div class="col-md-3">
            <x-admin.card title="Opciones">
                <x-admin.save-btn event="save_device" updatedtext="{{ $device->updated_at->format('d/m/y H:i:s') }}" newLine=true />
                <hr>
                 <a href="{{ route('qrgenerator', $device->id) }}" target="_blank">
                    {!! $qr !!}
                </a> 
                <hr>
                <x-admin.delete-btn 
                    :key="$device->id"
                    event="delete_device"  
                    text="Desea eliminar el dispositivo inventario: {{ $device->inventario }}"
                />
            </x-admin.card>
        </div>
    </div>        
</div>
