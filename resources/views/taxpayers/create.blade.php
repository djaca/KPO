@extends('layouts.app')

@section('content')
  @card
    @slot('title')
      Add taxpayer
    @endslot

    <form method="POST" action="{{ route('taxpayers.store') }}" class="w-full max-w-xl">
      @include('taxpayers.form', compact('taxpayer'))
    </form>
  @endcard
@endsection
