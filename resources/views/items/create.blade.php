@extends('layouts.app')

@section('content')
  @card(['title' => 'Add item'])
    <form method="POST" action="{{ route('items.store') }}" class="w-full max-w-xl">
      @include('items.form', compact('item'))
    </form>
  @endcard
@endsection
