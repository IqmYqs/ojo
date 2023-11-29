@extends('_layouts.layout')
@section('content')
    <div class="bg-[#FCF6FF] h-screen">
        <div class="w-full relative mx-auto bg-[#FCF6FF]">
            <img src="{{ asset('images/bg-top.svg') }}" class="w-full absolute z-0">
            <div class="container mx-auto md:h-screen sm:h-screen w-full md:pt-2 lg:pt-2 items-center">
                <div class="container relative flex flex-col items-center">
                    <div class="p-4 max-w-md mx-auto rounded">
                        <video class="rounded-2xl mb:w-[90%] lg:w-[90%] w-full" {{ (auth()->user()->get_reward == 1 ? 'controls' : 'autoplay controls') }}>
                            <source src="{{ asset('videos/ojo_app.mp4') }}" type="video/mp4">
                            Your browser does not support HTML video.
                        </video>
                        <div id="myModal"
                            class="modal hidden fixed inset-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center">
                            <div
                                class="modal-content bg-white py-10 px-14 rounded-lg shadow-md w-100 flex flex-col items-center justify-center text-center">
                                <span onclick="closeModal()"
                                    class="modal-close cursor-pointer absolute top-4 right-4 text-gray-500 hover:text-gray-700">&times;</span>
                                <h1 class="text-2xl font-semibold mb-4">Success</h1>
                                <img src="{{ asset('images/modal/Succeed.svg') }}" alt="Success">
                                <p class="mt-4">Claim your reward</p>
                                <button onclick="closeModal()"
                                    class="bg-gray-300 text-gray-800 w-full px-4 py-2 rounded mt-6 uppercase">Close</button>
                                    <form action="{{ route('set.reward') }}" method="GET" class="w-full">
                                        <button onclick="handleSuccess()" type="submit"
                                        class="bg-[#A894D0] text-white w-full px-4 py-2 rounded mt-4 uppercase">OK</button>
                                    </form>
                            </div>
                        </div>
                        {{-- @dd(auth()->user()) --}}
                        @if(auth()->user()->get_reward == 0)
                        <button type="button" onclick="openModal()" id="c_reward"
                            class="mb:w-[90%] hidden lg:w-[90%] w-full bg-[#A894D0] mt-4 text-white text-center font-medium py-3 px-4 rounded-lg shadow-md
                    focus:outline-none focus:shadow-outline uppercase">Claim your reward</button>
                        @else
                        <button type="button" onclick="openModal()" disabled id="r_reward"
                            class="mb:w-[90%] lg:w-[90%] w-full bg-[#d7d7d7] text-gray-500 mt-4  text-center font-medium py-3 px-4 rounded-lg shadow-md
                    focus:outline-none focus:shadow-outline uppercase">Received reward</button>
                        @endif
                        <form method="get" action="{{ route('logout') }}">
                            <button type="submit"
                                class="mb:w-[90%] lg:w-[90%] w-full bg-[#EB5F5A] mt-4 text-white text-center font-medium py-3 px-4 rounded-lg shadow-md
                    focus:outline-none focus:shadow-outline uppercase">Log
                                Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const video = document.querySelector('video');
            const button_c = document.querySelector('#c_reward');
            const button_r = document.querySelector('#r_reward');

            video.addEventListener('ended', () => {
                button_c.style.display = 'block';
            });


            // เปิด Modal
            function openModal() {
                const modal = document.getElementById('myModal');
                modal.classList.remove('hidden');
            }

            // ปิด Modal
            function closeModal() {
                const modal = document.getElementById('myModal');
                modal.classList.add('hidden');
            }

            // ปิด Modal และดำเนินการต่อไป (เช่น ส่งข้อมูล)
            function handleSuccess() {
                button_c.style.display = 'none';
                closeModal();
                // ทำสิ่งที่คุณต้องการทำหลังจากปิด Modal ได้ที่นี้
                console.log('Success!');
            }
        </script>
    @endpush
@endsection
