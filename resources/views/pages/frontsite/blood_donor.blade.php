@extends('layouts.default')

@section('title', 'Blood Donor')

@section('content')

    <!-- Content -->
    <main class="min-h-screen">
        <div class="lg:max-w-7xl lg:flex items-center mx-auto px-4 lg:px-14 pt-6 py-20 lg:py-24 gap-x-24">
            {{-- Form --}}
            <div class="lg:w-full mt-10 lg:mt-0">
                <h2 class="text-[#1E2B4F] text-4xl font-semibold leading-normal">
                    Registry Form of
                    Blood Donor
                </h2>

                <form action="{{ route('blood_donor.store') }}" method="POST" enctype="multipart/form-data"
                    class="mt-8 space-y-5">

                    @csrf

                    <label class="relative block">
                        <input type="text" id="name" name="name"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Name" required />
                    </label>

                    <label class="relative block">
                        <input type="text" id="birth_place" name="birth_place"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Birth Place" required />
                    </label>

                    <div class="form-group flex justify-between gap-2">
                        <label class="relative block w-full">
                            <input type="date" id="birth_date" name="birth_date"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Your Birth Date" required />
                            </span>
                        </label>

                        <label class="block w-full">
                            <select name="gender" id="gender"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Gender" required>
                                <option value="" disabled selected class="hidden">Gender</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </label>
                    </div>

                    <label class="relative block">
                        <input type="text" id="address" name="address"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Address" required />
                    </label>

                    <div class="form-group flex justify-between gap-2">
                        <label class="relative block w-full">
                            <input type="text" id="contact" name="contact"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Your Contact" required />
                        </label>

                        <label class="relative block w-full">
                            <input type="text" id="age" name="age"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Your Age" readonly />
                        </label>
                    </div>

                    <div class="form-group flex justify-between gap-2">
                        <label class="block w-full">
                            <select name="blood_type_id" id="blood_type_id"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Your Blood Type" required>

                                <option disabled selected class="hidden">
                                    Blood Type
                                </option>

                                @foreach ($blood_type as $blood_type_item)
                                    <option value="{{ $blood_type_item->id }}">{{ $blood_type_item->name }}</option>
                                @endforeach

                            </select>
                        </label>

                        <label class="block w-full">
                            <select name="donor_type_id" id="donor_type_id"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Your Donor Type" required>

                                <option disabled selected class="hidden">
                                    Donor Type
                                </option>

                                @foreach ($donor_type as $donor_type_item)
                                    <option value="{{ $donor_type_item->id }}">{{ $donor_type_item->name }}</option>
                                @endforeach

                            </select>
                        </label>
                    </div>

                    <div class="form-group flex justify-between gap-2">
                        <label class="block w-full">
                            <select name="profession_id" id="profession_id"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Your Profession" required>

                                <option disabled selected class="hidden">
                                    Profession
                                </option>

                                @foreach ($profession as $profession_item)
                                    <option value="{{ $profession_item->id }}">{{ $profession_item->name }}</option>
                                @endforeach

                            </select>
                        </label>

                        <label class="relative block w-full">
                            <input type="file" id="photo" name="photo" accept="image/png, image/svg, image/jpeg"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Your Photo" required />
                            <p class="px-5"><small class="text-[#f54444]">Please choose your photo</small><small>
                                    just
                                    can use
                                    JPEG and PNG, max 10
                                    MegaBytes file size</small></p>
                        </label>
                    </div>

                    <input type="hidden" name="blood_donor_id" value="#">

                    <div class="flex justify-between gap-2">
                        <a href="{{ route('index') }}" class="w-full"><button type="button"
                                class="bg-[#b1b2b4] rounded-full mt-5 w-full text-white text-lg font-medium px-10 py-3 text-center"
                                onclick="return confirm('Are you sure want to cancel this registry ?')">Cancel</button></a>
                        <button type="submit"
                            class="bg-[#0D63F3] rounded-full mt-5 w-full text-white text-lg font-medium px-10 py-3 text-center"
                            onclick="return confirm('Are you sure want to confirm this registry ?')">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- End Content -->

@endsection

@push('after-script')
    <script>
        // Calculate age based on birth date
        function calculateAge() {
            var birthDate = document.getElementById("birth_date").value;
            var today = new Date();
            var birthDate = new Date(birthDate);
            var age = today.getFullYear() - birthDate.getFullYear();
            var monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById("age").value = age + " Tahun";
        }

        // Attach the calculateAge function to the birth_date input
        document.getElementById("birth_date").addEventListener("change", calculateAge);
    </script>
@endpush
