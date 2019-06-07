@extends('layouts.app')

@section('content')
  <taxpayers
    :items="{{ $taxpayers }}"
    inline-template
  >
    <div class="flex h-screen">
      @card(['title' => 'Izaberi obveznika'])
        <div
          v-for="taxpayer in taxpayers"
          :key="taxpayer.id"
          class="flex justify-between"
        >
          <div
            class="w-full cursor-pointer"
            :class="{ 'text-blue-500': selected === taxpayer.id }"
            @click="select(taxpayer.id)"
            v-text="taxpayer.name"
          ></div>

          <div
            class="flex justify-between w-8"
          >
            <a
              :href="'/taxpayers/' + taxpayer.id + '/edit'"
              class="rounded text-blue-500 text-sm"
            >
              <i class="fas fa-edit"></i>
            </a>

            <button
              class="rounder text-red-500 text-sm"
              @click="remove(taxpayer.id)"
            >
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <div
          class="flex justify-between items-center mt-6"
        >
          <a
            href="{{ route('taxpayers.create') }}"
            class="text-green-500"
          >
            <i class="fas fa-plus"></i>
          </a>

          <button
            @click="choose"
            class="btn btn-blue"
          >
            Izaberi
          </button>
        </div>
      @endcard
    </div>
  </taxpayers>
@endsection
