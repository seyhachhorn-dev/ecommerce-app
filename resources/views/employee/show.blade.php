@extends('layout.backend')

@section('content')

<main>

    <div class="container-fluid">

        <h1>Show Employee</h1>

        <div class="card">

            <div class="card-body">

                <p><strong>First Name:</strong> {{ $employee->FirstName }}</p>

                <p><strong>Last Name:</strong> {{ $employee->LastName }}</p>

                <p><strong>Department:</strong> {{ $employee->Department }}</p>

                <p><strong>Salary:</strong> {{ $employee->Salary }}</p>

            </div>

        </div>

        <br>

        <a href="{{ url('/employee') }}" class="btn btn-secondary">
            Back
        </a>

    </div>

</main>

@endsection