@extends('layouts.default')

@section('title', 'Donor Darah')

@section('content')

    <!-- Content -->
    <main class="min-h-screen">
        <div class="lg:max-w-7xl lg:flex items-center mx-auto px-4 lg:px-14 pt-6 py-20 lg:py-24 gap-x-24">
            {{-- Form --}}
            <div class="lg:w-full mt-10 lg:mt-0">
                <h2 class="text-[#1E2B4F] text-4xl font-semibold leading-normal">
                    Formulir Pendaftaran Donor Darah
                </h2>

                <form action="{{ route('blood_donor.store') }}" method="POST" enctype="multipart/form-data"
                    class="mt-8 space-y-5">

                    @csrf

                    <label class="relative block">
                        <input type="text" id="no_reg" name="no_reg" value="{{ old('no_reg') }}"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Nomor Registrasi" readonly />
                    </label>

                    <label class="relative block">
                        <input type="text" id="name" name="name"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Nama Lengkap" required />
                    </label>

                    <label class="relative block">
                        <input type="text" id="birth_place" name="birth_place"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Tempat Lahir" required />
                    </label>

                    <div class="form-group flex justify-between gap-2">
                        <label class="relative block w-full">
                            <input type="date" id="birth_date" name="birth_date"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Tanggal Lahir" required />
                            </span>
                        </label>

                        <label class="block w-full">
                            <select name="gender" id="gender"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Jenis Kelamin" required>
                                <option value="" disabled selected class="hidden">Jenis Kelamin</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </label>
                    </div>

                    <label class="relative block">
                        <input type="text" id="address" name="address"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Alamat" required />
                    </label>

                    <div class="form-group flex justify-between gap-2">
                        <label class="relative block w-full">
                            <input type="text" id="contact" name="contact"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Kontak" required />
                        </label>

                        <label class="relative block w-full">
                            <input type="text" id="age" name="age"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Umur" readonly />
                        </label>
                    </div>

                    <div class="form-group flex justify-between gap-2">
                        <label class="block w-full">
                            <select name="blood_type_id" id="blood_type_id"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Golongan Darah" required>

                                <option disabled selected class="hidden">
                                    Golongan Darah
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
                                    Tipe Pendonor
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
                                    Pekerjaan
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
                            <p class="px-5"><small class="text-[#f54444]">Silahkan masukkan foto Anda</small><small>
                                    hanya bisa format
                                    JPEG and PNG, maks. 10
                                    MB</small></p>
                        </label>
                    </div>

                    <input type="hidden" name="blood_donor_id" value="#">
                    <input type="hidden" id="last_reg_number" name="last_reg_number" value="{{ $lastDonorId }}">

                    <div class="flex justify-between gap-2">
                        <a href="{{ route('index') }}" class="w-full"><button type="button"
                                class="bg-[#b1b2b4] rounded-full mt-5 w-full text-white text-lg font-medium px-10 py-3 text-center"
                                onclick="return confirm('Anda yakin ingin membatalkan ?')">Batal</button></a>
                        <button type="submit"
                            class="bg-[#0D63F3] rounded-full mt-5 w-full text-white text-lg font-medium px-10 py-3 text-center"
                            onclick="return confirm('Anda yakin ingin melanjutkan ?')">Lanjutkan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- End Content -->

@endsection

@push('after-script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <script>
        // Membuat nomor registrasi
        $(document).ready(function() {
            var noRegInput = $('#no_reg');
            var lastRegNumberInput = $('#last_reg_number');

            var lastDonorId = parseInt(lastRegNumberInput.val());
            var newRegNumber = lastDonorId + 1;
            var formattedRegNumber = 'REG' + newRegNumber.toString().padStart(5, '0');

            noRegInput.val(formattedRegNumber);
            lastRegNumberInput.val(newRegNumber);
        });

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
