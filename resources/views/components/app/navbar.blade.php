@props([
    'dark' => false,
])

<nav class=" px-0 mx-5 rounded shadow-none z-index-2 navbar navbar-main navbar-expand-lg" navbar-scroll="true"
    id="navbarBlur">
    <div class="container px-2 py-1 min-w-100">
        <!-- <nav aria-label="breadcrumb">
            <ol class="px-0 pt-1 pb-0 mb-1 bg-transparent breadcrumb me-sm-6 me-5">
                <li class="text-sm breadcrumb-item"><a
                        class="opacity-5 p-0 breadcrumb-text  {{ filter_var($dark, FILTER_VALIDATE_BOOLEAN) ? 'text-dark' : 'text-white' }} "
                        href="javascript:;">Dashboard</a></li>
                <li class="text-sm breadcrumb-item  breadcrumb-text {{ filter_var($dark, FILTER_VALIDATE_BOOLEAN) ? 'text-dark' : 'text-white' }}  active"
                    aria-current="page">Default</li>
            </ol>
            <h6
                class="mb-0 font-weight-bold breadcrumb-text  {{ filter_var($dark, FILTER_VALIDATE_BOOLEAN) ? 'text-dark' : 'text-white' }} ">
                Default</h6>
        </nav> -->
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-6" id="navbar">           
            <div class="mb-0 font-weight-bold breadcrumb-text text-white" style="
    width: 131px;>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="login" onclick="event.preventDefault();
                this.closest('form').submit();">
                        <button class="btn btn-sm  btn-white  mb-0 me-1" type="submit">Log out</button>
                    </a>
                </form>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="p-0 nav-link" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class=" bg-dark  sidenav-toggler-line"></i>
                            <i class=" bg-dark  sidenav-toggler-line"></i>
                            <i class=" bg-dark  sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                
                    <ul class="px-2 py-3 dropdown-menu dropdown-menu-end me-sm-n4" aria-labelledby="dropdownMenuButton">
                        
                        <li>
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="py-1 d-flex">
                                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                    fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background"
                                                                d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                opacity="0.593633743"></path>
                                                            <path class="color-background"
                                                                d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>                                    
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>               
                </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
