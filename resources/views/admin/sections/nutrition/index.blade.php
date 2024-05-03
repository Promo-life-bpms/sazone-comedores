@include('admin.sections.nutrition.modal-edit')
@include('admin.sections.nutrition.modal-create')
<div class="space-y-2">Nutricion
    <div class="flex justify-end gap-3">
        <button class="btn text-white" style="background-color: rgb(48, 79, 157)"
            onclick="my_modal_nutricion.showModal()">Agregar Seccion de Nutricion</button>
    </div>
    @if (session('success_nutrition'))
        <div role="alert" class="alert alert-success" id="alert_nutrition">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success_nutrition') }}</span>
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
                @foreach ($nutritions as $nutrition)
                    @php
                        $vigencia = (object) json_decode($nutrition->vigencia);
                    @endphp
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $nutrition->title }}</td>
                        <td>{{ $nutrition->description }}</td>
                        <td>
                            <b>Inicio:</b> {{ $vigencia->start }}
                            <b>Final:</b> {{ $vigencia->end }}
                        </td>
                        <td>
                            <div class="flex justify-end gap-3">
                                <button class="btn btn-circle btn-ghost btn-xs"
                                    onclick="editarNutricion({{ $nutrition->id }})">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button class="btn btn-circle btn-ghost btn-xs"
                                    onclick="deleteNutricion({{ $nutrition->id }})">
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
    let nutritiones = @json($nutritions);
    document.addEventListener("DOMContentLoaded", function() {
        let showModalNutricion = {{ session('error_nutrition') ? 'my_modal_nutricion.showModal()' : 0 }}
        {{ session('error_edit_nutrition') ? 'editarNutricion(' . session('nutricion_id') . ')' : 0 }}
        const alertNutricion = document.getElementById('alert_nutrition');
        if (alertNutricion) {
            setTimeout(() => {
                alertNutricion.style.display = 'none';
            }, 3000);
        }
    });

    function deleteNutricion(id) {
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
                elminarNutricion(id)
            }
        });
    }

    async function elminarNutricion(id) {
        let url = "{{ route('nutricion.deleteNutrition') }}";
        await axios.delete(url, {
            data: {
                nutricion_id: id
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
