<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task_App</title>
    {{-- blade formatted disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md ring-1 ring-slate-700/10 py-1 px-4 text-center font-medium shadow-sm text-slate-700 hover:bg-slate-50
        }
        .link {
             @apply font-medium text-gray-700 underline decoration-pink-500
        }
        label{
            @apply block uppercase text-slate-700 mb-2
        }
        input, textarea{
            @apply appearance-none shadow-sm border w-full py-2 px-3 text-slate-700 focus:outline-none;
        }
        .error_msg{
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade formatted enable --}}
    @yield('styles')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="mb-4 text-2xl">@yield('title')</h1>

    <div x-data ="{flash: true}">
        <div x-show="flash">
            @if(session()->has('success'))
            {{-- <div> {{session('success')}} </div> --}}

                <div class="relative border rounded border-green-400 bg-green-100 mb-10 px-4 py-3 text-green-700 text-lg" role="alert">
                    <strong >Success</strong>
                    <div>{{session('success')}}</div>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/200svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" @click="flash = false"
                        stroke="currentColor" class="h-6 w-6 cursor-pointer">
                            <path stroke-linecap="round"    stroke-linejoin="round" d="M6 18L18 6M6    6l12 12" />
                        </svg>
                    </span>
                </div>
            @endif
        </div>
    </div>

    <div>@yield('content')</div>
</body>

</html>
