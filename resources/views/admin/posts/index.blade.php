@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('flash_message'))
                <div class="col-md-12 alert alert-success">
                    {{ session('flash_message') }}
                </div>
            @endif

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h1>All Loans</h1></div>
                    <div class="card-body">
                        <a href="{{ url('/admin/posts/create') }}" class="btn btn-primary btn-sm" title="Add New Post">
                            Add New Loan
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Loan Amount</th>
                                    <th>Loan Term</th>
                                    <th>Interest Rate</th>
                                    <th>Created at</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ number_format(($item->loanAmount), 2) }} ฿</td>
                                        <td>{{ $item->loanTerm }} Years</td>
                                        <td>{{ number_format(($item->interestRate), 2) }} %</td>
                                        <td>{{ date_format($item->created_at,"Y-m-d H:i:s") }} </td>
                                        <td>
                                            <a href="{{ url('/admin/posts/' . $item->id) }}" title="View Post">
                                                <button class="btn btn-primary btn-sm"> View</button>
                                            </a>
                                            <a href="{{ url('/admin/posts/' . $item->id . '/edit') }}"
                                               title="Edit Post">
                                                <button class="btn btn-success btn-sm"> Edit</button>
                                            </a>

                                            <form method="POST" action="{{ url('/admin/posts' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Post"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div
                                class="pagination-wrapper"> {!! $posts->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
