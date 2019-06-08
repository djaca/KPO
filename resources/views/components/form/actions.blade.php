<div class="md:flex md:items-center">
  <div class="md:w-1/3"></div>
  <div class="md:w-2/3 flex">
    <button
      class="btn btn-blue mr-2"
      type="submit"
    >
      {{ $btnText }}
    </button>

    <a
      href="{{ route($cancelRoute) }}"
      class="btn btn-white"
    >
      {{ __('button.cancel') }}
    </a>
  </div>
</div>
