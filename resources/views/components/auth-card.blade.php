<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0   ">
    <div>
        <div class="logo-dashboard">
            <b class="font-black"> 
                {{ $logo }}
            </b>
        </div>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden">
        {{ $slot }}
    </div>
</div>
