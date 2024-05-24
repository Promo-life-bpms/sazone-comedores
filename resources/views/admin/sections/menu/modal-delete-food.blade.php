<dialog id="modal_delete_food" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="text-center">
            <p class="text-lg font-bold">Limpiar platillos</p>
        </div>
        <div class="flex justify-center">
            <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="24" height="24" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11 13C11 13.5523 11.4477 14 12 14C12.5523 14 13 13.5523 13 13V10C13 9.44772 12.5523 9 12 9C11.4477 9 11 9.44772 11 10V13ZM13 15.9888C13 15.4365 12.5523 14.9888 12 14.9888C11.4477 14.9888 11 15.4365 11 15.9888V16C11 16.5523 11.4477 17 12 17C12.5523 17 13 16.5523 13 16V15.9888ZM9.37735 4.66136C10.5204 2.60393 13.4793 2.60393 14.6223 4.66136L21.2233 16.5431C22.3341 18.5427 20.8882 21 18.6008 21H5.39885C3.11139 21 1.66549 18.5427 2.77637 16.5431L9.37735 4.66136Z" fill="#ebba34"/>
            </svg>
        </div>

        <p class="text-lg">Advertencia, todos los platillos de este comedor serán eliminados, ¿Desea continuar?</p>
        <p class="text-xs text-stone-700 mt-20">Nota: Los productos pueden ser cargados nuevamente posterior a este proceso</p>

        <form method="POST" action="{{ route('resetMenu') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf
            <input type="hidden" name="dining_id" value="{{ $diningRoom->id }}" autocomplete="off">
            <br>
            <div class="space-y-2">
                <button class="btn text-white w-full uppercase bg-red-500 hover:bg-red-600" type="submit">Eliminar platillos</button>
            </div>
        </form>
    </div>
</dialog>
