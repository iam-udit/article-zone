@extends('layouts.backend.app')

@section('title', 'Article Subscriber')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL SUBSCRIBERS
                            <span class="badge bg-color-black-gray">{{ $subscribers->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead class="bg-color-black-gray">
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="text-color-black">
                                @foreach($subscribers as $key=>$subscriber)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $subscriber->email }}</td>
                                        <td>{{ $subscriber->created_at }}</td>
                                        <td>{{ $subscriber->updated_at }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-xs bg-deep-orange waves-effect"
                                                    title="Delete" onclick="deleteItem({{ $subscriber->id }})">
                                                <i class="material-icons action-icon">delete</i>
                                            </button>
                                            <form action="{{ route('admin.subscriber.destroy', $subscriber->id) }}"
                                              id="delete-form-{{ $subscriber->id }}" class="form-hide" method="POST">
                                                @csrf
                                                @method('DELETE')
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
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')

@endpush
