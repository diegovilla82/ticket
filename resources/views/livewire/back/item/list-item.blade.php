<x-admin.card title="Listado de Items">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th class="col">Nombre</th>
                <th>Fecha</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
            <tr>
                <td> {{ $item->nombre }} </td>
                <td> {{ $item->descripcion }} </td>
                <td> <a href="{{ route('admin.item.edit', $item->id) }}"> Editar</a> </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="callout callout-info">
                    <p>Todavia No hay items</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table> 
    <p>
        {{ $items->links() }}
    </p>
</x-admin.card>
