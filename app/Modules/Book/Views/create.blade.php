@extends('layouts.site')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        @include('includes.error_messages')
                        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate>
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.name')</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="name" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.name') en</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="name_en" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.price')</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="price" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.description')</label></div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description" id="" cols="70" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.description') en</label></div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description_en" id="" cols="70" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.text')</label></div>
                                <div class="col-12 col-md-9">
                                    <textarea name="text" id="" cols="100" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.text') en</label></div>
                                <div class="col-12 col-md-9">
                                    <textarea name="text_en" id="" cols="100" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.author')</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="author" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.author') en</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="author_en" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.release_year')</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="release_year" class="form-control">
                                </div>
                            </div>

                            <div class="form-actions row">
                                <div class="col">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-check"></i>
                                        @lang('main.save')
                                    </button>
                                    <a href="{{ route('books') }}" class="btn btn-outline-secondary">
                                        <i class="fa fa-times"></i>
                                        @lang('main.cancel')
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
