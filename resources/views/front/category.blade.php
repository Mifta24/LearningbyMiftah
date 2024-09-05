<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="text-black font-poppins pt-10 pb-[50px]">
    <div id="hero-section" class="max-w-[1200px] mx-auto w-full flex flex-col gap-10 bg-[url('assets/background/Hero-Banner.png')] bg-center bg-no-repeat bg-cover rounded-[32px] overflow-hidden">
        <x-front-navbar></x-front-navbar>
    </div>
    <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{asset('assets')}}/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Top Categories</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">{{ $category->name }}</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p>
            </div>
            <div class="grid grid-cols-3 gap-[30px] w-full">
                @forelse ($courses as $course )


                <div class="course-card">
                    <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                        <a href="details.html" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{ Storage::url($course->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[32px]">
                            <div class="flex flex-col gap-[10px]">
                                <a href="{{ route('front.detail',$course) }}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $course->name }}</a>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-[2px]">
                                        <div>
                                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                                        </div>
                                    </div>
                                    <p class="text-right text-[#6D7786]">{{ $course->students->count() }} students</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{asset('assets')}}/photo/photo1.png" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold">{{ $course->teacher->user->name }}</p>
                                    <p class="text-[#6D7786]">{{ $course->teacher->user->occupation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @empty

                @endforelse
            </div>
        </div>

    </section>
    <section id="Zero-to-Success" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[50px] gap-[30px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{asset('assets')}}/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Zero to Success People</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Happy & Success Students</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Acquiring skills and new high paying career become much easier</p>
            </div>
        </div>
        <div class="testi w-full overflow-hidden flex flex-col gap-6 relative">
            <div class="fade-overlay absolute z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA] to-[#F5F8FA00]"></div>
            <div class="fade-overlay absolute right-0 z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA00] to-[#F5F8FA]"></div>
            <div class="group/slider flex flex-nowrap w-max items-center">
                <div class="testi-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="group/slider flex flex-nowrap w-max items-center">
                <div class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="{{asset('assets')}}/photo/photo4.png" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="{{asset('assets')}}/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <x-footer></x-footer>

</body>
</html>
