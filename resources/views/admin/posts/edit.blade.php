@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h1>Edit Loan</h1></div>
                    <div class="card-body">

                        <br/>
                        <br/>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/posts/' . $post->id) }}" accept-charset="UTF-8"
                              class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            @include ('admin.posts.form', ['formMode' => 'edit'])

                        </form>
                        <a href="{{ url('/admin/posts') }}" title="Back">
                            <button class="btn btn-light btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
