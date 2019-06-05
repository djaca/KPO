<nav class="flex items-center justify-between flex-wrap p-6">
  <div class="flex items-center flex-shrink-0 mr-6">
    <a href="/">
      <span class="font-semibold text-xl tracking-tight">
        {{ config('app.name', 'Laravel') }}
      </span>
    </a>
  </div>

  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
    <div class="text-sm lg:flex-grow">
      <a href="{{ route('items.create') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-500 hover mr-4">
        Add item
      </a>

      <a href="{{ route('taxpayers.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-500 hover mr-4">
        Change taxpayer
      </a>
    </div>

    <download-pdf />
  </div>
</nav>
