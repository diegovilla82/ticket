<x-admin.card title="Servicios para este dispositivo">
    <x-front.modal key="AddItem" classes="btn-primary btn-sm float-right" title="Agregar servicio">
        <livewire:back.service.new-service :deviceIdModal='request()->id'>
    </x-front>
    <br>
    <br>

    @if($device->services)
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Problema</th>
                <th>Dispositivo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($device->services as $service)
            <tr>
                <td> {{ $service->estado->descripcion }} </td>
                <td> {{ $service->problema }} </td>
                <td> <a href="{{ route('admin.service.edit', $service->id) }}"> Editar</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    @else
    <tr>
        <td colspan="4">
            <div class="callout callout-info">
            <p>Todavia no hay servicios</p>
            </div>
        </td>
    </tr>
    @endif
</x-admin.card>
