@extends('layouts.default')

@section('title', 'Berhasil Donor Darah')

@section('content')

    <!-- Content -->
    <div class="min-h-screen flex justify-center items-center pt-20 py-28">
        <div class="mx-auto receipt">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg print-table">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xl border text-gray-50 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" colspan="2" class="px-6 py-3 text-center">
                                Bukti Pendaftaran Donor Darah
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium bg-gray-50 dark:bg-gray-800 whitespace-nowrap">
                                Nomor Permintaan Darah
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_donor->no_reg }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Nama
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_donor->name }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Jenis Kelamin
                            </th>
                            <td class="px-6 py-4">
                                @if ($blood_donor->gender == 'laki-laki')
                                    <span>{{ 'Laki-laki' }}</span>
                                @elseif($blood_donor->gender == 'perempuan')
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
                                {{ $blood_donor->address }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Kontak
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_donor->contact }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Umur
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_donor->age . ' Tahun' }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Golongan Darah
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_donor->blood_type->name }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Jenis Pendonorr
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_donor->donor_type->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-12 text-center">
                <h2 class="text-[#1E2B4F] text-2xl font-semibold">Sukses Daftar</h2>
                <p class="text-[#AFAEC3] mt-4">Silahkan Datang ke UTD RSUD Bengkalis dengan membawa bukti untuk konfirmasi
                    selanjutnya</p>
                <button class="inline-block mt-10 bg-[#0D63F3] text-white rounded-full px-14 py-3 d-print-none"
                    onclick="printTable()">Cetak</button>
                <a href="{{ route('index') }}"
                    class="inline-block mt-10 bg-[#0D63F3] text-white rounded-full px-14 py-3 d-print-none">Beranda</a>
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
