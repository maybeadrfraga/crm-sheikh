<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-app.navbar />

        <!-- Container -->
        <div class="px-5 py-4 container-fluid">
            <!-- Row 1 -->
            <div class="col-md-12">
                <div class="mx-2 mb-3 d-md-flex align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h3 class="mb-0 font-weight-bold">Hello, {{ auth()->user()->name }}</h3>
                        <p class="mb-0">Welcome back to Sheikhdom Portal!</p>
                    </div>
                    <button type="button" class="mb-0 mb-2 btn btn-sm btn-white btn-icon d-flex align-items-center ms-md-auto mb-sm-0 me-2">
                        <span class="btn-inner--icon">
                            <span class="p-1 bg-success  d-flex ms-auto me-2">
                                <span class="visually-hidden">New</span>
                            </span>
                        </span>
                        <span class="btn-inner--text">Messages</span>
                    </button>
                    <button type="button" class="mb-0 btn btn-sm btn-dark btn-icon d-flex align-items-center">
                        <span class="btn-inner--icon">
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </span>
                        <span class="btn-inner--text">Sync</span>
                    </button>
                </div>
            </div>

            <!-- Row 2 -->
            <div class="my-4 row">
                <!-- Col 1: Empresas -->
                <div class="mb-4 col-lg-4 col-md-6 mb-md-0">
                    <div class="border shadow-xs card">
                        <div class="pb-0 card-header border-bottom">
                            <h6 class="mb-0 text-lg font-weight-semibold">Companies</h6>
                        </div>
                        <div class="px-0 py-0 card-body">
                            <div class="p-0 table-responsive">
                                <table class="table mb-0 align-items-center justify-content-center">
                                    <!-- <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7">Company Name</th>
                                        </tr>
                                    </thead> -->
                                    <tbody>
                                        @foreach($companies as $company)
                                        <tr>
                                            <td>
                                                <div class="px-2 d-flex">
                                                    <div class="my-2 avatar avatar-sm  me-2">
                                                    <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('assets/img/apple-icon.png') }}" class="w-100" alt="{{ $company->name }}">

                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $company->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Recent Transactions -->
                <div class="col-lg-8 col-md-6">
                    <div class="border shadow-xs card">
                        <div class="pb-0 card-header border-bottom">
                            <div class="mb-3 d-sm-flex align-items-center">
                                <div>
                                    <h6 class="mb-0 text-lg font-weight-semibold">Recent transactions</h6>
                                    <p class="mb-2 text-sm mb-sm-0">These are details about the last transactions</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <button type="button" class="mb-0 btn btn-sm btn-white me-2">View report</button>
                                    <!-- <button type="button" class="mb-0 btn btn-sm btn-dark btn-icon d-flex align-items-center">
                                        <span class="btn-inner--icon">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Download</span>
                                    </button> -->
                                </div>
                            </div>
                            <div class="pb-3 d-sm-flex align-items-center">
                                <!-- Your filter or other controls here -->
                            </div>
                        </div>
                        <div class="px-0 py-0 card-body">
                            <div class="p-0 table-responsive">
                                <table class="table mb-0 align-items-center justify-content-center">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7">Transaction</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Amount</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Date</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Account</th>
                                            <th class="text-xs text-center text-secondary font-weight-semibold opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentExpenses as $expense)
                                        <tr>                                            
                                            <td>
                                                <div class="px-2 d-flex">
                                                    <div class="my-2 avatar avatar-sm  me-2">
                                                    <img src="{{ $expense->company->logo ? asset('storage/' . $expense->company->logo) : asset('assets/img/apple-icon.png') }}" class="w-100" alt="{{ $expense->company->name }}">

                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $expense->company->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-sm font-weight-normal">${{ number_format($expense->amount, 2) }}</p>
                                            </td>
                                            <td>
                                                <span class="mb-0 text-xs font-weight-normal">{{ \Carbon\Carbon::parse($expense->date)->format('d M Y') }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mb-0 text-xs font-weight-normal">{{ $expense->company->name }}</span>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <button class="mb-0 btn btn-sm btn-outline-secondary btn-icon d-flex align-items-center justify-content-center">
                                                    <span class="btn-inner--icon">
                                                        <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l5.25-5.25M4.5 12l5.25 5.25" />
                                                        </svg>
                                                    </span>
                                                    <span class="ms-2 btn-inner--text">Details</span>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 3: All Expenses -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="border shadow-xs card">
                        <div class="pb-0 card-header border-bottom">
                            <div class="mb-3 d-sm-flex align-items-center">
                                <div>
                                    <h6 class="mb-0 text-lg font-weight-semibold">All Expenses</h6>
                                    <p class="mb-2 text-sm mb-sm-0">Complete details about all expenses</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-0 py-0 card-body">
                            <div class="p-0 table-responsive">
                                <table class="table mb-0 align-items-center justify-content-center">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7">Transaction</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Amount</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Date</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Account</th>
                                            <th class="text-xs text-center text-secondary font-weight-semibold opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allExpenses as $expense)
                                        <tr>
                                            <td>
                                                <div class="px-2 d-flex">
                                                    <div class="my-2 avatar avatar-sm  me-2">
                                                    <img src="{{ $expense->company->logo ? asset('storage/' . $expense->company->logo) : asset('assets/img/apple-icon.png') }}" class="w-100" alt="{{ $expense->company->name }}">

                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $expense->company->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-sm font-weight-normal">${{ number_format($expense->amount, 2) }}</p>
                                            </td>
                                            <td>
                                                <span class="mb-0 text-xs font-weight-normal">{{ \Carbon\Carbon::parse($expense->date)->format('d M Y') }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mb-0 text-xs font-weight-normal">{{ $expense->company->name }}</span>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <button class="mb-0 btn btn-sm btn-outline-secondary btn-icon d-flex align-items-center justify-content-center">
                                                    <span class="btn-inner--icon">
                                                        <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l5.25-5.25M4.5 12l5.25 5.25" />
                                                        </svg>
                                                    </span>
                                                    <span class="ms-2 btn-inner--text">Details</span>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
