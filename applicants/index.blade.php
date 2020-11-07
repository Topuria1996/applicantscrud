@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Applicants CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('applicants.create') }}" title="Create a Applicant"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Position</th>
            <th>Phone</th>
            <th>Is_Hired</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($applicants as $applicant)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $applicant->id }}</td>
                <td>{{ $applicant->name }}</td>
                <td>{{ $applicant->surname }}</td>
                <td>{{ $applicant->position }}</td>
                <td>{{ $applicant->phone }}</td>
                <td>{{ $applicant->is_hired }}</td>
                <td>
                    <form action="{{ route('applicants.destroy', $applicant->id) }}" method="POST">

                        <a href="{{ route('applicants.show', $applicant->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('applicants.edit', $applicant->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $applicants->links() !!}

@endsection
