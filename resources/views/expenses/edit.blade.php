<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0"
            style="background-image: url('../../../assets/img/bg-login.jpg'); background-position: bottom;">
        </div>
        <div class="px-5 py-4 container-fluid ">
            <div class="mt-5 mb-5 mt-lg-9 row justify-content-center"></div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert" id="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="mb-5 row justify-content-center">
                <div class="col-lg-9 col-12 ">
                    <div class="card " id="basic-info">
                        <div class="card-header">
                            <h5>Edit Expense</h5>
                            <p class="mb-0 text-sm">
                                Update expense details.
                            </p>
                        </div>
                        <div class="pt-0 card-body">
                            <form role="form" method="POST" action="{{ route('expenses.update', $expense->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control no-resize" id="description" required placeholder="Enter description" name="description"
                                        rows="1">{{ old('description', $expense->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control" id="amount" required placeholder="Enter amount" name="amount" value="{{ old('amount', $expense->amount) }}">
                                    @error('amount')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" required name="date" value="{{ old('date', $expense->date) }}">
                                    @error('date')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Company</label>
                                    <select class="form-control" id="company_id" name="company_id" required>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ $expense->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <a href="{{ route('expenses.index') }}" class="mt-6 mb-0 btn btn-white btn-sm float-start">
                                    Back to list
                                </a>
                                <button type="submit" class="mt-6 mb-0 btn btn-white btn-sm float-end">Save changes</button>
                                <a href="{{ route('expenses.invoice', $expense->id) }}" class="mt-6 mb-0 btn btn-primary btn-sm float-end me-2">Generate Invoice</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <x-app.footer />
    </main>
</x-app-layout>
