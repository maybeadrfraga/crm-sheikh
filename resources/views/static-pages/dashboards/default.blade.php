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
                        <h3 class="mb-0 font-weight-bold">Total Expense: ${{ $totalSpending }}</h3>
                    </div>
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
                                <table id="companies-table"
                                    class="table mb-0 align-items-center justify-content-center">
                                    <tbody>
                                        @foreach($companies as $company)
                                            <tr>
                                                <td>
                                                    <div class="px-2 d-flex">
                                                        <div class="my-2 avatar avatar-sm me-2">
                                                            <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('assets/img/apple-icon.png') }}"
                                                                class="w-100" alt="{{ $company->name }}">
                                                        </div>
                                                        <div class="my-auto">
                                                            <a href="{{ route('companies.edit', $company->id) }}"
                                                                class="text-dark text-decoration-none">
                                                                <h6 class="mb-0 text-sm">{{ $company->name }}</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="chart w-100">
                            <canvas id="top-spending-chart" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>


                <!-- Row 2: Recent Transactions -->
                <div class="col-lg-8 col-md-6">
                    <div class="border shadow-xs card">
                        <div class="pb-0 card-header border-bottom">
                            <div class="mb-3 d-sm-flex align-items-center">
                                <div>
                                    <h6 class="mb-0 text-lg font-weight-semibold">Recent Transactions</h6>
                                    <p class="mb-2 text-sm mb-sm-0">These are details about the last transactions</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <button type="button" class="mb-0 btn btn-sm btn-white me-2">View report</button>
                                </div>
                            </div>
                        </div>
                        <div class="px-0 py-0 card-body">
                            <div class="p-0 table-responsive">
                                <table id="recent-transactions-table"
                                    class="table mb-0 align-items-center justify-content-center">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7">
                                                Transaction</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">
                                                Amount</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Date
                                            </th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">
                                                Account</th>
                                            <th
                                                class="text-xs text-center text-secondary font-weight-semibold opacity-7">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentExpenses as $expense)
                                            <tr>
                                                <td>
                                                    <p class="mb-0 text-sm font-weight-normal">{{ $expense->description }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="mb-0 text-sm font-weight-normal">
                                                        ${{ number_format($expense->amount, 2) }}</p>
                                                </td>
                                                <td>
                                                    <span
                                                        class="mb-0 text-xs font-weight-normal">{{ \Carbon\Carbon::parse($expense->date)->format('d M Y') }}</span>
                                                </td>
                                                <td>
                                                    <div class="px-2 d-flex align-items-center">
                                                        <div class="my-2 avatar avatar-sm me-2">
                                                            <img src="{{ $expense->company->logo ? asset('storage/' . $expense->company->logo) : asset('assets/img/apple-icon.png') }}"
                                                                class="w-100" alt="{{ $expense->company->name }}">
                                                        </div>
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">{{ $expense->company->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('expenses.edit', $expense->id) }}"
                                                        class="mb-0 btn btn-sm btn-outline-secondary btn-icon d-flex align-items-center justify-content-center">
                                                        <span class="btn-inner--icon">
                                                            <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="d-block">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19.5 12h-15m0 0l5.25-5.25M4.5 12l5.25 5.25" />
                                                            </svg>
                                                        </span>
                                                        <span class="ms-2 btn-inner--text">Edit</span>
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
                                <table id="all-expenses-table"
                                    class="table mb-0 align-items-center justify-content-center">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7">
                                                Transaction</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">
                                                Amount</th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">Date
                                            </th>
                                            <th class="text-xs text-secondary font-weight-semibold opacity-7 ps-2">
                                                Account</th>
                                            <th
                                                class="text-xs text-center text-secondary font-weight-semibold opacity-7">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allExpenses as $expense)
                                            <tr>
                                                <td>
                                                    <p class="mb-0 text-sm font-weight-normal">{{ $expense->description }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="mb-0 text-sm font-weight-normal">
                                                        ${{ number_format($expense->amount, 2) }}</p>
                                                </td>
                                                <td>
                                                    <span
                                                        class="mb-0 text-xs font-weight-normal">{{ \Carbon\Carbon::parse($expense->date)->format('d M Y') }}</span>
                                                </td>
                                                <td>
                                                    <div class="px-2 d-flex align-items-center">
                                                        <div class="my-2 avatar avatar-sm me-2">
                                                            <img src="{{ $expense->company->logo ? asset('storage/' . $expense->company->logo) : asset('assets/img/apple-icon.png') }}"
                                                                class="w-100" alt="{{ $expense->company->name }}">
                                                        </div>
                                                        <div class="my-auto">
                                                            <a href="{{ route('companies.show', $expense->company->id) }}"
                                                                class="text-dark text-decoration-none">
                                                                <h6 class="mb-0 text-sm">{{ $expense->company->name }}</h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('expenses.edit', $expense->id) }}"
                                                        class="mb-0 btn btn-sm btn-outline-secondary btn-icon d-flex align-items-center justify-content-center">
                                                        <span class="btn-inner--icon">
                                                            <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="d-block">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19.5 12h-15m0 0l5.25-5.25M4.5 12l5.25 5.25" />
                                                            </svg>
                                                        </span>
                                                        <span class="ms-2 btn-inner--text">Edit</span>
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
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('top-spending-chart').getContext('2d');

            // Function to generate a random color
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            // Generate colors for each company
            var companyCount = @json($companies->count());
            var colors = [];
            for (var i = 0; i < companyCount; i++) {
                colors.push(getRandomColor());
            }

            var topSpendingChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: @json($companies->pluck('name')),
                    datasets: [{
                        label: 'Amount Spent',
                        data: @json($companies->pluck('total_spending')),
                        backgroundColor: colors, // Use the array of random colors
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return tooltipItem.label + ': $' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>