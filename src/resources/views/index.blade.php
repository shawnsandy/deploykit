@extends("deploys::layout.layout")

@section('title', 'DeployKit')

@section('page_title', 'DeployKit')

@section('content')

    <div class="container">

            @include('deploys::components.connections')
            @include("deploys::components.deployment-responses")

    </div>

@endsection

