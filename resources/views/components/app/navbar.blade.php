@props([
    'dark' => false,
])

<nav class=" px-0 mx-5 rounded shadow-none z-index-2 navbar navbar-main navbar-expand-lg" navbar-scroll="true"
    id="navbarBlur">
    <div class="container px-2 py-1 min-w-100">        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    
                </div>
            </div>
            <div class="mb-0 font-weight-bold breadcrumb-text text-white">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="login" onclick="event.preventDefault();
                this.closest('form').submit();">
                        <button class="btn btn-sm  btn-white  mb-0 me-1" type="submit">Log out</button>
                    </a>
                </form>
            </div>            
        </div>
    </div>
</nav>
