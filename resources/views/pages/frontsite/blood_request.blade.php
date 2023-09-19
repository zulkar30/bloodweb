@extends('layouts.default')

@section('title', 'Permintaan Darah')

@section('content')

    <!-- Content -->
    <main class="min-h-screen">
        <div class="lg:max-w-7xl lg:flex items-center mx-auto px-4 lg:px-14 pt-6 py-20 lg:py-24 gap-x-24">
            {{-- Form --}}
            <div class="lg:w-full mt-10 lg:mt-0">
                <h1 class="text-[#1E2B4F] text-4xl font-semibold leading-normal">
                    Formulir Pendaftaran
                    Permintaan Darah
                </h1>

                <form action="{{ route('blood_request.store') }}" method="POST" enctype="multipart/form-data"
                    class="mt-8 space-y-5">

                    @csrf
                    @cannot('blood_request_admin')
                        <label class="relative block">
                            <input type="text" id="no_br" name="no_br" value="{{ old('no_br') }}"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Nomor Permintaa Darah" readonly />
                        </label>

                        <label class="relative block">
                            <input type="text" id="name" name="name"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Nama Lengkap" required />
                        </label>

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

                        <div class="form-group flex justify-between gap-2">
                            <label class="relative block w-full">
                                <input type="date" id="birth_date" name="birth_date"
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Tanggal Lahir" required />
                                </span>
                            </label>

                            <label class="relative block w-full">
                                <input type="text" id="age" name="age"
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Umur" required readonly />
                            </label>
                        </div>
                    @endcannot

                    <label class="block">
                        <small class="px-5 font-bold">Golongan Darah Permintaan</small>
                        <select name="blood_type_id" id="blood_type_id"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Blood Type" required>

                            <option disabled selected class="hidden">
                                Golongan Darah
                            </option>

                            @foreach ($blood_type as $blood_type_item)
                                <option value="{{ $blood_type_item->id }}">{{ $blood_type_item->name }}</option>
                            @endforeach

                        </select>
                        <small class="text-[#f54444] px-5">Silahkan Pilih Golongan Darah yang Anda Butuhkan</small>
                    </label>

                    <div class="form-group flex justify-between gap-2">
                        <label class="relative block w-full">
                            <input type="number" id="wb" name="wb" oninput="calculateTotal()"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Darah Lengkap" />
                        </label>

                        <label class="relative block w-full">
                            <input type="number" id="we" name="we" oninput="calculateTotal()"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Darah Cuci" />
                        </label>

                        <label class="relative block w-full">
                            <input type="number" id="prc" name="prc" oninput="calculateTotal()"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Sel Darah Merah" />
                        </label>

                        <label class="relative block w-full">
                            <input type="number" id="tc" name="tc" oninput="calculateTotal()"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Trombosit" />
                        </label>
                    </div>

                    <div class="form-group flex justify-between gap-2">
                        <label class="relative block w-full">
                            <input type="number" id="ffp" name="ffp" oninput="calculateTotal()"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Plasma Segar Beku" />
                        </label>

                        <label class="relative block w-full">
                            <input type="number" id="cry" name="cry" oninput="calculateTotal()"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Kriosipitat" />
                        </label>

                        <label class="relative block w-full">
                            <input type="number" id="plasma" name="plasma" oninput="calculateTotal()"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Plasma" />
                        </label>

                        <label class="relative block w-full">
                            <input type="number" id="prp" name="prp" oninput="calculateTotal()"
                                class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                placeholder="Plasma Kaya Trombosit" />
                        </label>
                    </div>

                    <label class="relative block">
                        <input type="text" id="total" name="total"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Total Komponen" readonly />
                    </label>

                    <label class="relative block">
                        <textarea name="info" id="info"
                            class="block w-full rounded-md py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Keterangan"></textarea>
                    </label>

                    <input type="hidden" name="blood_request_id" value="#">
                    <input type="hidden" id="last_br_number" name="last_br_number" value="{{ $lastBloodRequestId }}">

                    <div class="flex justify-between gap-2">
                        <a href="{{ route('index') }}" class="w-full"><button type="button"
                                class="bg-[#b1b2b4] rounded-full mt-5 w-full text-white text-lg font-medium px-10 py-3 text-center"
                                onclick="return confirm('Anda yakin ingin membatalkan ?')">Batal</button></a>
                        <button type="submit"
                            class="bg-[#0D63F3] rounded-full mt-5 w-full text-white text-lg font-medium px-10 py-3 text-center"
                            onclick="return confirm('ArAnda yakin ingin melanjutkan ?')">Lanjutkan</button>
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
            var noBloodRequestInput = $('#no_br');
            var lastBloodRequestNumberInput = $('#last_br_number');

            var lastBloodRequestId = parseInt(lastBloodRequestNumberInput.val());
            var newBloodRequestNumber = lastBloodRequestId + 1;
            var formattedBloodRequestNumber = 'BR' + newBloodRequestNumber.toString().padStart(5, '0');

            noBloodRequestInput.val(formattedBloodRequestNumber);
            lastBloodRequestNumberInput.val(newBloodRequestNumber);
        });

        function calculateTotal() {
            var wb = Number(document.getElementById('wb').value) || 0;
            var we = Number(document.getElementById('we').value) || 0;
            var prc = Number(document.getElementById('prc').value) || 0;
            var tc = Number(document.getElementById('tc').value) || 0;
            var ffp = Number(document.getElementById('ffp').value) || 0;
            var cry = Number(document.getElementById('cry').value) || 0;
            var plasma = Number(document.getElementById('plasma').value) || 0;
            var prp = Number(document.getElementById('prp').value) || 0;

            var total = wb + we + prc + tc + ffp + cry + plasma + prp;

            document.getElementById('total').value = total + ' Komponen';
        }

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

        document.getElementById("birth_date").addEventListener("change", calculateAge);
    </script>
@endpush
