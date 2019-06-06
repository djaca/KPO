<div class="mb-6">
  <div class="md:flex md:items-center">
    <div class="md:w-1/3">
      <label
        class="block text-gray-500 font-bold mb-1 pr-4 md:text-right md:mb-0"
        for="{{ $name }}"
      >
        {{ $label }}
      </label>
    </div>

    <div class="md:w-2/3">
      <input
        class="bg-gray-200 appearance-none rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-gray-400 {{ isset($error) ? 'border-2 border-red-300' : 'border-2 border-gray-200' }}"
        id="{{ $name }}"
        type="{{ isset($type) ? $type : 'text' }}"
        name="{{ $name }}"
        value="{{ $slot }}"
        {{ isset($step) ? 'step='.$step : null }}
      >
    </div>
  </div>

  @if(isset($error))
    <div class="flex">
      <div class="md:w-1/3"></div>
      <div class="text-red-500 text-xs">{{ $error }}</div>
    </div>
  @endif
</div>
