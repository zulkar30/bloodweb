@extends('layouts.default')

@section('title', 'Contact')

@section('content')

    <!-- Content -->
    <main class="min-h-screen">
        <div class="lg:w-full lg:flex mx-auto px-4 lg:px-14 pt-6 py-20 gap-x-24">
            {{-- Doctor Info --}}
            <div class="lg:w-full lg:border-r flex flex-col justify-center px-5">

                <h2 class="text-[#1E2B4F] text-3xl font-semibold leading-normal mb-6">
                    Frequently Asked <br />
                    Questions
                </h2>

                <div class="faq-item mt-5 space-y-5">
                    <article class="faq1 space-y-2">
                        <h1 class="text-3xl font-semibold">Mengapa Donor Darah Sangat Diperlukan?</h1>
                        <p class="text-md">
                            <strong>Kebutuhan yang besar :</strong> Setiap delapan detik, ada satu orang yang membutuhkan
                            transfusi darah di Indonesia. <br />
                            <strong>Pemeriksaan kesehatan gratis :</strong> Sebelum mendonorkan darah, petugas akan
                            memeriksa suhu tubuh, denyut nadi, tekanan darah dan kadar hemoglobin Anda. <br />
                            <strong>Tidak menyakitkan :</strong> Ya Anda memang akan merasa sakit. Namun, rasa sakit itu
                            tidak seberapa dan akan hilang dengan cepat.
                        </p>
                    </article>
                    <article class="faq1 space-y-2">
                        <h1 class="text-3xl font-semibold">Syarat Donor Darah?</h1>
                        <p class="text-md">Adapun syarat penting untuk melakukan Donor Darah adalah Sehat jasmani dan
                            rohani; Usia 17 sampai dengan 60 tahun dan Sampai 65 tahun untuk pendonor darah yang sudah rutin
                            mendonorkan darahnya sampai akhirnya berhenti atas pertimbangan dokter; Berat badan minimal 45
                            Kg; Tekanan darah normal (Sistole 100 - 180 dan Diastole 70 - 100); Kadar haemoglobin 12,5-17,0
                            gr/dL%; Demi keamanan dan keselamatan pendonor sesuai dengan PERMENKES 91 Tahun 2015 interval
                            waktu sejak donor darah terkahir minimal 2 bulan.</p>
                    </article>
                    <article class="faq1 space-y-2">
                        <h1 class="text-3xl font-semibold">Apakah Donor Darah Menyehatkan Bagi Pendonor?</h1>
                        <p class="text-md">Benar, Apabila seseorang mendonorkan darahnya, tubuhnya akan menggantikan volume
                            darah dalam waktu 48 jam setelah donor, dan semua sel darah merah yang hilang akan benar-benar
                            diganti dalam waktu empat sampai delapan minggu dengan sel-sel darah merah yang baru. Proses
                            pembentukan sel-sel darah merah yang baru akan membantu tubuh tetap sehat dan bekerja lebih
                            efisien dan produktif.</p>
                    </article>
                </div>

            </div>

            {{-- Form --}}
            <div class="lg:w-full mt-10 lg:mt-0">

                <h2 class="text-[#1E2B4F] text-3xl font-semibold leading-normal mb-6">
                    Ask Question <br />
                    Form
                </h2>

                <form action="{{ route('contact.store') }}" method="POST" class="mt-8 space-y-5">

                    @csrf

                    <label class="relative block">
                        <input type="text" id="name" name="name"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Name" required />
                    </label>


                    <label class="relative block">
                        <input type="email" id="email" name="email"
                            class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Email" required />
                    </label>

                    <label class="relative block">
                        <textarea name="message" id="message"
                            class="block w-full rounded-md py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                            placeholder="Your Message"></textarea>
                    </label>

                    <input type="hidden" name="blood_request_id" value="#">

                    <div class="flex justify-between gap-2">
                        <button type="submit"
                            class="bg-[#0D63F3] rounded-full mt-5 w-full text-white text-lg font-medium px-10 py-3 text-center"
                            onclick="return confirm('Are you sure want to send this message ?')">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- End Content -->

@endsection
