{{--<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">--}}
{{--    <div>--}}
{{--        {{ $logo }}--}}
{{--    </div>--}}

{{--    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">--}}
{{--        {{ $slot }}--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="container-fluid">--}}
{{--    <div class="d-sm-flex justify-content-between align-items-center mb-4">--}}
{{--        <h3 class="text-dark mb-0"></h3></div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12 col">--}}
{{--            <div class="card shadow border-left-primary py-2">--}}
{{--                <div class="card-body">--}}
{{--                    <!-- <div class="row align-items-center no-gutters"> -->--}}
{{--                    <div class="col">--}}

{{--                            {{ $slot }}--}}

{{--                        <div style="text-align: center; margin-top: 30px; background-color: blue; color: white;"><h1 style="font-size: 45px;"></h1></div>--}}
{{--                    </div>--}}
{{--                    <!-- </div> -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                @if(!Route::is('register') )
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">CONNEXION</h4>
                                    </div>
                                @elseif(!Route::is('login') )
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">INSCRIPTION</h4>
                                    </div>
                                @endif

                                {{$slot}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
