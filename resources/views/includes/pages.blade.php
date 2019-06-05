<div>
  {{-- First page --}}
  @if (array_key_exists('firstPage', $pages))
    <div class="page">
      @include('pdf.header')
      @include('pdf.table', $pages['firstPage'])
    </div>
  @endif

  {{-- Middle pages --}}
  @if(array_key_exists('middlePages', $pages))
    @foreach($pages['middlePages'] as $pageData)
      <div class="page {{ !app('request')->has('download') ? 'my-3' : ''  }}">
        @include('pdf.table', $pageData)
      </div>
    @endforeach
  @endif

  {{-- Last page --}}
  <div class="page {{ !app('request')->has('download') ? 'mt-3' : ''  }}">
    @if(!array_key_exists('firstPage', $pages))
      @include('pdf.header')

      @include('pdf.table', $pages['lastPage'])

      @if (count($pages['lastPage']['data']) < 29)
        @include('pdf.footer')
      @endif
    @else
      @include('pdf.table', $pages['lastPage'])

      @if (count($pages['lastPage']['data']) < 41)
        @include('pdf.footer')
      @endif
    @endif
  </div>

  @if(!array_key_exists('firstPage', $pages) && count($pages['lastPage']['data']) > 29)
    <div class="page {{ !app('request')->has('download') ? 'mt-3' : ''  }}">
      @include('pdf.footer')
    </div>
  @else
    @if(count($pages['lastPage']['data']) > 40)
      <div class="page {{ !app('request')->has('download') ? 'mt-3' : ''  }}">
        @include('pdf.footer')
      </div>
    @endif
  @endif
</div>
