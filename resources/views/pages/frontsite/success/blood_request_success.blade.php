@extends('layouts.default')

@section('title', 'Blood Request Success')

@section('content')

    <!-- Content -->
    <div class="min-h-screen flex justify-center items-center pt-20 py-28">
        <div class="mx-auto receipt">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg print-table">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xl border text-gray-50 uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" colspan="2" class="px-6 py-3 text-center">
                                Blood Request Receipt
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium bg-gray-50 dark:bg-gray-800 whitespace-nowrap">
                                Name
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->name }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Gender
                            </th>
                            <td class="px-6 py-4">
                                @if ($blood_request->gender == 1)
                                    <span>{{ 'Laki-laki' }}</span>
                                @elseif($blood_request->gender == 2)
                                    <span>{{ 'Perempuan' }}</span>
                                @else
                                    <span>{{ 'N/A' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Address
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->address }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Contact
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->contact }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Age
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->age }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Blood Type Request
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->blood_type->name }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Whole Blood
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->wb . ' Komponen' }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Washed Red Cell
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->we . ' Komponen' }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Packed Red Cell
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->prc . ' Komponen' }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Thrombocyt Concentrate
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->tc . ' Komponen' }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Fresh Frozen Plasma
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->ffp . ' Komponen' }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Cryocipitate
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->cry . ' Komponen' }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Plasma
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->plasma . ' Komponen' }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Plate Rich Plasma
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->prp . ' Komponen' }}
                            </td>
                        </tr>
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-50 dark:bg-gray-800">
                                Total
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->total . ' Komponen' }}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Keterangan
                            </th>
                            <td class="px-6 py-4">
                                {{ $blood_request->info }}
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
                    onclick="printTable()">Print</button>
                <a href="{{ route('index') }}"
                    class="inline-block mt-10 bg-[#0D63F3] text-white rounded-full px-14 py-3">Home</a>
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
