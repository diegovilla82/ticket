<div class="row">
    <x-admin.input title="Inventario" model="device.inventario" required=true tabindex=1 classes="col-md-6"/>
    <x-admin.input title="Descripcion" model="device.descripcion" required=true tabindex=2 classes="col-md-6"/>
</div>
<div class="row">
    <x-admin.input type="date" title="Fecha de compra" model="device.fecha_compra" required=true tabindex=3 classes="col-md-6"/>
    <x-admin.select 
        model="deviceTypeSelected" 
        title="Tipo de dispositivo:" 
        :values="$devicesTypes" 
        classes="col-md-6" 
        tabindex=4
    />
</div>
<div class="row">
    <x-admin.select 
        model="areaSelected" 
        title="Area:" 
        :values="$areas" 
        classes="col-md-6" 
        tabindex=5
    />

    @if(in_array($deviceTypeSelected, ['3']))
        <x-admin.input title="Inventario" model="device.cantidad" required=true tabindex=1 classes="col-md-6"/>
    @endif
</div>