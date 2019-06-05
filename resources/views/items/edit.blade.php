@extends('layouts.app')

@section('content')
  <div class="w-3/5 mx-auto">
    <form method="POST" action="{{ route('items.update', $item->id) }}" class="w-full max-w-xl">
      {{ method_field('PATCH') }}
      @include('items.form', compact('item'))
    </form>
  </div>
@endsection
