<div class="navbar bg-base-100 shadow-lg">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl" href="{{ route('home') }}">Sazone</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1 py-0 gap-x-3">
            @if (Auth::user()->hasRole(['master-admin']))
            <li>
                <a class="flex flex-col p-0 pr-2" href="{{ route('dining.admins') }}">
                    <img alt="logo" class="rounded-full border w-10 h-10 object-cover"
                        src="{{ asset('assets/users.png') }}" />
                    <p class="text-xs font-semibold">
                        Administradores
                    </p>
                </a>
            </li>
            @endif
            <li>
                <a class="flex flex-col p-0 pl-4" href="{{ route('mi-cuenta') }}">
                    <img alt="logo" class="rounded-full border w-10 h-10 object-cover"
                        src="{{ asset('assets/user.png') }}" />
                    <p class="text-xs font-semibold">
                        Mi Cuenta
                    </p>
                </a>
            </li>
            
        </ul>
    </div>
</div>
