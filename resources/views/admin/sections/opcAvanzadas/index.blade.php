@include('admin.sections.opcAvanzadas.modal-edit')
<div class="space-y-2">
    @if (session('success_opcAvanzadas'))
        <div role="alert" class="alert alert-success" id="alert_advertisment">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success_opcAvanzadas') }}</span>
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Mision</th>
                    <th>Vision</th>
                    <th>Valores</th>
                </tr>
            </thead>
            <tbody>
                @if ($diningRoom)
                    <tr>
                        <th>{{ $diningRoom->name }}</th>
                        <td>{{ $diningRoom->address }}</td>
                        <td>{{ $diningRoom->mission }}</td>
                        <td>{{ $diningRoom->vision }}</td>
                        <td>{{ $diningRoom->values }}</td>
                        </td>
                        <td>
                            <div class="flex justify-end gap-3">

                                @if (Auth::user()->hasRole(['master-admin']))
                                    <button class="btn btn-circle btn-ghost btn-xs"
                                        onclick="editarComedor({{ $diningRoom->id }})">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </button>
                                @endif

                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    let comedors = @json($diningRoom);
    document.addEventListener("DOMContentLoaded", function() {
        let showModalAdvertisment = {{ session('error_diningRoom') ? 'modal_edit_diningRoom.showModal()' : 0 }}
        {{ session('error_edit_diningRoom') ? 'editarComedor(' . session('dining_rooms_id') . ')' : 0 }}
        const alertOpctions = document.getElementById('dining_rooms_id');
        if (alertOpctions) {
            setTimeout(() => {
                alertOpctions.style.display = 'none';
            }, 3000);
        }
    });

    function editarComedor(id) {

        let comedor = comedors;

        modal_edit_diningRoom.showModal();
        
        document.getElementById('dining_rooms_id_edit').value = id;
        document.getElementById('name_edit').value = comedor.name;
        document.getElementById('address_edit').value = comedor.address;
        document.getElementById('mision_edit').value = comedor.mission;
        document.getElementById('vision_edit').value = comedor.vision;
        document.getElementById('valores_edit').value = comedor.values;
        document.getElementById('logo_edit').value = "storage/dining_room/" + comedor.logo;
        
    }
</script>

