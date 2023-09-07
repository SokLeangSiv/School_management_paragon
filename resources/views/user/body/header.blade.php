@php 

$id = auth()->user()->id;
$data = App\Models\User::find($id);

@endphp

<nav class="navbar navbar-expand-sm navbar-light bg-light shadow">
    <div class="container-fluid">
        <div class="menu_btn">

            <i class="fa-solid fa-bars"></i>

        </div>


        {{-- sidebar --}}
        @include('user.body.sidebar')
        {{-- end sidebar --}}

        <a class="navbar-brand text-warning-emphasis fs-2 fw-bolder" href="{{ route('get.dashboard') }}">Ora<span
                class="text-info">Gon</span></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ms-auto me-5 mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-lg-4 fw-bolder fs-5 text-info mt-lg-3 mt-md-5 mt-sm-3 mt-lg-3 name"
                        href="#" aria-current="page">{{ auth()->user()->name }}<span
                            class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <img src="{{ !empty($data->photo) ? url('upload/img/user/'.$data->photo) : url('upload/no_image.jpg') }}"
                        class="img-fluid rounded-circle mt-lg-0 mt-md-4 me-lg-5 me-md-4 me-sm-4 me-4 img" alt=""
                        style="width: 70px; height: 70px;">
                </li>
                <li class="nav-item ">
                    <a class="nav-link active mt-lg-3  mt-md-1 mt-sm-0  " href="#" aria-current="page"><a href=""
                            class="text-decoration-none  "><span class="d-lg-none d-md-none"><br></span><i
                                class="fa-solid fa-bell text-secondary fs-4 pt-md-2 ms-md-4 mt-md-4 mt-lg-0 "></i> <span
                                class="d-lg-none d-md-none ps-4 fw-bolder fs-3 d-sm-none text-secondary"> Notification</span></a>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link me-lg-5 ms-lg-5 ms-md-5    mt-sm-4  mt-lg-3 " href="#"
                        id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><br></span>
                        <i class="fa-solid fa-user fs-3 text-secondary d-sm-block  d-lg-block d-md-block ms-sm-4 i"></i>
                        <span class="d-lg-none d-md-none  fw-bolder fs-3 d-sm-none text-secondary ps-4 pro"> Profile</span>
                        </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item pt-lg-3  pb-lg-3 ps-lg-4" href="{{ route('get.profile') }}">Profile</a>
                        <a class="dropdown-item pt-lg-3  pb-lg-3 ps-lg-4" href="{{ route('user.logout') }}">Logout</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</nav>
