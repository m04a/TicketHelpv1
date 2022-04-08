<x-guest-layout>

    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @if (session('error'))
            <x-error-alert class="mb-2">
                {{ session('error') }}
            </x-error-alert>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
                @if($oauthData['oauth_github'] == 1)
                <a href="{{ url('/auth/github/redirect') }}">
                <div
                    class="w-full hover:fill-gray-50 mb-3 text-center bg-transparent hover:bg-gray-700 text-gray-900 font-semibold hover:text-white py-3  border border-gray-600 hover:border-transparent transition ease-in-out duration-150">
                    <svg class="icon mr-1 0" xmlns="http://www.w3.org/2000/svg" width="32px" height="32px"
                        viewBox="0 0 32 32">
                        <path
                            d="M16 0.396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183 0.803 0.151 1.093-0.344 1.093-0.772 0-0.38-0.009-1.385-0.015-2.719-4.453 0.964-5.391-2.151-5.391-2.151-0.729-1.844-1.781-2.339-1.781-2.339-1.448-0.989 0.115-0.968 0.115-0.968 1.604 0.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328 0.14-1.031 0.557-1.74 1.011-2.135-3.552-0.401-7.287-1.776-7.287-7.907 0-1.751 0.62-3.177 1.645-4.297-0.177-0.401-0.719-2.031 0.141-4.235 0 0 1.339-0.427 4.4 1.641 1.281-0.355 2.641-0.532 4-0.541 1.36 0.009 2.719 0.187 4 0.541 3.043-2.068 4.381-1.641 4.381-1.641 0.859 2.204 0.317 3.833 0.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891 0.556 0.479 1.077 1.464 1.077 2.959 0 2.14-0.020 3.864-0.020 4.385 0 0.416 0.28 0.916 1.104 0.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z" />
                    </svg>
                    <span class="align-middle"> Iniciar sessió amb Github</span>
                </div>
            </a>
                @endif
                @if($oauthData['oauth_google'] == 1)
                <a href="{{ url('/auth/google/redirect') }}">
                <div
                    class="w-full hover:fill-red-100 mb-3 text-center bg-transparent hover:bg-red-700 text-red-900 font-semibold hover:text-white py-3  border border-red-600 hover:border-transparent transition ease-in-out duration-150">
                    <svg class="icon mr-1 0" xmlns="http://www.w3.org/2000/svg" viewBox="1 2 20 20">
                        <path
                            d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z" />
                    </svg>
                    <span class="align-middle"> Iniciar sessió amb Google</span>
                </div>
            </a>
                @endif
                @if($oauthData['oauth_discord'] == 1)
            <a href="{{ url('/auth/discord/redirect') }}">
                <div
                    class="w-full hover:fill-red-100 mb-3 text-center bg-transparent hover:bg-blue-700 text-blue-800 font-semibold hover:text-white py-3  border border-blue-700 hover:border-transparent transition ease-in-out duration-150">
                    <svg class="icon mr-1 0" viewBox="0 -28.5 256 256" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        preserveAspectRatio="xMidYMid">
                        <g>
                            <path
                                d="M216.856339,16.5966031 C200.285002,8.84328665 182.566144,3.2084988 164.041564,0 C161.766523,4.11318106 159.108624,9.64549908 157.276099,14.0464379 C137.583995,11.0849896 118.072967,11.0849896 98.7430163,14.0464379 C96.9108417,9.64549908 94.1925838,4.11318106 91.8971895,0 C73.3526068,3.2084988 55.6133949,8.86399117 39.0420583,16.6376612 C5.61752293,67.146514 -3.4433191,116.400813 1.08711069,164.955721 C23.2560196,181.510915 44.7403634,191.567697 65.8621325,198.148576 C71.0772151,190.971126 75.7283628,183.341335 79.7352139,175.300261 C72.104019,172.400575 64.7949724,168.822202 57.8887866,164.667963 C59.7209612,163.310589 61.5131304,161.891452 63.2445898,160.431257 C105.36741,180.133187 151.134928,180.133187 192.754523,160.431257 C194.506336,161.891452 196.298154,163.310589 198.110326,164.667963 C191.183787,168.842556 183.854737,172.420929 176.223542,175.320965 C180.230393,183.341335 184.861538,190.991831 190.096624,198.16893 C211.238746,191.588051 232.743023,181.531619 254.911949,164.955721 C260.227747,108.668201 245.831087,59.8662432 216.856339,16.5966031 Z M85.4738752,135.09489 C72.8290281,135.09489 62.4592217,123.290155 62.4592217,108.914901 C62.4592217,94.5396472 72.607595,82.7145587 85.4738752,82.7145587 C98.3405064,82.7145587 108.709962,94.5189427 108.488529,108.914901 C108.508531,123.290155 98.3405064,135.09489 85.4738752,135.09489 Z M170.525237,135.09489 C157.88039,135.09489 147.510584,123.290155 147.510584,108.914901 C147.510584,94.5396472 157.658606,82.7145587 170.525237,82.7145587 C183.391518,82.7145587 193.761324,94.5189427 193.539891,108.914901 C193.539891,123.290155 183.391518,135.09489 170.525237,135.09489 Z"
                                fill-rule="nonzero"></path>
                        </g>
                    </svg>
                    <span class="align-middle"> Iniciar sessió amb Discord</span>
                </div>
            </a>
                @endif
                @if($oauthData['oauth_instagram'] == 1)
                <a href="{{ url('/auth/instagram/redirect') }}">
                <div
                    class="w-full hover:fill-red-100 mb-3 text-center instagram text-purple-800 font-semibold hover:text-white py-3  border border-purple-700 hover:border-transparent transition ease-in-out duration-150">
                    <svg class="icon mr-1 0" viewBox="0 -20 325 325" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                        <path xmlns="http://www.w3.org/2000/svg" id="XMLID_505_"
                            d="M38.52,0.012h222.978C282.682,0.012,300,17.336,300,38.52v222.978c0,21.178-17.318,38.49-38.502,38.49   H38.52c-21.184,0-38.52-17.313-38.52-38.49V38.52C0,17.336,17.336,0.012,38.52,0.012z M218.546,33.329   c-7.438,0-13.505,6.091-13.505,13.525v32.314c0,7.437,6.067,13.514,13.505,13.514h33.903c7.426,0,13.506-6.077,13.506-13.514   V46.854c0-7.434-6.08-13.525-13.506-13.525H218.546z M266.084,126.868h-26.396c2.503,8.175,3.86,16.796,3.86,25.759   c0,49.882-41.766,90.34-93.266,90.34c-51.487,0-93.254-40.458-93.254-90.34c0-8.963,1.37-17.584,3.861-25.759H33.35v126.732   c0,6.563,5.359,11.902,11.916,11.902h208.907c6.563,0,11.911-5.339,11.911-11.902V126.868z M150.283,90.978   c-33.26,0-60.24,26.128-60.24,58.388c0,32.227,26.98,58.375,60.24,58.375c33.278,0,60.259-26.148,60.259-58.375   C210.542,117.105,183.561,90.978,150.283,90.978z" />
                    </svg>
                    <span class="align-middle"> Iniciar sessió amb Instagram</span>
                </div>
            </a>
                @endif
                @if($oauthData['oauth_facebook'] == 1)
                <a href="{{ url('/auth/facebook/redirect') }}">
                <div
                    class="w-full hover:fill-blue-100 mb-3 text-center bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white py-3  border border-blue-500 hover:border-transparent transition ease-in-out duration-150">
                    <svg class="icon mr-1 0" xmlns="http://www.w3.org/2000/svg" viewBox="1 2 20 20">
                        <path d="M27.56,0.684H2.383C1.065,0.684,0,1.748,0,3.064v23.813c0,1.312,1.065,2.379,2.383,2.379H27.56
                            c1.312,0,2.38-1.066,2.38-2.379V3.064C29.939,1.748,28.871,0.684,27.56,0.684z M20.125,9.167c-0.619-0.362-1.11-0.648-1.727-0.648
                            c-0.604,0-1.12,0.151-1.384,0.405c-0.264,0.252-0.395,0.74-0.395,1.461v1.067h3.229l-0.699,2.968h-2.53v9.862h-4.056V14.42H10.67
                            v-2.968h1.895v-1.133c0-1.193,0.143-1.907,0.425-2.496c0.281-0.587,0.826-1.241,1.584-1.611c0.757-0.369,1.877-0.555,3.036-0.555
                            c1.188,0,2.116,0.396,3.254,0.715L20.125,9.167z" />
                    </svg>
                    <span class="align-middle"> Iniciar sessió amb Facebook</span>
                </div>
            </a>
                @endif
                    @if($oauthData['oauth_vk'] == 1)
                    <a href="{{ url('/auth/vkontakte/redirect') }}">
                <div
                    class="w-full hover:fill-blue-100 mb-3 text-center bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white py-3  border border-blue-500 hover:border-transparent transition ease-in-out duration-150">
                    <svg class="icon mr-1 0" xmlns="http://www.w3.org/2000/svg" viewBox="1 2 20 20">
                        <path
                            d="M15.07294,2H8.9375C3.33331,2,2,3.33331,2,8.92706V15.0625C2,20.66663,3.32294,22,8.92706,22H15.0625C20.66669,22,22,20.67706,22,15.07288V8.9375C22,3.33331,20.67706,2,15.07294,2Zm3.07287,14.27081H16.6875c-.55206,0-.71875-.44793-1.70831-1.4375-.86463-.83331-1.22919-.9375-1.44794-.9375-.30206,0-.38544.08332-.38544.5v1.3125c0,.35419-.11456.5625-1.04162.5625a5.69214,5.69214,0,0,1-4.44794-2.66668A11.62611,11.62611,0,0,1,5.35419,8.77081c0-.21875.08331-.41668.5-.41668H7.3125c.375,0,.51044.16668.65625.55212.70831,2.08331,1.91669,3.89581,2.40625,3.89581.1875,0,.27081-.08331.27081-.55206V10.10413c-.0625-.97913-.58331-1.0625-.58331-1.41663a.36008.36008,0,0,1,.375-.33337h2.29169c.3125,0,.41662.15625.41662.53125v2.89587c0,.3125.13544.41663.22919.41663.1875,0,.33331-.10413.67706-.44788a11.99877,11.99877,0,0,0,1.79169-2.97919.62818.62818,0,0,1,.63544-.41668H17.9375c.4375,0,.53125.21875.4375.53125A18.20507,18.20507,0,0,1,16.41669,12.25c-.15625.23956-.21875.36456,0,.64581.14581.21875.65625.64582,1,1.05207a6.48553,6.48553,0,0,1,1.22912,1.70837C18.77081,16.0625,18.5625,16.27081,18.14581,16.27081Z" />
                    </svg>
                    <span class="align-middle"> Iniciar sessió amb VK</span>
                </div>
                 </a>
                    @endif

                    @if($oauthData['oauth_reddit'] == 1)
                <a href="{{ url('/auth/reddit/redirect')}}">
                    <div class="w-full hover:fill-blue-100 mb-3 text-center bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-white py-3  border border-blue-500 hover:border-transparent transition ease-in-out duration-150">
                        <svg class="icon mr-1 0" xmlns="http://www.w3.org/2000/svg" viewBox="1 2 20 20">
                            <path d="M18.8483 4.55211C18.2221 4.36107 17.5606 4.71376 17.3685 5.32769C17.2882 5.58406 17.0197 5.73121 16.7605 5.66093L13.8098 4.86109L12.83 7.86516C14.0578 8.10785 16.0928 8.63848 17.6592 9.47434C18.07 9.26593 18.6187 9.15468 19.1412 9.17238C19.8153 9.19521 20.6036 9.44079 21.0519 10.163C21.5802 11.014 21.5975 11.7944 21.3311 12.4277C21.1377 12.8874 20.8101 13.2342 20.4969 13.4652C20.6068 16.1526 17.9485 19.0764 12.6604 19.4719C10.8783 19.6052 8.47176 19.273 6.56405 18.2788C5.60559 17.7793 4.74908 17.1 4.17206 16.2037C3.63313 15.3665 3.35379 14.3635 3.4417 13.1954C3.13983 12.9309 2.81429 12.5286 2.63576 12.0319C2.39269 11.3556 2.43576 10.5315 3.10158 9.73335C3.74963 8.95647 4.99067 8.88704 6.07709 9.46181C6.47197 9.20553 7.02884 8.89229 7.66911 8.61597C8.47306 8.26901 9.44064 7.96621 10.4039 7.92614C10.6798 7.91467 10.9128 8.12903 10.9243 8.40493C10.9357 8.68084 10.7214 8.9138 10.4455 8.92528C9.64999 8.95836 8.80838 9.21344 8.06535 9.53411C7.32474 9.85374 6.71406 10.2246 6.38889 10.4591C6.2206 10.5805 5.99481 10.5854 5.82147 10.4713C4.90854 9.8704 4.12395 10.0689 3.86948 10.3739C3.4438 10.8842 3.44681 11.3319 3.57682 11.6936C3.72058 12.0936 4.03494 12.4154 4.24333 12.554C4.40105 12.6588 4.48598 12.8438 4.4627 13.0318C4.3307 14.0975 4.56065 14.9598 5.0129 15.6624C5.47062 16.3734 6.17442 16.9481 7.0262 17.392C8.73898 18.2846 10.9528 18.5968 12.5859 18.4747C17.8133 18.0837 19.7191 15.2133 19.4782 13.2692C19.453 13.0659 19.5544 12.8679 19.734 12.7693C19.9724 12.6386 20.2657 12.3812 20.4093 12.0399C20.5397 11.7299 20.5742 11.2894 20.2023 10.6904C19.998 10.3612 19.6011 10.1885 19.1073 10.1718C18.6016 10.1547 18.1554 10.309 17.9837 10.4453C17.823 10.5728 17.6006 10.5893 17.4229 10.4867C15.7164 9.5017 13.1664 8.91647 12.0996 8.75017C11.9547 8.72759 11.8271 8.6426 11.7504 8.51766C11.6738 8.39273 11.6558 8.24045 11.7012 8.10109L13.0065 4.0991C13.0891 3.84591 13.3556 3.70189 13.6127 3.77156L16.6102 4.58409C17.1081 3.72934 18.1496 3.29347 19.1401 3.59563C20.2889 3.94611 20.9415 5.15503 20.5826 6.3016C20.2247 7.44538 19.0007 8.07733 17.8544 7.72764C17.3504 7.57389 16.9414 7.25466 16.672 6.84788C16.5195 6.61764 16.5826 6.3074 16.8128 6.15493C17.043 6.00247 17.3533 6.06551 17.5058 6.29575C17.6505 6.51439 17.8706 6.68707 18.1462 6.77116C18.7764 6.96339 19.4374 6.61293 19.6283 6.00291C19.8183 5.39569 19.4758 4.74356 18.8483 4.55211Z"/>
                        </svg>
                        <span class="align-middle"> Iniciar sessió amb Reddit</span>
                    </div>
                </a>
                    @endif
                    @if($oauthData['oauth_gitlab'] == 1)
                    <a href="{{ url('/auth/gitlab/redirect')}}">
                    <div class="w-full hover:fill-red-100 mb-3 text-center bg-transparent hover:bg-orange-600 text-orange-500 font-semibold hover:text-white py-3  border border-orange-300 hover:border-transparent transition ease-in-out duration-150">
                        <svg class="icon mr-1 0" xmlns="http://www.w3.org/2000/svg" viewBox="1 2 20 20">
                            <path d="M14.381966,9 L17.1055728,3.5527864 C17.510563,2.74280594 18.6976082,2.84525834 18.9578263,3.71265211 L21.9578263,13.7126521 C22.0764694,14.1081293 21.9398565,14.5358621 21.6139406,14.7893522 L12.6139406,21.7893522 C12.2528301,22.0702159 11.7471699,22.0702159 11.3860594,21.7893522 L2.38605939,14.7893522 C2.06014352,14.5358621 1.92353056,14.1081293 2.04217371,13.7126521 L5.04217371,3.71265211 C5.30239185,2.84525834 6.48943696,2.74280594 6.89442719,3.5527864 L9.61803399,9 L14.381966,9 Z M17.7667436,6.7025808 L15.8944272,10.4472136 C15.7250352,10.7859976 15.3787721,11 15,11 L9,11 C8.62122794,11 8.27496482,10.7859976 8.10557281,10.4472136 L6.23325641,6.7025808 L4.15466686,13.6312126 L12,19.7331384 L19.8453331,13.6312126 L17.7667436,6.7025808 Z"/>
                        </svg>
                        <span class="align-middle"> Iniciar sessió amb GitLab</span>
                    </div>
                </a>
                    @endif
            <div>
                <x-label for="email" :value="__('Correu electrònic')" />

                <x-input id="email" class="block mt-4 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contrasenya')" />

                <x-input id="password" class="block mt-4 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __("Recorda'm") }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Recuperar contrasenya') }}
                    </a>
                @endif

                <x-button type="submit" class="ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    {{ __('Accedir') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
