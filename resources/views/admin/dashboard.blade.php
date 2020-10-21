@extends('layouts.admin')
@section('content')
@card_style()
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <span class="text-capitalize">
                            Welcome
                        </span>
                        <span class="text-warning font-weight-bold">
                            {{Auth::user()->first_name ?? ''}}
                        </span>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection