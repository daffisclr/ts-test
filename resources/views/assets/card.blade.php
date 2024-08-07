<div class="row">
    <!-- Jumlah Alumni JTIK (Total) -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Jumlah Alumni JTIK PNJ') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['users'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Jumlah Alumni JTIK Teknik Informatika --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Jumlah Alumni Teknik Informatika') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['alumni_ti'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Jumlah Alumni JTIK Teknik Multimedia Jaringan --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Jumlah Alumni Teknik Multimedia Jaringan') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['alumni_tmj'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Jumlah Alumni JTIK Teknik Multimedia Digital --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Jumlah Alumni Teknik Multimedia Digital') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['alumni_tmd'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Jumlah Alumni JTIK Teknik Komputer Jaringan --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Jumlah Alumni Teknik Komputer Jaringan') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['alumni_tkj'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Jumlah Responden Tracer Study Alumni (total) --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Responden Tracer Study') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['count_ts'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Rata - rata pendapatan alumni --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Rata-rata Pendapatan Alumni') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['pendapatan'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Rata - rata Masa Tunggu Kerja Alumni --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Rata-rata Masa Tunggu Kerja Alumni') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['masa_tunggu'] }} Bulan</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-calendar-days fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
