@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Vocabularies list -->
            <div class="card">
                <div class="card-header">
                    @lang('main.users')
                    <div class="nav-actions float-right">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus"></i>
                            @lang('main.add')
                        </a>
                    </div>
                </div>
                @include('includes.result_messages')

                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">@lang('main.name')</th>
                            <th scope="col">Email</th>
                            <th scope="col">@lang('main.roles')</th>
                            <th scope="col">@lang('main.edit')</th>
                            <th scope="col">@lang('main.delete')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @foreach($item->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $item) }}" class="btn btn-primary">@lang('main.edit')</a>
                                </td>
                                <td>
                                    <form action="{{ route('users.delete', $item) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">@lang('main.delete')</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

