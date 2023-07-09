@extends('layouts.default')

@section('title', 'About')

@section('content')

    <!-- Content -->
    <main class="min-h-screen">
        <!-- ====== About Section Start -->
        <section class="overflow-hidden pb-12  lg:pb-[90px]">
            <div class="mx-4 flex flex-wrap items-center justify-between">
                <div class="w-full px-4 lg:w-6/12">
                    <div class="-mx-3 flex items-center sm:-mx-4">
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="py-3 sm:py-4">
                                <img src="https://cdn.tailgrids.com/2.0/image/marketing/images/about/about-01/image-1.jpg"
                                    alt="" class="w-full rounded-2xl" />
                            </div>
                            <div class="py-3 sm:py-4">
                                <img src="https://cdn.tailgrids.com/2.0/image/marketing/images/about/about-01/image-2.jpg"
                                    alt="" class="w-full rounded-2xl" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="relative z-10 my-4">
                                <img src="https://cdn.tailgrids.com/2.0/image/marketing/images/about/about-01/image-3.jpg"
                                    alt="" class="w-full rounded-2xl" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
                    <div class="mt-10 lg:mt-0">
                        <span class="text-primary mb-2 block text-lg font-semibold">
                            About Us
                        </span>
                        <h2 class="text-dark mb-8 text-3xl font-bold sm:text-4xl">
                            How BloodWeb Can Be Created.
                        </h2>
                        <p class="text-body-color mb-8 text-base">
                            BloodWeb is an information application related to blood donation which has standard features such as blood stock information, a donor registration feature and a blood request feature.
                        </p>
                        <p class="text-body-color mb-12 text-base">
                            This application was made based on a case study obtained at the blood transfusion unit of the Bengkalis Regency Hospital as the final assignment for a student majoring in informatics engineering named Zulkarnain.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== About Section End -->

    </main>
    <!-- End Content -->

@endsection
