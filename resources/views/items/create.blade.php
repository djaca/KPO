@extends('layouts.app')

@section('content')
  @card(['title' => __('general.new_item')])
    <form method="POST" action="{{ route('items.store') }}" class="w-full max-w-xl">
      @include('items.form', compact('item'))
    </form>
  @endcard
@endsection
