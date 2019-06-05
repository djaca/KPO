<div class="flex h-screen">
  <div class="m-auto rounded shadow-lg w-1/2">
    <div class="px-6 py-4">
      <div class="font-medium text-center text-lg mb-6">
        {{ $title }}
      </div>

      <div class="text-gray-700 text-base">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>
