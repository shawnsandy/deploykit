@extends("deploys::layout.layout")

@section('page_title', 'DeployKit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="btn btn-block btn-lg btn-success lead text-capitalize">
                    {{ $message }}
                </div>
            </div>
        </div>
    </div>
@endsection
