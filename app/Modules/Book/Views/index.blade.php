@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Vocabularies list -->
            <div class="card">
                <div class="card-header">
                    @lang('main.books')
                    <div class="nav-actions float-right">
                        <a href="{{ route('books.create') }}" class="btn btn-sm btn-outline-primary">
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
                            <th scope="col">@lang('main.price')</th>
                            <th scope="col">@lang('main.description')</th>
                            <th scope="col">@lang('main.author')</th>
                            <th scope="col">@lang('main.release_year')</th>
                            <th scope="col">@lang('main.show')</th>
                            <th scope="col">@lang('main.edit')</th>
                            <th scope="col">@lang('main.delete')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $item)
                            <tr>
                                <td>{{ $item->__('name') }}</td>
                                <td>${{ $item->price }}</td>
                                <td>{{ $item->__('description') }}</td>
                                <td>{{ $item->__('author') }}</td>
                                <td>{{ $item->release_year }}</td>
                                <td>
                                    <a href="{{ route('books.show', $item) }}" class="btn btn-success">@lang('main.show')</a>
                                </td>
                                <td>
                                    <a href="{{ route('books.edit', $item) }}" class="btn btn-primary">@lang('main.edit')</a>
                                </td>
                                <td>
                                    <form action="{{ route('books.delete', $item) }}" method="post">
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

