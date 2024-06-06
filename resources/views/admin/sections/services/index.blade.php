@include('admin.sections.services.modal-create')
<div class="space-y-2">Horarios de servicio
    <div class="flex justify-end gap-3">
        @if (Auth::user()->hasRole(['master-admin']))
            <button class="btn text-white" style="background-color: rgb(48, 79, 157)"
                onclick="modal_services_create.showModal()">Agregar Horario de servicio</button>
        @endif
    </div>

    <div class="overflow-x-auto">
        @if($allService != null || $allService != [])
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:8%">#</th>
                        <th>imagen</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($allService as $service)
                        
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>
                                <img style="width: 100px; height:100px;" src="{{  asset('storage/'.$service->img)}}" alt="">

                            <td>
                                <div class="flex justify-end gap-3">

                                    @if (Auth::user()->hasRole(['master-admin']))
                                       
                                        <button class="btn btn-circle btn-ghost btn-xs"
                                            onclick="deleteService({{ $service->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    @endif
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        @else
            <p>Sin registros</p>
        @endif
    </div>
</div>


<script>

    function deleteService(id) {
        Swal.fire({
            title: "¿Estas seguro de que quieres eliminar el anuncio?",
            text: "ya no se podra recuperar el anuncio",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
                elminarService(id)
            }
        });
    }

    async function elminarService(id) {
        let url = "{{ route('deleteService') }}";
        await axios.post(url, {
            id: id
        }).then((response) => {
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Eliminado!",
                    text: "Se ha eliminiado correctamente el anuncio",
                    icon: "success"
                });
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        }).catch((error) => {
            console.error(error);
            Swal.fire({
                title: "Error!",
                text: "No se ha podido eliminar el anuncio",
                icon: "error"
            });
        });
    }
</script>
