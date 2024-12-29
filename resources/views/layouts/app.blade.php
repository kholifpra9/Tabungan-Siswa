<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    @hasrole('admin|kepala sekolah')
    <body class="font-sans antialiased">
    <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <div class="fixed w-64 bg-white h-full">
            <!-- Isi sidebar -->
            @include('layouts.navigation')
        </div>

    <!-- Main Content -->
    <div class="flex-1 ml-64 p-4">
        <!-- Header -->
        <header class="bg-white dark:bg-gray-800 shadow mb-4 p-4 rounded">
            <div class="max-w-full">
                <!-- Isi Header -->
                @isset($header)
                    <header >
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}   
                        </div>
                    </header>
                @endisset
            </div>
        </header>

        <!-- Main Area -->
        <main class="bg-white dark:bg-gray-800 shadow p-4 rounded min-h-screen">
            {{ $slot }}
        </main>
    </div>
    </div>
    
    </body>
    @else
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        
    </body>
    @endhasrole
</html>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
        });

        if (typeof Toast !== 'undefined') {
            var type = "{{ Session::get('alert-type') }}";
            switch (type) {
                case 'info':
                    Toast.fire({
                        icon: 'info',
                        title: "{{ Session::get('message') }}"
                    });
                    break;
                case 'success':
                    Toast.fire({
                        icon: 'success',
                        title: "{{ Session::get('message') }}"
                    });
                    break;
                case 'warning':
                    Toast.fire({
                        icon: 'warning',
                        title: "{{ Session::get('message') }}"
                    });
                    break;
                case 'error':
                    Toast.fire({
                        icon: 'error',
                        title: "{{ Session::get('message') }}"
                    });
                    break;
                case 'dialog_error':
                    Swal.fire({
                        icon: 'error',
                        title: "Ooops",
                        text: "{{ Session::get('message') }}",
                        timer: 3000
                    });
                    break;
            }
        }

        var errors = <?php echo json_encode($errors->all()); ?>;

        if (errors && errors.length > 0) {
            var errorList = errors.map(function(error) {
                return "<li>" + error + "</li>";
            }).join("");
            Swal.fire({
                type: 'error',
                title: "Ooops",
                html: "<ul>" + errorList + "</ul>",
            });
        }
    </script>