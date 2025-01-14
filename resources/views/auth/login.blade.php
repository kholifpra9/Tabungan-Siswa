<html>
<head>
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,maximum-scale=1"
    />
    <style>
      body {
        font-family: "Inter", sans-serif;
      }
    </style>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"
      defer
    ></script>
</head>

<body class="bg-gray-100 text-gray-900 flex justify-center">
    <div
      class="h-80 m-0  bg-white shadow sm:rounded-lg flex justify-center flex-1"
    >
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div>
                <center>
                    <a href="/">
                        <x-application-logo class="w-24 h-24 fill-current text-gray-500" />
                    </a>
                </center>
            </div>
            <div class="mt-4 flex flex-col items-center">
                <div class="w-full flex-1 mt-1">
                    <div class="mx-auto max-w-xs">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="username" :value="__('Username')" />
                                <x-text-input id="username" class="block mt-1 w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="password" name="password" required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            

                            <!-- Button -->
                            <div class="flex items-center justify-end mt-6">

                                <button
                                  class="ms-3 mt-5 tracking-wide font-semibold bg-green-500 text-gray-100 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
                                >
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </form>
                        <!-- End Form -->

                        <!-- Terms and Policy -->
                        <p class="mt-6 text-xs text-gray-600 text-center">
                            I agree to abide by the application's
                            <a href="#" class="border-b border-gray-500 border-dotted">
                                Terms of Service
                            </a>
                            and its
                            <a href="#" class="border-b border-gray-500 border-dotted">
                                Privacy Policy
                            </a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-indigo-100 text-center hidden lg:flex items-center justify-center">
            <img 
                src="http://127.0.0.1:8000/images/sekolah.jpg" 
                alt="Gambar Sekolah" 
                class="w-full h-full object-cover"
            />
        </div>
    </div>
</body>
</html>
