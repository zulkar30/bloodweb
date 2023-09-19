@extends('layouts.default')

@section('title', 'Home')

@section('content')

    <!-- Content -->
    <main class="min-h-screen">

        <!-- Hero -->
        <section class="relative mt-12">
            <!-- Hero Title -->
            <div class="hidden lg:block lg:absolute lg:z-10 lg:top-0 lg:right-0" aria-hidden="true">
                <img src="{{ asset('/assets/frontsite/images/hero-image.jpg') }}"
                    class="bg-cover bg-center object-cover object-center max-h-[580px] rounded-l-lg" alt="Hero Image" />
                <div class="text-center absolute bottom-0 -left-20 -translate-y-14 bg-white px-7 py-5 rounded-xl shadow-2xl">
                    <h5 class="font-medium text-[#1E2B4F]">Donor Darah</h5>
                    <p class="text-xs text-[#AFAEC3] mt-1">Permintaan Darah</h1>
                        <span
                            class="block text-xs text-[#1E2B4F] font-medium bg-[#F2F6FE] px-4 py-2 rounded-full text-center mt-7">Lets
                            Go!</span>
                </div>
            </div>

            <!-- Hero Description -->
            <div class="relative mx-auto max-w-7xl px-4 lg:px-14 lg:py-16">
                <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                    <div class="lg:col-span-6">

                        <!-- Label New -->
                        <h1>
                            <div class="flex items-center">
                                <span
                                    class="text-white text-xs sm:text-sm font-medium bg-[#2AB49B] rounded-full px-8 py-2">Sekarang</span>
                                <span
                                    class="text-[#1E2B4F] text-[11px] sm:text-sm bg-[#F2F6FE] rounded-r-full px-8 py-2 relative -z-10 -ml-4">Disini informasi darah terbaru</span>
                            </div>

                            <span class="mt-6 block text-4xl font-semibold sm:text-5xl">
                                <span class="block text-[#1E2B4F] leading-normal">Berikan Darah Anda. <br />Bantu Setiap Orang yang Membutuhkan.</span>
                            </span>
                        </h1>
                        <!-- End Label New -->

                        <!-- Text -->
                        <div class="flex flex-wrap gap-16 mt-8">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('/assets/frontsite/images/service.svg') }}" alt="service icon" />
                                </div>
                                <div>
                                    <h5 class="text-[#1E2B4F] text-lg font-medium">Donor Darah</h5>
                                    <p class="text-[#AFAEC3]">bagi yang membutuhkan</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('/assets/frontsite/images/service.svg') }}" alt="service icon" />
                                </div>
                                <div>
                                    <h5 class="text-[#1E2B4F] text-lg font-medium">Permintaan Darah</h5>
                                    <p class="text-[#AFAEC3]">sebagaimana yang Anda butuhkan</p>
                                </div>
                            </div>
                        </div>
                        <!-- Text -->

                        <!-- Hero Button -->
                        <div class="grid lg:flex flex-wrap mt-20 gap-5">
                            <a href="{{ route('blood_donor') }}"
                                class="text-white text-lg font-medium text-center bg-[#0D63F3] rounded-full px-12 py-3">Donor
                                Darah</a>
                            <a href="{{ route('blood_request') }}"
                                class="text-[#1E2B4F] text-lg font-medium text-center bg-[#F2F6FE] rounded-full px-16 py-3">Butuh
                                Darah</a>
                        </div>
                        <!-- Hero Button -->

                    </div>
                </div>
            </div>
        </section>
        <!-- End Hero -->

        <!-- Blood Stock Section -->
        <section class="mt-32 bg-[#F9FBFC]">
            <div class="mx-auto max-w-7xl px-4 lg:px-14 py-16">
                <h3 class="text-2xl font-semibold">Stok Darah</h3>
                <p class="text-[#A7B0B5] mt-2">Jadilah salah satu yang menjadi kontributor.</p>

                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8 md:gap-10 lg:gap-12 mt-10">
                    @foreach ($blood_type as $blood_type_item)
                        <!-- Card -->
                        <div
                            class="bg-white py-6 px-5 rounded-2xl transition hover:ring-offset-2 hover:ring-2 hover:ring-[#0D63F3]">
                            <h5 class="text-[#1E2B4F] text-lg font-semibold">
                                {{ $blood_type_item->name }}
                            </h5>
                            @php
                                $blood_supply_item = $blood_supply->firstWhere('blood_type_id', $blood_type_item->id);
                            @endphp
                            <p class="text-[#AFAEC3] mt-1">
                                {{ $blood_supply_item ? $blood_supply_item->volume . ' Kantong' : '0 Kantong' }}
                            </p>
                        </div>
                        <!-- End Card -->
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Blood Stock Section -->

    </main>
    <!-- End Content -->

@endsection
