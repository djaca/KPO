@extends('layouts.app')

@section('content')
  @component('components.card')
    @slot('title')
      Add taxpayer
    @endslot

    <form method="POST" action="{{ route('taxpayers.store') }}" class="w-full max-w-xl">
      @include('taxpayers.form', compact('taxpayer'))
    </form>
  @endcomponent
@endsection
