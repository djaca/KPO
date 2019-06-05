@csrf

<div class="mb-6">
  <div class="flex items-center ">
    <div class="w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="pib">
        PIB
      </label>
    </div>
    <div class="w-2/3">
      <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-gray-400"
        id="pib" type="number" name="pib" value="{{ old('pib', $taxpayer->pib) }}">
    </div>
  </div>
  @if($errors->has('pib'))
    <div class="flex">
      <div class="w-1/3"></div>
      <div class="text-red-500 text-xs italic">{{ $errors->first('pib') }}</div>
    </div>
  @endif
</div>

<div class="mb-6">
  <div class="flex items-center ">
    <div class="w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="obveznik">
        Obveznik
      </label>
    </div>
    <div class="w-2/3">
      <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-gray-400"
        id="obveznik" type="text" name="obveznik" value="{{ old('obveznik', $taxpayer->obveznik) }}">
    </div>
  </div>
  @if($errors->has('obveznik'))
    <div class="flex">
      <div class="w-1/3"></div>
      <div class="text-red-500 text-xs italic">{{ $errors->first('obveznik') }}</div>
    </div>
  @endif
</div>

<div class="mb-6">
  <div class="flex items-center ">
    <div class="w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="sediste">
        Sediste
      </label>
    </div>
    <div class="w-2/3">
      <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-gray-400"
        id="sediste" type="text" name="sediste" value="{{ old('sediste', $taxpayer->sediste) }}">
    </div>
  </div>
  @if($errors->has('sediste'))
    <div class="flex">
      <div class="w-1/3"></div>
      <div class="text-red-500 text-xs italic">{{ $errors->first('sediste') }}</div>
    </div>
  @endif
</div>

<div class="mb-6">
  <div class="flex items-center ">
    <div class="w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="sifra_poreskog_obveznika">
        Sifra poreskog obveznika
      </label>
    </div>
    <div class="w-2/3">
      <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-gray-400"
        id="sifra_poreskog_obveznika" type="text" name="sifra_poreskog_obveznika" value="{{ old('sifra_poreskog_obveznika', $taxpayer->sifra_poreskog_obveznika) }}">
    </div>
  </div>
  @if($errors->has('sifra_poreskog_obveznika'))
    <div class="flex">
      <div class="w-1/3"></div>
      <div class="text-red-500 text-xs italic">{{ $errors->first('sifra_poreskog_obveznika') }}</div>
    </div>
  @endif
</div>

<div class="mb-6">
  <div class="flex items-center ">
    <div class="w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="sifra_delatnosti">
        Sifra delatnosti
      </label>
    </div>
    <div class="w-2/3">
      <input
        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-gray-400"
        id="sifra_delatnosti" type="text" name="sifra_delatnosti" value="{{ old('sifra_delatnosti', $taxpayer->sifra_delatnosti) }}">
    </div>
  </div>
  @if($errors->has('sifra_delatnosti'))
    <div class="flex">
      <div class="w-1/3"></div>
      <div class="text-red-500 text-xs italic">{{ $errors->first('sifra_delatnosti') }}</div>
    </div>
  @endif
</div>

<div class="md:flex md:items-center">
  <div class="md:w-1/3"></div>
  <div class="md:w-2/3">
    <button class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-1 px-4 rounded" type="submit">
      {{ $taxpayer->id ? 'Update' : 'Save' }}
    </button>

    <a href="{{ route('taxpayers.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
      Cancel
    </a>
  </div>
</div>
