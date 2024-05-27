<dialog id="modal_novisible_productos" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="text-center">
            <p class="text-lg font-bold">Deshabilitar menu</p>
        </div>
        <div class="flex justify-center">
            <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75ZM12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="#1a37f0"/>
            </svg>
        </div>

       
        <p class="text-base">El menú <b>no</b> será visible para los comensales. ¿Desea continuar?</p>

        <form method="POST" action="{{ route('setMenuInvisible') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf
            <input type="hidden" name="dining_id" value="{{ $diningRoom->id }}" autocomplete="off">
            <br>
            <div class="space-y-2">
                <button class="btn text-white w-full uppercase bg-green-600 hover:bg-green-700" type="submit">Habilitar</button>
            </div>
        </form>
    </div>
</dialog>
