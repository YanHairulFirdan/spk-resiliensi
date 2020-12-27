@extends('admin.layouts')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Perbaharui data aspek</div>
                <div class="card-body">
                    <form action="/admin/quisioner" class="form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question">pertanyaan</label>
                            <textarea class="form-control" rows="3" name="question">
                            {{ old('question') ? old('question') : $quisioner->question }}
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-large btn-primary">Perbaharui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
