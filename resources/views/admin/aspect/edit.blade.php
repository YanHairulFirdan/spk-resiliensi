@extends('admin.layouts')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Perbaharui data aspek {{ $aspect->aspect }}</div>
                <div class="card-body">
                    @include(
                        'admin.aspect.shared.form', 
                        [
                            'aspect' => $aspect, 
                            'action' => route('admin.aspect.update', $aspect), 
                            'type' => 'PUT',
                            'buttonText' => 'Perbaharui',
                        ]
                    )
                </div>
            </div>
        </div>
    </div>
@endsection
