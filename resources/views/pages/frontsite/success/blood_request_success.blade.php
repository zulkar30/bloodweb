@extends('layouts.default')

@section('title', 'Berhasil Permintaan Darah')

@section('content')

    <!-- Content -->
    <div class="min-h-screen flex justify-center items-center pt-20 py-28">
        <div class="mx-auto receipt">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg print-table">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xl border text-gray-50 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" colspan="2" class="px-6 py-3 text-center">
                                Bukti Permintaan Darah
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium bg-gray-50 dark:bg-gray-800 whitespace-nowrap">
                                Nomor Permintaan Darah
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->no_br }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Nama
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->name }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Jenis Kelamin
                            </th>
                            <td class="px-6 py-4">
                                @if ($blood_request->gender == 'laki-laki')
                                    <span>{{ 'Laki-laki' }}</span>
                                @elseif($blood_request->gender == 'perempuan')
                                    <span>{{ 'Perempuan' }}</span>
                                @else
                                    <span>{{ 'N/A' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Alamat
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->address }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Kontak
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->contact }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Umur
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->age }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Golongan Darah Permintaan
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->blood_type->name }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Darah Lengkap
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($blood_request->wb) ? $blood_request->wb . ' Komponen' : 'Tidak' }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Darah Cuci
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($blood_request->we) ? $blood_request->we . ' Komponen' : 'Tidak' }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Sel Darah Merah
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($blood_request->prc) ? $blood_request->prc . ' Komponen' : 'Tidak' }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Trombosit
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($blood_request->tc) ? $blood_request->tc . ' Komponen' : 'Tidak' }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Plasma Segar Beku
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($blood_request->ffp) ? $blood_request->ffp . ' Komponen' : 'Tidak' }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Kriosipitat
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($blood_request->cry) ? $blood_request->cry . ' Komponen' : 'Tidak' }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Plasma
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($blood_request->plasma) ? $blood_request->plasma . ' Komponen' : 'Tidak' }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Plasma Kaya Trombosit
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($blood_request->prp) ? $blood_request->prp . ' Komponen' : 'Tidak' }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Total
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($blood_request->total) ? $blood_request->total . ' Komponen' : 'Tidak' }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Keterangan
                            </th>
                            <td class="px-6 py-4">
                                {{ isset($blood_request->info) ? $blood_request->info : 'Tidak ada keterangan' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-12 text-center d-print-none">
                <h2 class="text-[#1E2B4F] text-2xl font-semibold">Sukses Daftar</h2>
                <p class="text-[#AFAEC3] mt-4">Silahkan Datang ke UTD RSUD Bengkalis dengan membawa bukti untuk konfirmasi
                    selanjutnya</p>
                <button class="inline-block mt-10 bg-[#0D63F3] text-white rounded-full px-14 py-3"
                    onclick="printTable()">Cetak</button>
                <a href="{{ route('index') }}"
                    class="inline-block mt-10 bg-[#0D63F3] text-white rounded-full px-14 py-3">Beranda</a>
            </div>
        </div>
    </div>
    <!-- End Content -->

@endsection

@push('after-style')
    <style>
        @media print {
            .d-print-none {
                display: none !important;
            }

            .d-print-inline {
                display: inline !important;
            }

            .d-print-inline-block {
                display: inline-block !important;
            }

            .d-print-block {
                display: block !important;
            }

            .d-print-table {
                display: table !important;
            }

            .d-print-table-row {
                display: table-row !important;
            }

            .d-print-table-cell {
                display: table-cell !important;
            }

            .d-print-flex {
                display: -ms-flexbox !important;
                display: flex !important;
            }

            .d-print-inline-flex {
                display: -ms-inline-flexbox !important;
                display: inline-flex !important;
            }
        }
    </style>
@endpush

@push('after-script')
    <script>
        function printTable() {
            window.print();
        }
    </script>
@endpush
