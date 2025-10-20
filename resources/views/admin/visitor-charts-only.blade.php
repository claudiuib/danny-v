@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    'Visitor Analytics' => false,
  ];
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <section class="header-operation animated fadeInDown">
        <h1 class="h3 mb-0">
            Visitor Analytics
        </h1>
        <p class="mb-0">Website visitor statistics and analytics</p>
    </section>
@endsection

@section('content')
@php
    $totalVisitors = \App\Models\Visitor::count();
    $uniqueVisitors = \App\Models\Visitor::where('is_unique', true)->count();
    $todayVisitors = \App\Models\Visitor::whereDate('created_at', today())->count();
    $thisWeekVisitors = \App\Models\Visitor::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
    
    // Get visitor data for the last 7 days
    $last7Days = [];
    for ($i = 6; $i >= 0; $i--) {
        $date = now()->subDays($i);
        $visitors = \App\Models\Visitor::whereDate('created_at', $date)->count();
        $last7Days[] = [
            'date' => $date->format('M d'),
            'visitors' => $visitors
        ];
    }
    
    // Get visitor data for the last 30 days
    $last30Days = [];
    for ($i = 29; $i >= 0; $i--) {
        $date = now()->subDays($i);
        $visitors = \App\Models\Visitor::whereDate('created_at', $date)->count();
        $last30Days[] = [
            'date' => $date->format('M d'),
            'visitors' => $visitors
        ];
    }
    
    $topPages = \App\Models\Visitor::select('page_visited')
        ->selectRaw('COUNT(*) as visit_count')
        ->groupBy('page_visited')
        ->orderBy('visit_count', 'desc')
        ->limit(5)
        ->get();
        
    // Get location data
    $locations = \App\Models\Visitor::select('country', 'city')
        ->whereNotNull('country')
        ->selectRaw('COUNT(*) as visitor_count')
        ->groupBy('country', 'city')
        ->orderBy('visitor_count', 'desc')
        ->limit(10)
        ->get();
        
    // Get hourly data for today
    $hourlyData = [];
    for ($i = 0; $i < 24; $i++) {
        $visitors = \App\Models\Visitor::whereDate('created_at', today())
            ->whereRaw('HOUR(created_at) = ?', [$i])
            ->count();
        $hourlyData[] = [
            'hour' => sprintf('%02d:00', $i),
            'visitors' => $visitors
        ];
    }
@endphp

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title">Total Visitors</h5>
                <h2 class="mb-0">{{ $totalVisitors }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title">Unique Visitors</h5>
                <h2 class="mb-0">{{ $uniqueVisitors }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title">Today</h5>
                <h2 class="mb-0">{{ $todayVisitors }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5 class="card-title">This Week</h5>
                <h2 class="mb-0">{{ $thisWeekVisitors }}</h2>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Visitors Last 7 Days</h5>
            </div>
            <div class="card-body">
                <canvas id="visitorsChart7Days" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Today's Visitors by Hour</h5>
            </div>
            <div class="card-body">
                <canvas id="hourlyChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Visitors Last 30 Days</h5>
            </div>
            <div class="card-body">
                <canvas id="visitorsChart30Days" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Visitors by Location</h5>
            </div>
            <div class="card-body">
                <canvas id="locationChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Top Visited Pages</h5>
            </div>
            <div class="card-body">
                @if($topPages->count() > 0)
                    <ul class="list-unstyled mb-0">
                        @foreach($topPages as $page)
                            <li class="d-flex justify-content-between">
                                <span>{{ $page->page_visited }}</span>
                                <span class="badge badge-primary">{{ $page->visit_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">No page visits recorded yet.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Recent Activity</h5>
            </div>
            <div class="card-body">
                @php
                    $recentVisitors = \App\Models\Visitor::orderBy('last_visit', 'desc')->limit(5)->get();
                @endphp
                @if($recentVisitors->count() > 0)
                    <ul class="list-unstyled mb-0">
                        @foreach($recentVisitors as $visitor)
                            <li class="d-flex justify-content-between">
                                <span>{{ $visitor->page_visited }} ({{ $visitor->country }})</span>
                                <small class="text-muted">{{ $visitor->last_visit ? $visitor->last_visit->diffForHumans() : 'Never' }}</small>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">No recent visitors.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// 7 Days Chart
const ctx7Days = document.getElementById('visitorsChart7Days').getContext('2d');
new Chart(ctx7Days, {
    type: 'line',
    data: {
        labels: {!! json_encode(array_column($last7Days, 'date')) !!},
        datasets: [{
            label: 'Visitors',
            data: {!! json_encode(array_column($last7Days, 'visitors')) !!},
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// 30 Days Chart
const ctx30Days = document.getElementById('visitorsChart30Days').getContext('2d');
new Chart(ctx30Days, {
    type: 'bar',
    data: {
        labels: {!! json_encode(array_column($last30Days, 'date')) !!},
        datasets: [{
            label: 'Visitors',
            data: {!! json_encode(array_column($last30Days, 'visitors')) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Hourly Chart
const ctxHourly = document.getElementById('hourlyChart').getContext('2d');
new Chart(ctxHourly, {
    type: 'bar',
    data: {
        labels: {!! json_encode(array_column($hourlyData, 'hour')) !!},
        datasets: [{
            label: 'Visitors',
            data: {!! json_encode(array_column($hourlyData, 'visitors')) !!},
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Location Chart
const ctxLocation = document.getElementById('locationChart').getContext('2d');
new Chart(ctxLocation, {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($locations->pluck('country')->toArray()) !!},
        datasets: [{
            data: {!! json_encode($locations->pluck('visitor_count')->toArray()) !!},
            backgroundColor: [
                '#FF6384',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0',
                '#9966FF',
                '#FF9F40',
                '#FF6384',
                '#C9CBCF',
                '#4BC0C0',
                '#FF6384'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            }
        }
    }
});
</script>
@endsection
