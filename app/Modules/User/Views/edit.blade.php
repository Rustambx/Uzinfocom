@extends('layouts.site')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        @include('includes.error_messages')
                        <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.name')</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="name" value="{{ $user->name }}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="email" id="title" name="email" value="{{ $user->email }}" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.password')</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="title" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.password_confirmation')</label></div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="title" name="password_confirmation" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">@lang('main.roles')</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="role_id" id="roles">
                                        <option value="0">@lang('main.select_role')</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-actions row">
                                <div class="col">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-check"></i>
                                        @lang('main.save')
                                    </button>
                                    <a href="{{ route('users') }}" class="btn btn-outline-secondary">
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
