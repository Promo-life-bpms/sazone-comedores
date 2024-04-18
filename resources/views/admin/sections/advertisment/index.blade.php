@include('admin.sections.advertisment.modal-edit')
@include('admin.sections.advertisment.modal-create')
<div class="space-y-2">
    <div class="flex justify-end gap-3">
        <button class="btn text-white bg-pink-600 hover:bg-pink-800" onclick="my_modal_anuncio.showModal()">Agregar Anuncio</button>
        {{-- <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" /> --}}
    </div>
    @if (session('success_advertisment'))
        <div role="alert" class="alert alert-success" id="alert_advertisment">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success_advertisment') }}</span>
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Informacion</th>
                    <th>...</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($advertisements as $advertisement)
                    @php
                        $vigencia = (object) json_decode($advertisement->vigencia);
                    @endphp
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $advertisement->title }}</td>
                        <td>{{ $advertisement->description }}</td>
                        <td>
                            <b>Inicio:</b> {{ $vigencia->start }}
                            <b>Final:</b> {{ $vigencia->end }}
                        </td>
                        <td>
                            <div class="flex justify-end gap-3">
                                {{-- <button class="btn btn-circle btn-ghost btn-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button> --}}
                                <button class="btn btn-circle btn-ghost btn-xs"
                                    onclick="editarAnunucio({{ $advertisement->id }})">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button class="btn btn-circle btn-ghost btn-xs"
                                    onclick="deleteAnuncio({{ $advertisement->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script>
    let anuncios = @json($advertisements);
    document.addEventListener("DOMContentLoaded", function() {
        let showModalAdvertisment = {{ session('error_advertisment') ? 'my_modal_anuncio.showModal()' : 0 }}
        {{ session('error_edit_advertisment') ? 'editarAnunucio(' . session('anuncio_id') . ')' : 0 }}
        const alertAdvertisment = document.getElementById('alert_advertisment');
        if (alertAdvertisment) {
            setTimeout(() => {
                alertAdvertisment.style.display = 'none';
            }, 3000);
        }
    });

    function deleteAnuncio(id) {
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
                elminarAnuncio(id)
            }
        });
    }

    async function elminarAnuncio(id) {
        let url = "{{ route('anuncios.deleteAdvertisement') }}";
        await axios.delete(url, {
            data: {
                anuncio_id: id
            }
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
