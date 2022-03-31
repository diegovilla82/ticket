<x-admin.base title="Servicios para este dispositivo">
  <div class="row">
    <div class="col-md-12">
      <livewire:back.device.edit-device :device='request()->id'>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
      <livewire:back.device.list-services :device='request()->id'>
    </div>
</div>
</x-admin>