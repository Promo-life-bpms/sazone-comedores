<dialog id="modal_services_create" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Agregar Seccion Saludable</h3>
        <br>
        <form method="POST" action="{{ route('storeService') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf

            <input type="hidden" name="id" value="{{ $diningRoom->id }}">
            <label for="src" class="block text-sm font-medium text-gray-700">Selecciona una imagen:</label>
            
            <input name="src" type="file" accept="image/*" required>
          
            <br>
            <label for="src" class="block text-sm font-medium text-gray-700">Coloca la url del cuestionario:</label>

            <input type="text" name="url" id="">
            <div class="space-y-2">
                <button class="btn text-white w-full uppercase" style="background-color: rgb(48, 79, 157)" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
