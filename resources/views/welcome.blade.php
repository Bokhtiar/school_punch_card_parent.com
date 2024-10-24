@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Punchin <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $punchIn }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Puncin</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">



                            <div class="card-body">
                                <h5 class="card-title">Punch out <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $punchOut }}</h6>
                                        <span class="text-muted small pt-2 ps-1">punch out</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Total Student <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $students }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Student</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->



                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Punch Recent Activity <span>| latest</span></h5>
                        <div class="activity">
                            @foreach ($activities as $activity)
                                <div class="activity-item d-flex">
                                    <div class="activite-label">
                                        {{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}
                                    </div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content m-0 p-0">
                                        <!-- Check if parent exists -->
                                        @if ($activity->guardian_id)
                                            <strong>Parent:</strong> {{ $activity->guardian->name }} <br>
                                            <!-- Check if student exists -->
                                            @if ($activity->guardian->student)
                                                <strong>Student:</strong> {{ $activity->guardian->student->first_name }}
                                            @else
                                                <span class="text-muted">No student information available</span>
                                            @endif
                                        @else
                                            <span class="text-muted">No parent information available</span>
                                        @endif
                                        <p> <strong>Punch {{ ucfirst($activity->punch_type) }}:</strong>
                                            {{ \Carbon\Carbon::parse($activity->punch_time)->format('H:i:s') }}</p>
                                    </div>
                                </div><!-- End activity item-->
                            @endforeach
                        </div>
                    </div>
                </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection
