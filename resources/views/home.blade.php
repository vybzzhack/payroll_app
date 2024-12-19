@extends('layouts.app')

@section('content')


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        
        const departmentNames = @json($departmentNames);
        const employeeCounts = @json($employeeCounts);


        document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('employeeBarChart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: departmentNames, // Department names
                datasets: [{
                    label: 'Number of Employees',
                    data: employeeCounts, // Employee counts
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10, // Interval between tick marks
                    },
                    suggestedMax: 100, // Maximum value on the Y-axis
                }
            }
            }
            });
        });

    </script>

  
    <div class="container-fluid">
        <h1 class="text-center mb-4">Welcome {{ Auth::user()->name }}!</h1>
        

        <div class="row">
            <!-- Employees Card -->
            <div class="col-md-4 mb-4">
                <div class="card bg-primary">
                    <div class="card-body text-white d-flex justify-content-between align-items-center position-relative">
                        <div>
                            <h5 class="card-title">Employees</h5>
                            <p class="card-text display-4">{{ $employeeCount }}</p>
                        </div>
                        <div class="icon-background">
                            <i class="fas fa-users fa-5x"></i>
                        </div>
                        <div class="hover-text">
                            <a href="{{ route('employees.index') }}" class="text-white">View Employees</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Card -->
            <div class="col-md-4 mb-4">
                <div class="card bg-success">
                    <div class="card-body text-white d-flex justify-content-between align-items-center position-relative">
                        <div>
                            <h5 class="card-title">Users</h5>
                            <p class="card-text display-4">{{ $userCount }}</p>
                        </div>
                        <div class="icon-background">
                            <i class="fas fa-user-circle fa-5x"></i>
                        </div>
                        <div class="hover-text">
                            <a href="{{ route('users.index') }}" class="text-white">View Users</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payrolls Card -->
            <div class="col-md-4 mb-4">
                <div class="card bg-danger">
                    <div class="card-body text-white d-flex justify-content-between align-items-center position-relative">
                        <div>
                            <h5 class="card-title">Payrolls</h5>
                            <p class="card-text display-4">{{ $payrollCount }}</p>
                        </div>
                        <div class="icon-background">
                            <i class="fas fa-money-bill-wave fa-5x"></i>
                        </div>
                        <div class="hover-text">
                            <a href="{{ route('payrolls.index') }}" class="text-white">View Payrolls</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Departments Card -->
            <div class="col-md-4 mb-4">
                <div class="card bg-warning">
                    <div class="card-body text-white d-flex justify-content-between align-items-center position-relative">
                        <div>
                            <h5 class="card-title">Departments</h5>
                            <p class="card-text display-4">{{ $departmentCount }}</p>
                        </div>
                        <div class="icon-background">
                            <i class="fas fa-building fa-5x"></i>
                        </div>
                        <div class="hover-text">
                            <a href="{{ route('departments.index') }}" class="text-white">View Departments</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Leaves Card -->
            <div class="col-md-4 mb-4">
                <div class="card bg-info">
                    <div class="card-body text-white d-flex justify-content-between align-items-center position-relative">
                        <div>
                            <h5 class="card-title">Leaves</h5>
                            <p class="card-text display-4">{{ $leaveCount }}</p>
                        </div>
                        <div class="icon-background">
                            <i class="fas fa-plane-departure fa-5x"></i>
                        </div>
                        <div class="hover-text">
                            <a href="{{ route('leaves.index') }}" class="text-white">View Leaves</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance Card -->
            <div class="col-md-4 mb-4">
                <div class="card bg-secondary">
                    <div class="card-body text-white d-flex justify-content-between align-items-center position-relative">
                        <div>
                            <h5 class="card-title">Attendance</h5>
                            <p class="card-text display-4">{{ $attendanceTodayCount }}</p>
                        </div>
                        <div class="icon-background">
                            <i class="fas fa-calendar-check fa-5x"></i>
                        </div>
                        <div class="hover-text">
                            <a href="{{ route('attendances.index') }}" class="text-white">View Attendance</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-cards">
            <!-- Employee of the Month Card -->
            <div class="card employee-card">
                <h3>Employee of the Month</h3>
                <div class="employee-details">
                    <img src="{{ $employeeOfTheMonth->profile_picture ?? 'https://via.placeholder.com/100' }}" 
                        alt="Profile Picture" 
                        class="employee-img">
                    <div>
                        <p><strong>Name:</strong> {{ $employeeOfTheMonth->name ?? 'N/A' }}</p>
                        <p><strong>Role:</strong> {{ $employeeOfTheMonth->role ?? 'N/A' }}</p>
                        <p><strong>Department:</strong> {{ $employeeOfTheMonth->department->name ?? 'N/A' }}</p>
                    </div>
                </div>
                
            </div>

            <!-- Calendar Card -->
            <div class="card calendar-card">
                <h3>Event Calendar</h3>
                <div id="calendar"></div>
            </div>
        </div>



        <div class="card mt-4">
            <div class="card-header bg-info text-white">
                <h4>Number of Employees per Department</h4>
            </div>
            <div class="card-body">
                <canvas id="employeeBarChart" width="400" height="200"></canvas>
            </div>
        </div>

    </div>


    <style>
        .card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .icon-background {
            position: absolute;
            top: 10px;
            right: 10px;
            opacity: 0.1;
        }

        .hover-text {
            position: absolute;
            bottom: 10px;
            right: 10px;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .card:hover .hover-text {
            opacity: 1;
        }

        .card:hover .icon-background {
            opacity: 0;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .hover-text a {
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .card-header {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        canvas {
            margin-top: 20px;
        }
    </style>

@endsection
