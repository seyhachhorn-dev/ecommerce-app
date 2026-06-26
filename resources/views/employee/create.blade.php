@extends('layout.backend')

@section('content')
<main>
    <div class="container-fluid">

        <h1 class="mt-4">Create Employee</h1>

        <div class="card mb-4">
            <div class="card-body">

                @if(Session::has('employee_create'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {!! session('employee_create') !!}
                </div>
                @endif

                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Something went wrong.</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {!! Html::form('POST','/employee')->open() !!}

                {!! Html::label('First Name','FirstName') !!}
                {!! Html::text('FirstName',null)->class('form-control') !!}

                <br>

                {!! Html::label('Last Name','LastName') !!}
                {!! Html::text('LastName',null)->class('form-control') !!}

                <br>

                {!! Html::label('Department','Department') !!}
                {!! Html::text('Department',null)->class('form-control') !!}

                <br>

                {!! Html::label('Salary','Salary') !!}
                {!! Html::number('Salary',null)->class('form-control') !!}

                <br>

                {{ Html::submit('Create')->class('btn btn-primary') }}

                <a href="{{ url('/employee') }}" class="btn btn-secondary">
                    Back
                </a>

                {{ Html::form()->close() }}

            </div>
        </div>

    </div>
</main>
@endsection