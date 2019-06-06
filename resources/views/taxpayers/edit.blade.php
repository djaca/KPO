@extends('layouts.app')

@section('content')
  @card(['title' => 'Edit taxpayer'])
    <form method="POST" action="{{ route('taxpayers.update', $taxpayer->id) }}" class="w-full max-w-xl">
      {{ method_field('PATCH') }}
      @include('taxpayers.form', compact('taxpayer'))
    </form>
  @endcard
@endsection
