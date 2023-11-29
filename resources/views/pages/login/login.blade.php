@extends('_layouts.layout')
@section('content')
    <div class="w-full relative mx-auto bg-[#FCF6FF] h-screen">
        <img src="{{ asset('images/bg-top.svg') }}" class="w-full md:absolute z-0">
        <div class="container mx-auto md:h-screen w-full md:pt-[15%] lg:pt-[10%] block items-center">
            <div class="container relative flex flex-col items-center my-4">
                <form class="p-4 max-w-md mx-auto mt-10 rounded" method="post" action="{{ route('login') }}" id="login_form">
                    @csrf
                    <h1 class="uppercase font-bold text-6xl text-center text-[#EB5F5A]">Log In</h1>
                    <!-- input e-mail -->
                    <div class="relative flex items-center mt-10">
                        <input id="user_login" name="user_login" type="text" autocomplete="off"
                            class="peer {{ (session('errorMailorPhone') ? 'border-[#EB5F5A]' : '') }} relative h-10 w-full rounded-md bg-white border-2 border-[#A894D0] pl-10 pr-4 font-thin drop-shadow-sm transition-all duration-200 focus:border-[#A894D0] focus:drop-shadow-lg"
                            placeholder="Email/Phone" value="{{ old('user_login') }}"/>
                        <span
                            class="absolute left-2 transition-all duration-200 ease-in-out">
                            <img src="{{ asset('images/icon/user.svg') }}" alt="">
                        </span>
                    </div>
                    <span class="text-sm text-[#EB5F5A]" id="req_user_login"></span>
                    @if(session('errorMailorPhone'))
                        <span class="text-sm text-[#EB5F5A]">Email/Phone or Password incorrect</span>
                    @endif

                    <!-- input password -->
                    <div class="relative flex items-center mt-4">
                        <input
                            class="appearance-none h-10 w-full rounded-md pl-10 font-thin bg-white border-2 border-[#A894D0] focus:drop-shadow-lg js-password"
                            id="password" type="password" name="password" autocomplete="off" placeholder="Password"/>
                            <span
                            class="absolute left-2 transition-all duration-200 ease-in-out">
                            <img src="{{ asset('images/icon/lock.svg') }}" alt="">
                        </span>
                    </div>
                    {{-- <a href="#" class="flex justify-end my-2 text-[#757575] underline decoration-[#757575]">Forget Password?</a> --}}

                    <button type="button"
                        class="w-full bg-[#A894D0] text-white font-medium py-3 px-4 mt-10 rounded-lg shadow-md focus:outline-none focus:shadow-outline uppercase"
                        id="submit-button" >
                        log In
                    </button>

                </form>
            </div>
        </div>
        <!-- <img src="image/bg-bottom.svg" class="w-full md:hidden z-0 fixed bottom-0"> -->
    </div>
@push('scripts')
    <script>
         $('#user_login').on('change', function() {
            if($('#user_login').val() != ""){
                $('#user_login').removeClass('border-[#EB5F5A]');
                $('#req_user_login').text('');
            }
        });
        $('#submit-button').click(function() {
            var user_login = $('#user_login').val();
            const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.\w{2,}$/;
            const phoneRegex = /^\d{10}$/; // Assuming 10-digit phone numbers
            if(user_login == ""){
                $('#user_login').addClass('border-[#EB5F5A]');
                $('#req_user_login').text('Please fill out all information.');
                return;
            }
            if (!phoneRegex.test(user_login) && !emailRegex.test(user_login)) {
                $('#user_login').addClass('border-[#EB5F5A]');
                $('#req_user_login').text('Please Email or Phone');
                return;
            }
            $('#login_form').submit();
        });
    </script>
@endpush
@endsection
