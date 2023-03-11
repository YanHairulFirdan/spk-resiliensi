@extends('admin.layouts')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Perbaharui data aspek</div>
                <div class="card-body">
                    @include(
                        'admin.aspect.shared.form', 
                        [
                            'aspect' => $aspect,
                            'action' => route('admin.aspect.store'), 
                            'type' => 'POST',
                            'buttonText' => 'Simpan',
                        ]
                    )
                </div>
            </div>
        </div>
    </div>
@endsection
