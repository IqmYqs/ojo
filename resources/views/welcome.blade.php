@extends('_layouts.layout')
@section('content')
<div class="w-full relative mx-auto bg-[#FCF6FF] h-screen">
    <img src="{{ asset('images/bg-top.svg') }}" class="w-full hidden md:block md:absolute z-0">
    <div class="container mx-auto md:h-screen w-full pt-[30%] md:pt-[15%] lg:pt-[10%] block items-center">
        <div class="container relative flex flex-col items-center my-4 z-20">
            <img src="{{ asset('images/logo/LogoOJO.svg') }}" alt="" class="w-[250px] h-[250px]">
            <img src="{{ asset('images/logo/Logo-OJO.svg') }}" alt="" class="w-[250px] h-[52px]">
            <div class="container flex flex-col relative w-[80%] md:w-[312px] mt-8">

                <!-- Create Account -->
                <button type="button" class="bg-[#A894D0] text-white border-[#F3F3F3] my-2 py-3 shadow-md rounded-lg uppercase"
                    onclick="window.location.href = '{{ route('page.consentForm') }}'">Create Account</button>
                <!-- Log In -->
                <button type="button" class="bg-[#F6E8FC] text-black border-[#F3F3F3] my-2 py-3 shadow-md rounded-lg uppercase"
                    onclick="window.location.href = '{{ route('page.login') }}'">Log In</button>
            </div>
        </div>
    </div>
    <img src="{{ asset('images/bg-bottom.svg') }}" class="w-full md:hidden z-0 fixed bottom-0">
</div>
@endsection
