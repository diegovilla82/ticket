<x-admin.card title="Listado de Dispositivos">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>Inventario</th>
                <th>Descripcion</th>
                <th>Tipo de dispositivo</th>
                <th>Area</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($devices as $device)
            <tr>
                <td> {{ $device->inventario }} </td>
                <td> {{ $device->descripcion }} </td>
                <td> {{ $device->deviceType->descripcion }} </td>
                <td> {{ $device->area->descripcion }} </td>
                <td> <a href="{{ route('admin.device.edit', $device->id) }}"> Editar</a> </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia No hay dispositivos</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table> 
    <p>
        {{ $devices->links() }}
    </p>
</x-admin.card>
