<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0"
            style="background-image: url('../../../assets/img/bg-login.jpg'); background-position: bottom;">
        </div>
        <div class="px-5 py-4 container-fluid ">
            <div class="mt-5 mb-5 mt-lg-9 row justify-content-center">
            </div>
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
                            <h5>Edit Company</h5>
                            <p class="mb-0 text-sm">
                                Update company details.
                            </p>
                        </div>
                        <div class="pt-0 card-body">
                            <form role="form" method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Company Name</label>
                                    <textarea class="form-control no-resize" id="name" name="name" rows="1" required>{{ $company->name }}</textarea>
                                    @error('name')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Company address</label>
                                    <textarea class="form-control no-resize" id="address" name="address" rows="5" required>{{ $company->address }}</textarea>
                                    @error('address')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="website">Company Website</label>
                                    <input type="url" class="form-control" id="website" name="website" value="{{ $company->website }}">
                                    @error('website')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="logo">Company Logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo">
                                    @error('logo')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                    @if ($company->logo)
                                        <div class="mt-3">
                                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" style="max-width: 200px;">
                                        </div>
                                    @endif
                                </div>
                                <a href="{{ route('companies.index') }}"
                                    class="mt-6 mb-0 btn btn-white btn-sm float-start">
                                    Back to list
                                </a>
                                <button type="submit" class="mt-6 mb-0 btn btn-white btn-sm float-end">Save
                                    changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-app.footer />
    </main>
</x-app-layout>
