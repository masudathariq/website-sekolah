@props(['name'])

<svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    @switch($name)
        @case('map-pin')
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z" />
            @break

        @case('phone')
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.518 4.553a1 1 0 01-.217 1.086L8.4 11.4a11.042 11.042 0 005.2 5.2l1.576-1.576a1 1 0 011.086-.217l4.553 1.518a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C8.477 21 3 15.523 3 9V5z" />
            @break

        @case('instagram')
            <path d="M7.75 2A5.75 5.75 0 002 7.75v8.5A5.75 5.75 0 007.75 22h8.5A5.75 5.75 0 0022 16.25v-8.5A5.75 5.75 0 0016.25 2h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm4.5-.25a1.25 1.25 0 112.5 0 1.25 1.25 0 01-2.5 0z" />
            <circle cx="12" cy="12" r="3"/>
            @break

        @case('facebook')
            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879v-6.987h-2.54v-2.892h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.464h-1.26c-1.243 0-1.63.772-1.63 1.562v1.875h2.773l-.443 2.892h-2.33v6.987C18.343 21.128 22 16.991 22 12z"/>
            @break

        @case('mail')
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12l-4-4-4 4m8 0v6a2 2 0 01-2 2H8a2 2 0 01-2-2v-6" />
            @break

        @case('clock')
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" fill="none"/>
            @break
    @endswitch
</svg>
