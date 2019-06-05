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
      <a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-teal-500 hover mr-4">
        Add item
      </a>

      <a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-teal-500 hover mr-4">
        Change taxpayer
      </a>
    </div>

    <div>
      <a href="#"
         download
         class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
      >
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
        </svg>

        <span>PDF</span>
      </a>
    </div>
  </div>
</nav>
