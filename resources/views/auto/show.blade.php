@extends('layouts.app')

@section('template_title')
    {{ $auto->name ?? 'Show Auto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Auto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('autos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $auto->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            {{ $auto->foto }}
                        </div>
                        <div class="form-group">
                            <strong>Marcaid:</strong>
                            {{ $auto->marcaId }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
