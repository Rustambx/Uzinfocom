@extends('layouts.site')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong></strong>
                    </div>
                    <div class="card-body card-block">
                        <h2>{{ $book->__('name') }}</h2>
                        <p>{{ $book->__('text') }}</p>

                        <div class="form-actions row">
                            <div class="col">
                                <a href="{{ route('books') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-times"></i>
                                    @lang('main.back')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
