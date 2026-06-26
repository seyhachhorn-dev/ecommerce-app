@extends('layout.backend')

@section('content')

<h1>Employee List</h1>

<a class="btn btn-primary" href="{{ url('/employee/create') }}">New</a>

<br><br>

@if(Session::has('employee_delete'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {!! session('employee_delete') !!}
</div>
@endif

@if(count($employees) > 0)

<div class="panel panel-default">

    <div class="panel-heading">
        All Employees
    </div>

    <div class="panel-body">

        <table id="myTable" class="table table-striped table-bordered">

            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Department</th>
                    <th>Salary</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>

                @foreach($employees as $employee)

                <tr>

                    <td>
                        <a href="{{ url('/employee/'.$employee->id) }}">
                            {{ $employee->FirstName }}
                        </a>
                    </td>

                    <td>
                        {{ $employee->LastName }}
                    </td>

                    <td>
                        {{ $employee->Department }}
                    </td>

                    <td>
                        {{ $employee->Salary }}
                    </td>

                    <td>
                        <a class="btn btn-primary"
                           href="{{ url('/employee/'.$employee->id.'/edit') }}">
                            Edit
                        </a>
                    </td>

                    <td>

                        {{ Html::form('DELETE','employee/'.$employee->id)->open() }}

                        <button class="btn btn-danger delete">
                            Delete
                        </button>

                        {{ Html::form()->close() }}

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<script>
    new DataTable('#myTable');

    $(".delete").click(function () {

        var form = $(this).closest("form");

        $('<div>Are you sure you want to delete this employee?</div>')
            .dialog({
                modal: true,
                title: "Delete Confirmation",
                buttons: {
                    Yes: function () {
                        $(this).dialog("close");
                        form.submit();
                    },
                    No: function () {
                        $(this).dialog("close");
                    }
                },
                close: function () {
                    $(this).remove();
                }
            });

        return false;
    });
</script>

@endif

@endsection