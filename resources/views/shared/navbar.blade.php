<div class="navbar bg-base-100 shadow-lg">
    <div class="flex-1">
        <a class="btn btn-ghost" href="{{ route('home') }}">
            <img class="max-h-11" class="rounded-full border w-10 h-10 object-cover"
                src="{{ asset('assets/SazoneLogo.png') }}" alt=""></a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1 py-0 gap-x-3">
            @if (Auth::user()->hasRole(['admin']))
                <li>
                    <a class="flex flex-col p-0"
                        href="{{ route('dining.show', ['diningRoom' => Auth::user()->profile->diningRoom->id]) }}">
                        <div class="rounded-full w-10 h-10 object-cover bg-[#F6F6F6] flex justify-center items-center">
                            <svg fill="#005A76" width="16px" height="16px" viewBox="0 0 1920 1920"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1556.611 1920c-54.084 0-108.168-20.692-149.333-61.857L740.095 1190.96c-198.162 41.712-406.725-19.269-550.475-163.019C14.449 852.771-35.256 582.788 65.796 356.27l32.406-72.696 390.194 390.193c24.414 24.305 64.266 24.305 88.68 0l110.687-110.686c11.824-11.934 18.283-27.59 18.283-44.34 0-16.751-6.46-32.516-18.283-44.34L297.569 84.207 370.265 51.8C596.893-49.252 866.875.453 1041.937 175.515c155.026 155.136 212.833 385.157 151.851 594.815l650.651 650.651c39.961 39.852 61.967 92.95 61.967 149.443 0 56.383-22.006 109.482-61.967 149.334l-138.275 138.385c-41.275 41.165-95.36 61.857-149.553 61.857Z"
                                    fill-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-xs font-semibold">
                            Mi comedor
                        </p>
                    </a>
                </li>
            @endif
            <li>
                <a class="flex flex-col p-0 " href="{{ route('nutricion-vida') }}">
                    <div class="rounded-full w-10 h-10 object-cover bg-[#F6F6F6] flex justify-center items-center">
                        <svg width="20" height="20" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001"
                            xml:space="preserve">
                            <g>
                                <g>
                                    <rect x="106.017" y="159.533" width="179.701" height="33.391" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <rect x="106.017" y="79.772" width="179.701" height="33.391" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M486.118,253.418c-13.781-17.484-32.401-27.936-54.213-30.872c10.625-23.093,9.304-47.608,9.22-48.958l-0.909-14.727
   l-14.726-0.908c-1.054-0.068-16.187-0.886-33.746,3.788V0.001H0v512h285.722v-1.154c4.727,0.759,9.53,1.154,14.397,1.154
   c21.851,0,31.945-3.733,40.412-7.555c3.27-1.476,3.551-1.533,4.769-1.533c1.218,0,1.499,0.057,4.768,1.533
   c8.466,3.823,18.56,7.555,40.412,7.555c40.622,0,76.936-26.832,99.631-73.619c14.115-29.096,21.888-63.464,21.889-96.774
   C512.002,305.915,502.81,274.595,486.118,253.418z M379.176,205.117c7.175-7.174,17.907-10.802,27.3-12.518
   c-1.715,9.403-5.343,20.13-12.515,27.303c-3.926,3.926-8.918,6.783-14.17,8.852c-0.206,0.08-0.408,0.161-0.613,0.242
   c-4.169,1.588-8.485,2.689-12.548,3.43C368.226,223.376,371.699,212.596,379.176,205.117z M33.391,478.609V33.392h324.961v145.5
   c-0.945,0.84-1.878,1.705-2.786,2.613c-3.619,3.619-6.671,7.559-9.274,11.656c-1.715-4.414-3.287-8.155-4.523-10.98l-30.593,13.38
   c4.92,11.247,10.023,25.465,13.429,39.484c-8.019-4.154-17.363-8.259-27.582-10.5c-30.734-6.741-57.935-1.488-78.495,14.76
   H106.022v33.391h86.634c-6.423,13.46-10.746,29.175-12.751,46.377h-73.883v33.391h72.867c0.777,15.594,3.203,31.262,7.143,46.376
   h-80.01v33.391h91.621c0.919,2.073,1.863,4.127,2.845,6.15c7.648,15.766,16.848,29.256,27.233,40.228H33.391z M460.069,423.809
   c-9.928,20.466-32.171,54.801-69.589,54.801c-16.491,0-21.9-2.442-26.671-4.597c-4.432-2.001-9.948-4.491-18.51-4.491
   c-8.563,0-14.078,2.49-18.51,4.491c-4.773,2.155-10.18,4.597-26.672,4.597c-37.417,0-59.659-34.335-69.587-54.801
   c-24.753-51.029-24.675-118.192,0.175-149.72c13.334-16.916,33.242-22.611,59.165-16.926c10.592,2.322,20.701,8.093,29.62,13.184
   c9.7,5.537,17.361,9.909,25.809,9.909c8.447,0,16.109-4.373,25.808-9.909c8.921-5.091,19.031-10.862,29.62-13.184
   c25.927-5.687,45.832,0.009,59.165,16.926C484.744,305.616,484.822,372.78,460.069,423.809z" fill="#005A76" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <p class="text-xs font-semibold">
                        Vida Saludable
                    </p>
                </a>
            </li>
            <li>
                <a class="flex flex-col p-0" href="{{ route('acerca') }}">
                    <div class="rounded-full w-10 h-10 object-cover bg-[#F6F6F6] flex justify-center items-center">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 0.5C3.86 0.5 0.5 3.86 0.5 8C0.5 12.14 3.86 15.5 8 15.5C12.14 15.5 15.5 12.14 15.5 8C15.5 3.86 12.14 0.5 8 0.5ZM8.75 11.75H7.25V7.25H8.75V11.75ZM8.75 5.75H7.25V4.25H8.75V5.75Z"
                                fill="#005A76" />
                        </svg>
                    </div>
                    <p class="text-xs font-semibold">
                        Acerca de
                    </p>
                </a>
            </li>
            <li>
                <a class="flex flex-col p-0" href="{{ route('menu') }}">
                    <div class="rounded-full w-10 h-10 object-cover bg-[#F6F6F6] flex justify-center items-center">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.545 17.25H14.79C15.42 17.25 15.9375 16.7625 16.0125 16.1475L17.25 3.7875H13.5V0.75H12.0225V3.7875H8.295L8.52 5.5425C9.8025 5.895 11.0025 6.5325 11.7225 7.2375C12.8025 8.3025 13.545 9.405 13.545 11.205V17.25ZM0.75 16.5V15.75H12.0225V16.5C12.0225 16.905 11.685 17.25 11.25 17.25H1.5C1.0875 17.25 0.75 16.905 0.75 16.5ZM12.0225 11.25C12.0225 5.25 0.75 5.25 0.75 11.25H12.0225ZM0.75 12.75H12V14.25H0.75V12.75Z"
                                fill="#005A76" />
                        </svg>
                    </div>
                    <p class="text-xs font-semibold">
                        Menú
                    </p>
                </a>
            </li>
            <li>
                <a class="flex flex-col p-0" href="{{ route('cupones') }}">
                    <div class="rounded-full w-10 h-10 object-cover bg-[#F6F6F6] flex justify-center items-center">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.2328 6.37735L15.6814 4.8259C15.5562 4.70242 15.3893 4.63032 15.2136 4.62381C15.0379 4.6173 14.8661 4.67686 14.7322 4.79075C14.5253 4.96679 14.2599 5.05871 13.9885 5.04829C13.7171 5.03787 13.4596 4.92588 13.2668 4.7345C13.0756 4.5418 12.9636 4.28429 12.9532 4.01298C12.9428 3.74167 13.0347 3.47633 13.2106 3.26954C13.3245 3.13557 13.384 2.9638 13.3775 2.78809C13.371 2.61238 13.2989 2.44549 13.1754 2.32032L11.6226 0.767116C11.4914 0.636138 11.3135 0.562576 11.1281 0.562576C10.9427 0.562576 10.7649 0.636138 10.6336 0.767116L8.1604 3.24001C8.0077 3.39325 7.89255 3.57976 7.82395 3.78493C7.8106 3.82437 7.78833 3.86021 7.75888 3.88966C7.72943 3.91911 7.6936 3.94138 7.65415 3.95473C7.4489 4.02332 7.26236 4.13861 7.10923 4.29153L0.76704 10.6337C0.636062 10.7649 0.5625 10.9428 0.5625 11.1282C0.5625 11.3136 0.636062 11.4914 0.76704 11.6227L2.32024 13.1741C2.44541 13.2976 2.61231 13.3697 2.78802 13.3762C2.96373 13.3827 3.1355 13.3231 3.26946 13.2093C3.47579 13.0318 3.74156 12.9389 4.01351 12.9491C4.28547 12.9593 4.54352 13.0719 4.73596 13.2643C4.9284 13.4568 5.041 13.7148 5.05121 13.9868C5.06143 14.2587 4.96849 14.5245 4.79102 14.7308C4.67714 14.8648 4.61758 15.0366 4.62408 15.2123C4.63059 15.388 4.7027 15.5549 4.82618 15.68L6.37763 17.2315C6.50885 17.3625 6.68669 17.436 6.8721 17.436C7.05751 17.436 7.23534 17.3625 7.36657 17.2315L13.7088 10.8893C13.8616 10.7362 13.9769 10.5498 14.0456 10.3447C14.0589 10.3052 14.0811 10.2692 14.1107 10.2397C14.1402 10.2102 14.1761 10.1879 14.2157 10.1746C14.4208 10.106 14.6072 9.99081 14.7603 9.83813L17.2332 7.36489C17.3637 7.23367 17.4369 7.05611 17.4368 6.87105C17.4368 6.68598 17.3634 6.50847 17.2328 6.37735ZM9.20419 5.33497C9.15195 5.38721 9.08994 5.42866 9.02168 5.45693C8.95343 5.48521 8.88027 5.49976 8.80639 5.49976C8.73252 5.49976 8.65936 5.48521 8.59111 5.45693C8.52285 5.42866 8.46084 5.38721 8.4086 5.33497L8.00395 4.93032C7.90103 4.8243 7.84396 4.68204 7.84507 4.53428C7.84619 4.38652 7.90539 4.24514 8.0099 4.14068C8.1144 4.03622 8.25582 3.97708 8.40357 3.97603C8.55133 3.97498 8.69356 4.03212 8.79954 4.13508L9.20419 4.53938C9.25643 4.59162 9.29788 4.65363 9.32616 4.72188C9.35443 4.79014 9.36899 4.86329 9.36899 4.93717C9.36899 5.01105 9.35443 5.08421 9.32616 5.15246C9.29788 5.22072 9.25643 5.28273 9.20419 5.33497ZM10.7511 6.88184C10.6456 6.98725 10.5026 7.04646 10.3534 7.04646C10.2043 7.04646 10.0613 6.98725 9.95583 6.88184L9.56911 6.49512C9.51687 6.44288 9.47543 6.38087 9.44716 6.31261C9.41889 6.24436 9.40434 6.17121 9.40434 6.09733C9.40434 6.02345 9.41889 5.9503 9.44716 5.88205C9.47543 5.81379 9.51687 5.75178 9.56911 5.69954C9.67461 5.59404 9.8177 5.53477 9.9669 5.53477C10.0408 5.53477 10.1139 5.54932 10.1822 5.57759C10.2504 5.60586 10.3125 5.6473 10.3647 5.69954L10.7514 6.08626C10.8038 6.13849 10.8454 6.20055 10.8738 6.26889C10.9022 6.33723 10.9169 6.4105 10.9169 6.4845C10.9169 6.55851 10.9024 6.63179 10.874 6.70016C10.8457 6.76852 10.8041 6.83062 10.7518 6.8829L10.7511 6.88184ZM12.2979 8.42872C12.2457 8.48096 12.1837 8.52241 12.1154 8.55068C12.0472 8.57896 11.974 8.59351 11.9001 8.59351C11.8263 8.59351 11.7531 8.57896 11.6849 8.55068C11.6166 8.52241 11.5546 8.48096 11.5024 8.42872L11.1156 8.042C11.0127 7.93598 10.9556 7.79372 10.9568 7.64596C10.9579 7.4982 11.0171 7.35682 11.1216 7.25236C11.2261 7.1479 11.3675 7.08876 11.5153 7.08771C11.663 7.08666 11.8052 7.1438 11.9112 7.24676L12.2979 7.63348C12.3505 7.68563 12.3923 7.74764 12.4208 7.81596C12.4494 7.88428 12.4642 7.95757 12.4643 8.03161C12.4645 8.10566 12.45 8.17901 12.4218 8.24746C12.3935 8.3159 12.352 8.3781 12.2997 8.43047L12.2979 8.42872ZM13.8599 9.99458C13.8077 10.0468 13.7457 10.0883 13.6774 10.1165C13.6092 10.1448 13.536 10.1594 13.4621 10.1594C13.3883 10.1594 13.3151 10.1448 13.2468 10.1165C13.1786 10.0883 13.1166 10.0468 13.0643 9.99458L12.6622 9.59028C12.6088 9.5382 12.5664 9.47603 12.5373 9.4074C12.5081 9.33877 12.493 9.26503 12.4926 9.19048C12.4923 9.11593 12.5067 9.04205 12.5352 8.97314C12.5636 8.90423 12.6055 8.84167 12.6583 8.78908C12.7112 8.73649 12.7739 8.69493 12.843 8.66682C12.912 8.63871 12.986 8.6246 13.0605 8.62532C13.1351 8.62604 13.2087 8.64157 13.2772 8.67101C13.3457 8.70045 13.4077 8.74321 13.4595 8.7968L13.862 9.20075C13.9143 9.253 13.9557 9.31504 13.9839 9.3833C14.0122 9.45157 14.0267 9.52473 14.0267 9.59861C14.0266 9.67249 14.012 9.74564 13.9837 9.81388C13.9554 9.88212 13.914 9.94412 13.8617 9.99633L13.8599 9.99458Z"
                                fill="#005A76" />
                        </svg>
                    </div>
                    <p class="text-xs font-semibold">
                        Cupones
                    </p>
                </a>
            </li>
            <li>
                <a class="flex flex-col p-0" href="{{ route('mi-cuenta') }}">
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
