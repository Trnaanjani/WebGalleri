@extends('admin.layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Dashboard Admin</h3>
    </div>

    <!-- Statistik Cards -->
    <div class="row">
        <!-- Galeri Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Galeri Sekolah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahGaleri }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Agenda Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Agenda Sekolah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahAgenda }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Informasi Sekolah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahInformasi }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Admin Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Admin
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahAdmin }}</div>
                </div>
                <div class="col-auto">
                <i data-feather="users" class="text-gray-300"></i>

                        </div>
            </div>
        </div>
    </div>
</div>


    <!-- Preview Website -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-globe mr-2"></i>Preview Website
            </h6>
        </div>
        <div class="card-body p-0">
            <iframe src="{{ route('home') }}" style="width: 100%; height: 600px; border: none;"></iframe>
        </div>
    </div>
</div>

<style>
.card {
    transition: all .3s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}

.border-left-primary {
    border-left: 4px solid #4e73df;
}

.border-left-success {
    border-left: 4px solid #1cc88a;
}

.border-left-info {
    border-left: 4px solid #36b9cc;
}

.border-left-warning {
    border-left: 4px solid #f6c23e;
}

.text-gray-300 {
    color: #dddfeb!important;
}

.text-gray-800 {
    color: #5a5c69!important;
}

.shadow {
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
}

.card-header {
    background-color: #f8f9fc;
    border-bottom: 1px solid #e3e6f0;
}

.font-weight-bold {
    font-weight: 700!important;
}

.text-xs {
    font-size: .7rem;
}

iframe {
    border-radius: 0 0 .35rem .35rem;
}
</style>
@endsection
