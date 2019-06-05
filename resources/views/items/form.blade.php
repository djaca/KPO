{{ csrf_field() }}

<div class="mb-6">
  <div class="flex items-center ">
    <div class="w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Datum
      </label>
    </div>
    <div class="w-2/3">
      <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-gray-400"
        id="inline-full-name" type="date" name="date" value="{{ old('date', $item->date) }}">
    </div>
  </div>
@if($errors->has('date'))
    <div class="flex">
      <div class="w-1/3"></div>
      <div class="text-red-500 text-xs italic">{{ $errors->first('date') }}</div>
    </div>
  @endif
</div>

<div class="mb-6">
  <div class="flex items-center">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Opis
      </label>
    </div>
    <div class="md:w-2/3">
      <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-gray-400"
        id="inline-full-name" type="text" name="description" value="{{ old('description', $item->description) }}">
    </div>
  </div>
@if($errors->has('description'))
    <div class="flex">
      <div class="w-1/3"></div>
      <div class="text-red-500 text-xs italic">{{ $errors->first('description') }}</div>
    </div>
  @endif
</div>

<div class="mb-6">
  <div class="flex items-center">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Prihod od proizvoda
      </label>
    </div>
    <div class="md:w-2/3">
      <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-gray-400"
        id="inline-full-name" type="number" name="product_value" placeholder="0" value="{{ old('product_value', $item->product_value) }}" step="0.01">
    </div>
  </div>

@if($errors->has('product_value'))
    <div class="flex">
      <div class="w-1/3"></div>
      <div class="text-red-500 text-xs italic">{{ $errors->first('product_value') }}</div>
    </div>
  @endif
</div>

<div class="mb-6">
  <div class="flex items-center">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Prihod od usluga
      </label>
    </div>
    <div class="md:w-2/3">
      <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-gray-400"
        id="inline-full-name" type="number" name="service_value" placeholder="0" value="{{ old('service_value', $item->service_value) }}" step="0.01">
    </div>
  </div>

@if($errors->has('service_value'))
    <div class="flex">
      <div class="w-1/3"></div>
      <div class="text-red-500 text-xs italic">{{ $errors->first('service_value') }}</div>
    </div>
  @endif
</div>

<div class="md:flex md:items-center">
  <div class="md:w-1/3"></div>
  <div class="md:w-2/3">
    <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-1 px-4 rounded" type="submit">
      {{ $item->id ? 'Update' : 'Save' }}
    </button>

    <a href="{{ route('home') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
      Cancel
    </a>
  </div>
</div>
