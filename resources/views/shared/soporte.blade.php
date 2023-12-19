<div>
    <div class="z-50 fixed bottom-0 right-0 p-4 rounded-md">
        <div class="hidden transition-all" id="soporte" wire:ignore.self>
            <div class="flex flex-col justify-between bg-white shadow-2xl rounded-md"
                style="max-height: 90vh; width: 350px; height: 600px">
                <div class="bg-primary h-16 pt-2 text-white flex justify-between items-center shadow-md p-2 rounded-md"
                    style="width: 350px">
                    <div class="my-3 text-green-100 font-bold text-lg tracking-wide">Soporte </div>
                    <div onclick="hideChat()" class="hover:cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                    </div>
                </div>
                <div class="overflow-y-auto h-full p-3" id="chatWithSeller">
                    @php
                        $messages = [];
                    @endphp
                    @if (count($messages) <= 0)
                        <p class="p-4 text-center">Da el primer paso.</p>
                    @endif
                    @foreach ($messages as $item)
                        @if ($item->receiver_id == auth()->user()->id)
                            <div class="w-full flex flex-col items-start pb-2">
                                <div class="bg-[#002A4C] text-white rounded-md px-2 py-1" style="max-width: 85%;">
                                    <p class="m-0 p-0 w-full break-words">
                                        {{ json_decode($item->message)->data }}
                                    </p>
                                </div>
                                <span class="text-xs w-full text-left">{{ $item->user->name }} -
                                    {{ $item->updated_at->format('H:i') }}</span>
                            </div>
                        @else
                            <div class="w-full flex flex-col items-end pb-2">
                                <div class="bg-gray-100 rounded-md px-2 py-1" style="max-width: 85%;">
                                    <p class="m-0 p-0 w-full break-words">
                                        {{ json_decode($item->message)->data }}
                                    </p>
                                </div>
                                <span class="text-xs w-full text-right">
                                    {{ $item->is_read ? 'Visto' : 'Enviado' }} -
                                    {{ $item->updated_at->format('H:i') }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="flex justify-between bg-white gap-2 px-2 pb-2 w-full">
                    {{--                     <button class="p-3" style="outline: none;" wire:click='sendMessage'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                        </svg>
                    </button> --}}
                    <textarea class="flex-grow py-2 px-4 rounded-sm border border-gray-300 bg-gray-100 h-auto resize-y overflow-y-auto"
                        rows="1" placeholder="Message..." style="outline: none;" wire:keydown.enter='sendMessage'
                        wire:model='message'>
                    </textarea>
                    <button class="p-3" style="outline: none;" wire:click='sendMessage'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="block transition-all" id="buttonSoporte" wire:ignore.self>
            <button onclick="showChat()"
                class="bg-primary text-white font-bold rounded-full shadow-lg w-14 h-14 flex items-center justify-center">
                <div>
                    <svg width="30" height="26" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.0002 0.25C7.2085 0.25 0.833496 5.35 0.833496 11.5833C0.833496 14.5583 2.25016 17.3917 4.80016 19.375C4.80016 20.225 4.2335 22.4917 0.833496 25.75C0.833496 25.75 5.79183 25.75 10.0418 22.2083C11.6002 22.6333 13.3002 22.9167 15.0002 22.9167C22.7918 22.9167 29.1668 17.8167 29.1668 11.5833C29.1668 5.35 22.7918 0.25 15.0002 0.25ZM16.4168 17.25H13.5835V14.4167H16.4168V17.25ZM18.9668 10.1667C18.5418 10.7333 17.9752 11.0167 17.4085 11.3C16.9835 11.5833 16.8418 11.725 16.7002 12.0083C16.4168 12.2917 16.4168 12.575 16.4168 13H13.5835C13.5835 12.2917 13.7252 11.8667 14.0085 11.4417C14.2918 11.1583 14.8585 10.7333 15.5668 10.3083C15.9918 10.1667 16.2752 9.88333 16.4168 9.6C16.5585 9.31667 16.7002 8.89167 16.7002 8.60833C16.7002 8.18333 16.5585 7.9 16.2752 7.61667C15.9918 7.33333 15.5668 7.19167 15.1418 7.19167C14.7168 7.19167 14.4335 7.33333 14.1502 7.475C13.8668 7.61667 13.7252 7.9 13.7252 8.325H10.8918C11.0335 7.33333 11.4585 6.48333 12.1668 5.91667C12.8752 5.35 13.8668 5.20833 15.1418 5.20833C16.4168 5.20833 17.5502 5.49167 18.2585 6.05833C18.9668 6.625 19.3918 7.475 19.3918 8.46667C19.5335 9.03333 19.3918 9.6 18.9668 10.1667Z"
                            fill="white" />
                    </svg>
                </div>
            </button>
        </div>
    </div>
    <script>
        function showChat() {
            const chatElement = document.querySelector("#soporte")
            const buttonElement = document.querySelector("#buttonSoporte")
            chatElement.classList.remove('hidden')
            chatElement.classList.add('block')
            buttonElement.classList.remove('block')
            buttonElement.classList.add('hidden')
        }

        function hideChat() {
            const chatElement = document.querySelector("#soporte");
            const buttonElement = document.querySelector("#buttonSoporte");
            chatElement.classList.remove('block');
            chatElement.classList.add('hidden');
            buttonElement.classList.remove('hidden');
            buttonElement.classList.add('block');
        }

        window.addEventListener('downScroll', () => {
            var chat = document.getElementById('chatWithSeller');
            chat.scrollTop = chat.scrollHeight;
        })

        document.addEventListener('DOMContentLoaded', () => {
            var chat = document.getElementById('chatWithSeller');
            chat.scrollTop = chat.scrollHeight;
            chat.addEventListener("scroll", function() {
                if (chat.scrollTop === 0) {
                    // @this.totalMensajes = @this.totalMensajes + 2;
                }
            });
        })
    </script>
</div>
