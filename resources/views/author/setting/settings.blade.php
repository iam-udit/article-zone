
<!--========================== extend-master-blade ==========================-->
@extends('layouts.backend.app')

@section('title', 'Settings')

<!--========================== include content ==========================-->
@section('content')
    @include('common.base.setting.settings', ['prefix' => 'author'])
@endsection

@push('js')

@endpush
