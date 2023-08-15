@include('admin.include.header')
<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" >
                @include('admin.include.nav')
                <div class="container-fluid ml-mr-3">
                    @yield('content')
                </div>
            </div>
            @include('admin.include.footer')
        </div>
    </div>