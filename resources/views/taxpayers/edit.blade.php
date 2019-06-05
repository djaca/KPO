@extends('layouts.app')

@section('content')
  @component('components.card')
    @slot('title')
      Edit taxpayer
    @endslot

    <form method="POST" action="{{ route('taxpayers.update', $taxpayer->id) }}" class="w-full max-w-xl">
      {{ method_field('PATCH') }}
      @include('taxpayers.form', compact('taxpayer'))
    </form>
  @endcomponent
@endsection
