@extends('layouts.app')

@section('content')
  @card(['title' => 'Novi obveznik'])
    <form method="POST" action="{{ route('taxpayers.store') }}" class="w-full max-w-xl">
      @include('taxpayers.form', compact('taxpayer'))
    </form>
  @endcard
@endsection
