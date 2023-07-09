@extends('layouts.default')

@section('title', 'Blood Request')

@section('content')

    <!-- Content -->
    <main class="min-h-screen">
        <div class="lg:max-w-7xl lg:flex items-center mx-auto px-4 lg:px-14 pt-6 py-20 lg:py-24 gap-x-24">
            {{-- Doctor Info --}}
            <div class="lg:w-5/12 lg:border-r h-72 lg:h-[30rem] flex flex-col items-center justify-center text-center">
                <img src="{{ asset('assets/frontsite/images/circle-user-solid.svg') }}"
                    class="inline-block w-32 h-32 rounded-full bg-center object-cover object-top" alt="doctor-1" />
                <div class="text-[#1E2B4F] text-lg font-semibold mt-4">
                    {{ Auth::user()->name }}
                </div>

                <div class="text-[#AFAEC3] mt-1">{{ Auth::user()->detail_user->type_user->name }}</div>
            </div>

            {{-- Form --}}
            <div class="lg:w-1/3 mt-10 lg:mt-0">
                <h2 class="text-[#1E2B4F] text-3xl font-semibold leading-normal">
                    Registry of <br />
                    Blood Request
                </h2>

                <form action="{{ route('backsite.donor.store') }}" method="POST" enctype="multipart/form-data"
                    class="mt-8 space-y-5">

                    @csrf

                    <label class="block">
                        <select name="patient_id" id="patient_id"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Patient">

                            <option disabled selected class="hidden">
                                Patient
                            </option>

                            @foreach ($patient as $patient_item)
                                <option value="{{ $patient_item->id }}">{{ $patient_item->name }}</option>
                            @endforeach

                        </select>
                    </label>

                    <label class="block">
                        <select name="doctor_id" id="doctor_id"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Doctor">

                            <option disabled selected class="hidden">
                                Doctor
                            </option>

                            @foreach ($doctor as $doctor_item)
                                <option value="{{ $doctor_item->id }}">{{ $doctor_item->name }}</option>
                            @endforeach

                        </select>
                    </label>

                    <label class="block">
                        <select name="officer_id" id="officer_id"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Officer">

                            <option disabled selected class="hidden">
                                Officer
                            </option>

                            @foreach ($officer as $officer_item)
                                <option value="{{ $officer_item->id }}">{{ $officer_item->name }}</option>
                            @endforeach

                        </select>
                    </label>

                    <label class="relative block">
                        <input type="text" id="name" name="name"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Name" required />
                    </label>


                    <label class="relative block">
                        <input type="text" id="contact" name="contact"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Contact" required />
                    </label>

                    <label class="relative block">
                        <input type="text" id="address" name="address"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Address" required />
                    </label>

                    <label class="relative block">
                        <input type="text" id="age" name="age"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Age" required />
                    </label>

                    <label class="block">
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
                        <p class="text-muted"><small class="text-[#f54444]">Please choose Blood Type you need</small></p>
                    </label>

                    <label class="relative block">
                        <input type="number" id="wb" name="wb" oninput="calculateTotal()"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Whole Blood" />
                    </label>

                    <label class="relative block">
                        <input type="number" id="we" name="we" oninput="calculateTotal()"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Washed Red Cell" />
                    </label>

                    <label class="relative block">
                        <input type="number" id="prc" name="prc" oninput="calculateTotal()"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Packed Red Cell" />
                    </label>

                    <label class="relative block">
                        <input type="number" id="tc" name="tc" oninput="calculateTotal()"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Thrombocyt Concentrate" />
                    </label>

                    <label class="relative block">
                        <input type="number" id="ffp" name="ffp" oninput="calculateTotal()"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Fresh Frozen Plasma" />
                    </label>

                    <label class="relative block">
                        <input type="number" id="cry" name="cry" oninput="calculateTotal()"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Cryocipitate" />
                    </label>

                    <label class="relative block">
                        <input type="number" id="plasma" name="plasma" oninput="calculateTotal()"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Plasma" />
                    </label>

                    <label class="relative block">
                        <input type="number" id="prp" name="prp" oninput="calculateTotal()"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Plate Rich Plasma" />
                    </label>

                    <label class="relative block">
                        <input type="text" id="total" name="total"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Total" readonly />
                    </label>

                    <input type="hidden" name="blood_request_id" value="#">

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
        function calculateTotal() {
            // Get the input field values
            var wb = Number(document.getElementById('wb').value) || 0;
            var we = Number(document.getElementById('we').value) || 0;
            var prc = Number(document.getElementById('prc').value) || 0;
            var tc = Number(document.getElementById('tc').value) || 0;
            var ffp = Number(document.getElementById('ffp').value) || 0;
            var cry = Number(document.getElementById('cry').value) || 0;
            var plasma = Number(document.getElementById('plasma').value) || 0;
            var prp = Number(document.getElementById('prp').value) || 0;

            // Calculate the total
            var total = wb + we + prc + tc + ffp + cry + plasma + prp;

            // Update the total input field value
            document.getElementById('total').value = total + ' Komponen';
        }
    </script>
@endpush
