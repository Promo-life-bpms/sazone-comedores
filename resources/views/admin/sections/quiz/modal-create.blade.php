<dialog id="modal_quiz_create" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Agregar Seccion Saludable</h3>
        <br>
        <form method="POST" action="{{ route('storeQuiz') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf

            <input type="hidden" name="dining_room_id" value="{{ $diningRoom->id }}">
            <label for="src" class="block text-sm font-medium text-gray-700">Selecciona una imagen <span style="color: red;">*</span>:   
                
            </label>
            
            <input type="file" name="file" class="file-input bg-custom-blue file-input-bordered w-full" accept="image/*" required>

            <br>
    
            <label for="url" class="block text-sm font-medium text-gray-700">Coloca la url del cuestionario <span style="color: red;">*</span>:</label>

       
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="url" type="text" placeholder="url" name="url">
            <br>
            <br>
            <div class="space-y-2">
                <button class="btn text-white w-full uppercase" style="background-color: rgb(48, 79, 157)" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
