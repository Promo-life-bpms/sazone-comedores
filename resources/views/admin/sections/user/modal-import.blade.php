<dialog id="modal_import_user" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Importar Archivo de Usuarios</h3>
        @if (session('error_user_import'))
            <div role="alert" class="alert alert-error" id="alert_advertisment">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error_user_import') }}</span>
            </div>
        @endif
        <form method="POST" action="{{ route('users.import') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf
            <input type="hidden" name="dining_id" value="{{ $diningRoom->id }}" autocomplete="off">
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Archivo</label>
                <input type="file" name="file_users"
                    class="file-input bg-custom-blue file-input-bordered w-full @error('file_users') input-error @enderror" />
                @error('file_users')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="space-y-2">
                <button class="btn text-white w-full uppercase" style="background-color: rgb(48, 79, 157)" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
