@extends('_layouts.layout')
@section('content')
<div class="w-full relative mx-auto bg-[#FCF6FF] h-screen">
    <img src="{{ asset('images/bg-top.svg') }}" class="w-full md:absolute z-0">
    <div class="container mx-auto md:h-screen w-full md:pt-[20%] lg:pt-[15%] block items-center">
        <div class="container relative flex flex-col items-center my-4">
            <form class="p-4 max-w-md mx-auto rounded" method="POST" id="form_register" action="{{ route('register') }}">
                @csrf
                <h1 class="uppercase font-bold text-6xl text-center text-[#EB5F5A]">Sign Up</h1>
                <!-- input e-mail -->
                <div class="relative flex items-center mt-16">
                    <input id="user_login" name="user_login" type="text" autocomplete="off"
                        class="peer {{ (session('errorMailorPhone') ? 'border-[#EB5F5A]' : '') }} relative h-10 w-full rounded-md bg-white border-2 border-[#A894D0] pl-10 pr-4 font-thin drop-shadow-sm transition-all duration-200 focus:border-[#A894D0] focus:drop-shadow-lg"
                        placeholder="Email/Phone" value="{{ old('user_login') }}"/>
                    <span class="absolute left-2 transition-all duration-200 ease-in-out">
                        <img src="{{ asset('images/icon/user.svg') }}" alt="">
                    </span>
                </div>
                <span class="text-sm text-[#EB5F5A]" id="req_user_login"></span>
                @if(session('errorMailorPhone'))
                    <span class="text-sm text-[#EB5F5A]">Email or Phone is used</span>
                @endif

                <!-- input password -->
                <div class="relative flex items-center mt-4">
                    <input
                        class="appearance-none h-10 w-full rounded-md pl-10 font-thin bg-white border-2 border-[#A894D0] js-password"
                        id="password" type="password" name="password" autocomplete="off" placeholder="Password" />
                    <span class="absolute left-2 transition-all duration-200 ease-in-out">
                        <img src="{{ asset('images/icon/lock.svg') }}" alt="">
                    </span>
                </div>
                <span class="text-sm text-[#EB5F5A]" id="req_password"></span>

                <!-- confirm password -->
                <div class="relative flex items-center mt-4">
                    <input
                        class="appearance-none h-10 w-full rounded-md pl-10 font-thin bg-white border-2 border-[#A894D0] js-password1"
                        id="confirm_password" type="password" name="confirm_password" autocomplete="off" placeholder="Confirm Password" />
                    <span class="absolute left-2 transition-all duration-200 ease-in-out">
                        <img src="{{ asset('images/icon/lock.svg') }}" alt="">
                    </span>
                </div>
                <span class="text-sm text-[#EB5F5A]" id="req_confirm_password"></span>
                <!-- <a href="#" class="flex justify-end my-2">Forget password?</a> -->
                <button  type="button" id="submit-button"
                    class="w-full bg-[#A894D0] text-white text-center font-medium py-3 px-4 mt-10 rounded-lg shadow-md
                    focus:outline-none focus:shadow-outline uppercase">Log In
                </button>

            </form>
        </div>
    </div>
    <!-- <img src="images/bg-bottom.svg" class="w-full md:hidden z-0 fixed bottom-0"> -->
</div>
@push('scripts')
    <script>
    $(document).ready(function() {

    });
    $('#user_login').on('change', function() {
        if($('#user_login').val() != ""){
                $('#user_login').removeClass('border-[#EB5F5A]');
                $('#req_user_login').text('');
            }
    });
    $('#confirm_password').on('change', function() {
        if($('#confirm_password').val() != ""){
                $('#confirm_password').removeClass('border-[#EB5F5A]');
                $('#req_confirm_password').text('');
            }
    });
    $('#password').on('change', function() {
        if($('#password').val() != ""){
                $('#password').removeClass('border-[#EB5F5A]');
                $('#req_password').text('');
            }
    });
    $('#submit-button').click(function() {
            if($('#user_login').val() == ""){
                $('#user_login').addClass('border-[#EB5F5A]');
                $('#req_user_login').text('Please fill out all information.');
            }
            else if($('#password').val() == ""){
                $('#password').addClass('border-[#EB5F5A]');
                $('#req_password').text('Please fill out all information.');
            }
            else if($('#confirm_password').val() == ""){
                $('#confirm_password').addClass('border-[#EB5F5A]');
                $('#req_confirm_password').text('Please fill out all information.');
            }
            else if($('#confirm_password').val() !== $('#password').val()){
                $('#confirm_password').addClass('border-[#EB5F5A]');
                $('#req_confirm_password').text('Password Not Math');
            }else{
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
                // var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                // if(!$('#email').val().match(validRegex)){
                //     $('#email').addClass('border-[#EB5F5A]');
                //     $('#req_mail').text('Please Email');
                // }else{
                    $('#submit-button').attr('disabled', true);
                    $('#submit-button').addClass('opacity-[0.65]');
                    $('#form_register').submit();
                // }
            }
        });
    </script>
@endpush
@endsection
