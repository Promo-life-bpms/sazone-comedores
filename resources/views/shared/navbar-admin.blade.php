<div class="navbar bg-base-100 shadow-lg">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl" href="{{ route('home') }}">Ford</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1 py-0 gap-x-3">
            <li>
                <a class="flex flex-col p-0" href="{{ route('acerca') }}">
                    <div class="rounded-full w-10 h-10 object-cover bg-[#F6F6F6] flex justify-center items-center">
                        I
                    </div>
                    <p class="text-xs font-semibold">
                        Acerca de
                    </p>
                </a>
            </li>
            <li>
                <a class="flex flex-col p-0" href="{{ route('menu') }}">
                    <div class="rounded-full w-10 h-10 object-cover bg-[#F6F6F6] flex justify-center items-center">
                        M
                    </div>
                    <p class="text-xs font-semibold">
                        Menú
                    </p>
                </a>
            </li>
            <li>
                <a class="flex flex-col p-0" href="{{ route('cupones') }}">
                    <div class="rounded-full w-10 h-10 object-cover bg-[#F6F6F6] flex justify-center items-center">
                        C
                    </div>
                    <p class="text-xs font-semibold">
                        Cupones
                    </p>
                </a>
            </li>
            <li>
                <a class="flex flex-col p-0" href="{{ route('mi-cuenta') }}">
                    <img alt="logo" class="rounded-full border w-10 h-10 object-cover"
                        src="https://media.istockphoto.com/id/636379014/es/foto/manos-la-formaci%C3%B3n-de-una-forma-de-coraz%C3%B3n-con-silueta-al-atardecer.jpg?s=612x612&w=0&k=20&c=R2BE-RgICBnTUjmxB8K9U0wTkNoCKZRi-Jjge8o_OgE=" />
                    <p class="text-xs font-semibold">
                        Mi Cuenta
                    </p>
                </a>
            </li>
        </ul>
    </div>
</div>
