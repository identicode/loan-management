@extends('layouts.app')

@section('html-title', 'Borrower')


@section('css')

@endsection

@section('page-title', 'Borrower')

@section('main-content')

    @if(session('success'))

    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ session('success') }}
    </div>

    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="box" id="office-whirl">
                <div class="box-header with-border">
                    <h3 class="box-title">Borrower List</h3>
                    <a href="{{ route('borrower.create') }}" class="btn bg-olive btn-xs btn-flat pull-right"><i class="fa fa-plus"></i> Add New Borrower</a>
                </div>
                <div class="box-body">
                    <table id="dataTables" class="table table-stripped table-hover table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($borrowers as $borrower)

                            <tr>
                                <td>1</td>
                                <td>
                                    <a href="{{ route('borrower.show', ['id' => $borrower->id]) }}">
                                        {{ $borrower->fname }} {{ $borrower->lname }}
                                    </a>
                                </td>
                                <td>{{ $borrower->address }}</td>
                                <td>
                                    <a href="{{ route('borrower.edit', ['id' => $borrower->id]) }}" class="btn btn-flat btn-warning btn-xs"><i class="fa fa-edit"> Edit</i></a>
                                    <button onclick="deleteBorrower('{{ $borrower->id }}')" class="btn btn-flat btn-danger btn-xs"><i class="fa fa-trash"> Delete</i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#dataTables').DataTable();
    })
</script>
<script>

        function deleteBorrower(id)
        {
            if(confirm('Delete this borrower?')){
                window.location = `/borrower/${id}/delete`;
            }
        }
    </script>
@endsection
