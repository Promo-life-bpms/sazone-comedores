<dialog id="modal_import_food" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Agregar Archivo</h3>
        @if (session('success_import_create'))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success_user_create') }}</span>
            </div>
        @endif
        <form method="POST" action="{{ route('menu.import') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf
            <input type="hidden" name="dining_id" value="{{ $diningRoom->id }}" autocomplete="off">
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Archivo</label>
                <input type="file" name="file_food"
                    class="file-input file-input-primary file-input-bordered w-full @error('file_food') input-error @enderror" />
                @error('file_food')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="space-y-2">
                <button class="btn btn-primary w-full uppercase" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
