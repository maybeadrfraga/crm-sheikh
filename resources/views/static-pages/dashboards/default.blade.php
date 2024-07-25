<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-app.navbar />

        <!-- Container -->
        <div class="px-5 py-4 container-fluid">
            <!-- Row 1 -->
            <div class="row">
                <div class="col-md-12">
                    <div class="mx-2 mb-3 d-md-flex align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h3 class="mb-0 font-weight-bold">Hello, {{ auth()->user()->name }}</h3>
                            <p class="mb-0">Welcome back to Sheikhdom Portal!</p>
                        </div>
                        <button type="button" class="mb-0 mb-2 btn btn-sm btn-white btn-icon d-flex align-items-center ms-md-auto mb-sm-0 me-2">
                            <span class="btn-inner--icon">
                                <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
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
            </div>
            <hr class="my-0">

            <!-- Row 2 -->
            <div class="my-4 row">
                <!-- Col 1: Balances over time -->
                <div class="mb-4 col-lg-4 col-md-6 mb-md-0">
                    <div class="card shadow-xs border h-100">
                        <div class="card-header border-0 pb-0">
                            <h6 class="font-weight-semibold text-lg mb-0">Balances over time</h6>
                            <p class="text-sm">Here you have details about the balance.</p>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                <label class="btn btn-white px-3 mb-0" for="btnradio1">12 months</label>
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label class="btn btn-white px-3 mb-0" for="btnradio2">30 days</label>
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                <label class="btn btn-white px-3 mb-0" for="btnradio3">7 days</label>
                            </div>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart mb-2">
                                <canvas id="chart-bars" class="chart-canvas" height="240"></canvas>
                            </div>
                            <button class="btn btn-white mb-0 ms-auto">View report</button>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Recent transactions -->
                <div class="col-lg-8 col-md-6">
                    <div class="border shadow-xs card">
                        <div class="pb-0 card-header border-bottom">
                            <div class="mb-3 d-sm-flex align-items-center">
                                <div>
                                    <h6 class="mb-0 text-lg font-weight-semibold">Recent Transactions</h6>
                                    <p class="mb-2 text-sm mb-sm-0">Details about the recent transactions</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <button type="button" class="mb-0 btn btn-sm btn-white me-2">View report</button>
                                    <button type="button" class="mb-0 btn btn-sm btn-dark btn-icon d-flex align-items-center">
                                        <span class="btn-inner--icon">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Download</span>
                                    </button>
                                </div>
                            </div>
                            <div class="pb-3 d-sm-flex align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" autocomplete="off" checked>
                                    <label class="px-3 mb-0 btn btn-white" for="btnradiotable1">All</label>
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2" autocomplete="off">
                                    <label class="px-3 mb-0 btn btn-white" for="btnradiotable2">Monitored</label>
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" autocomplete="off">
                                    <label class="px-3 mb-0 btn btn-white" for="btnradiotable3">Unmonitored</label>
                                </div>
                                <div class="input-group w-sm-25 ms-auto">
                                    <span class="input-group-text text-body">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </div>
                        </div>
                        <div class="px-0 py-0 card-body">
                            <div class="p-0 table-responsive">
                                <table class="table mb-0 align-items-center justify-content-center">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7">Company</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Description</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Amount</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Date</th>
                                            <th class="text-xs text-center text-secondary font-weight-semibold opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expenses as $expense)
                                        <tr>
                                            <td>
                                                {{ $expense->company->name }}
                                            </td>
                                            <td>
                                                {{ $expense->description }}
                                            </td>
                                            <td>
                                                ${{ number_format($expense->amount, 2) }}
                                            </td>
                                            <td>                                                
                                                {{ $expense->date }}
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('expenses.show', $expense->id) }}" class="btn btn-sm btn-outline-secondary btn-icon d-flex align-items-center justify-content-center">
                                                    <span class="btn-inner--icon">
                                                        <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l5.25-5.25M4.5 12l5.25 5.25" />
                                                        </svg>
                                                    </span>
                                                    <span class="ms-2 btn-inner--text">Details</span>
                                                </a>
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

        <!-- Footer -->
        <x-app.footer />
    </main>
</x-app-layout>
