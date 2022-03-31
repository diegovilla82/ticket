<x-admin.card title="Listado de Items">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Problema</th>
                <th>Dispositivo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
            <tr>
                <td> {{ $service->estado->descripcion }} </td>
                <td> {{ $service->problema }} </td>
                <td> <a href="{{ route('admin.service.edit', $service->id) }}"> Editar</a> </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia no hay servicios</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table> 
    <p>
        {{ $services->links() }}
    </p>
</x-admin.card>
