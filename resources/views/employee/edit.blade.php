@extends('layout.backend')

@section('content')
<main>
    <div class="container-fluid">

        <h1 class="mt-4">Edit Employee</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('/employee') }}">View All Employees</a>
            </li>
            <li class="breadcrumb-item active">
                Edit Employee
            </li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">

                @if(Session::has('employee_update'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {!! session('employee_update') !!}
                </div>
                @endif

                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Something went wrong.</strong>
                    <br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{ Html::modelForm($employee, 'PUT', route('employee.update', $employee->id))->open() }}

                {!! Html::label('First Name', 'FirstName') !!}
                {!! Html::text('FirstName', null)->class('form-control') !!}

                <br>

                {!! Html::label('Last Name', 'LastName') !!}
                {!! Html::text('LastName', null)->class('form-control') !!}

                <br>

                {!! Html::label('Department', 'Department') !!}
                {!! Html::text('Department', null)->class('form-control') !!}

                <br>

                {!! Html::label('Salary', 'Salary') !!}
                {!! Html::number('Salary', null)->class('form-control') !!}

                <br>

                {{ Html::submit('Update')->class('btn btn-primary') }}

                <a class="btn btn-secondary" href="{{ url('/employee') }}">
                    Back
                </a>

                {!! Html::closeModelForm() !!}

            </div>
        </div>

    </div>
</main>
@endsection