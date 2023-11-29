@extends('_layouts.layout')
@section('content')
    <div class="bg-[#FCF6FF] h-screen">
        <div class="w-full relative mx-auto bg-[#FCF6FF]">
            <img src="{{ asset('images/bg-top.svg') }}" class="w-full md:absolute z-0">
            <div class="container mx-auto md:h-screen sm:h-screen w-full md:pt-[15%] lg:pt-[10%] items-center">
                <div class="container relative flex flex-col items-center my-4">

                    <form class="p-4 max-w-md mx-auto rounded" method="post" action="{{ route('informations') }}" id="form_informations">
                        @csrf
                        <h1 class="uppercase font-bold text-6xl text-center text-[#EB5F5A]">Sign Up</h1>
                        <!-- ojo app name -->
                        <div class="relative flex items-center mt-16">
                            <input id="username" name="username" type="text" autocomplete="off" autofocus
                                class="peer relative h-10 w-full rounded-md bg-white border-2 border-[#A894D0] pl-10 pr-4 font-thin drop-shadow-sm transition-all duration-200 focus:border-[#A894D0] focus:drop-shadow-lg"
                                placeholder="Username">
                            <span class="absolute left-2 transition-all duration-200 ease-in-out">
                                <img src="{{ asset('images/icon/user.svg') }}" alt="">
                            </span>
                        </div>
                        <span class="text-sm text-[#EB5F5A]" id="req_username"></span>

                        <!-- First Name -->
                        <div class="relative flex items-center mt-4">
                            <input
                                class="appearance-none h-10 w-full rounded-md pl-10 font-thin bg-white border-2 border-[#A894D0] js-password"
                                id="fname" name="fname" type="fname" autocomplete="off" placeholder="First Name">
                            <span class="absolute left-2 transition-all duration-200 ease-in-out">
                                <img src="{{ asset('images/icon/user.svg') }}" alt="">
                            </span>
                        </div>
                        <span class="text-sm text-[#EB5F5A]" id="req_fname"></span>

                        <!-- Last Name -->
                        <div class="relative flex items-center mt-4">
                            <input
                                class="appearance-none h-10 w-full rounded-md pl-10 font-thin bg-white border-2 border-[#A894D0] js-password"
                                id="lname" type="lname" name="lname" autocomplete="off" placeholder="Last Name">
                            <span class="absolute left-2 transition-all duration-200 ease-in-out">
                                <img src="{{ asset('images/icon/user.svg') }}" alt="">
                            </span>
                        </div>
                        <span class="text-sm text-[#EB5F5A]" id="req_lname"></span>

                        <!-- Gender -->
                        <div class="relative flex items-center mt-4">
                            <input
                                class="appearance-none h-10 w-full rounded-md pl-10 font-thin bg-white border-2 border-[#A894D0] js-password1"
                                autocomplete="off">
                            <select name="gender" id="gender" class="absolute w-[82%] right-3 text-[#C7C7C7]">
                                <option value="">Gender</option>
                                <option value="male">Male</option>
                                <option value="famale">Female</option>
                            </select>
                            <span class="absolute left-2 transition-all duration-200 ease-in-out">
                                <img src="{{ asset('images/icon/gender.svg') }}" alt="">
                            </span>
                        </div>
                        <span class="text-sm text-[#EB5F5A]" id="req_gender"></span>

                        <!-- Birthday -->
                        <div class="grid grid-cols-3 gap-4 mt-2">
                            <!-- ส่วนเลือกวัน -->
                            <div>
                                <label for="day" class="block text-lg font-thin text-[#747474]">Day</label>
                                <select id="day" class="mt-1 p-1 border-2 border-[#A894D0] rounded-md w-full text-[#747474]">
                                    <!-- สร้างตัวเลือกวันที่ 1-31 -->
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="29">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
            
                            <!-- ส่วนเลือกเดือน -->
                            <div>
                                <label for="month" class="block text-lg font-thin text-[#747474]">Month</label>
                                <select id="month" class="mt-1 p-1 border-2 border-[#A894D0] rounded-md w-full text-[#747474]">
                                    <!-- สร้างตัวเลือกเดือน -->
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
            
                            <!-- ส่วนเลือกปี -->
                            <div>
                                <label for="year" class="block text-lg font-thin text-[#747474]">Year</label>
                                <select id="year" class="mt-1 p-1 border-2 border-[#A894D0] rounded-md w-full text-[#747474]">
                                    <!-- สร้างตัวเลือกปี -50 -->
                                    <!-- <option value="2566">2566</option> -->
            
                                </select>
                            </div>
                        </div>
                        <span class="text-sm text-[#EB5F5A]" id="req_birthday"></span>
                        <input type="text" class="hidden" id="birthday" name="birthday">
                        <button type="button" id="submit-button" class="w-full bg-[#A894D0] text-white text-center font-medium py-3 px-4 mt-10 rounded-lg shadow-md
                            focus:outline-none focus:shadow-outline uppercase">Next
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
    <script>
        var a = '';
        var b = 2023;
        var birthday_val = "";
        for (let i = b; i >= b - 50; i--) {
            a += '<option value="' + i + '">' + i + '</option>';
        }
        $('#year').append(a);
        $('#username').on('change', function() {
            if($('#username').val() != ""){
                $('#username').removeClass('border-[#EB5F5A]');
                $('#req_username').text('');
            }
        });
        $('#fname').on('change', function() {
            if($('#fname').val() != ""){
                $('#fname').removeClass('border-[#EB5F5A]');
                $('#req_fname').text('');
            }
        });
        $('#lname').on('change', function() {
            if($('#lname').val() != ""){
                $('#lname').removeClass('border-[#EB5F5A]');
                $('#req_lname').text('');
            }
        });
        $('#gender').on('change', function() {
            if($('#gender').val() != ""){
                $('#gender').removeClass('border-[#EB5F5A]');
                $('#req_gender').text('');
            }
        });
        $('#birthday').on('change', function() {
            if($('#birthday').val() != ""){
                $('#birthday').removeClass('border-[#EB5F5A]');
                $('#req_birthday').text('');
            }
        });
        $('#submit-button').on('click', function(){
            if($('#username').val() == ""){
                $('#username').addClass('border-[#EB5F5A]');
                $('#req_username').text('Please fill out all information.');
            }
            else if($('#fname').val() == ""){
                $('#fname').addClass('border-[#EB5F5A]');
                $('#req_fname').text('Please fill out all information.');
            }
            else if($('#lname').val() == ""){
                $('#lname').addClass('border-[#EB5F5A]');
                $('#req_lname').text('Please fill out all information.');
            }
            else if($('#gender').val() == ""){
                $('#gender').addClass('border-[#EB5F5A]');
                $('#req_gender').text('Please fill out all information.');
            }
            else if($('#day').val() == "" || $('#month').val() == "" || $('#year').val() == ""){
                $('#birthday').addClass('border-[#EB5F5A]');
                $('#req_birthday').text('Please fill out all information.');
            }else{
                $('#birthday').val($('#year').val()+"-"+$('#month').val()+"-"+$('#day').val())
                $("#form_informations").submit();
            }
        });
    </script>
@endpush
@endsection
