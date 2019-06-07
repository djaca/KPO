@extends('layouts.app')

@section('content')
  @card(['title' => __('general.edit_item')])
    <form method="POST" action="{{ route('items.update', $item->id) }}" class="w-full max-w-xl">
      {{ method_field('PATCH') }}
      @include('items.form', compact('item'))
    </form>
  @endcard
@endsection
