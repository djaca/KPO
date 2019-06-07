@extends('layouts.app')

@section('content')
  @card(['title' => __('general.new_taxpayer')])
    <form method="POST" action="{{ route('taxpayers.store') }}" class="w-full max-w-xl">
      @include('taxpayers.form', compact('taxpayer'))
    </form>
  @endcard
@endsection
