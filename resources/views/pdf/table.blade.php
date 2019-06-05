<table class="pdf">
  <tr class="h-8">
    <th class="w-12" rowspan="2">
      <div class="whitespace-pre-line">Redni
        broj
      </div>
    </th>
    <th class="w-full" rowspan="2">Datum i opis knjizenja</th>
    <th class="border-b-0 w-56" colspan="2">Prohodi od delatnosti</th>
    <th class="w-28" rowspan="2">
      <div class="whitespace-pre-line">Svega prihodi
        od delatnosti
        (3 + 4)
      </div>
    </th>
    @if(!app('request')->has('download'))
      <th class="w-12 border-none"></th>
    @endif
  </tr>

  <tr class="h-12">
    <th class="whitespace-pre-line w-28">Od prodaje
      proizvoda
    </th>
    <th class="whitespace-pre-line w-28">Od izvrsenih
      usluga
    </th>
  </tr>

  <tr>
    @for($i = 1; $i <= 5; $i++)
      <td class="text-center">{{ $i }}</td>
    @endfor
  </tr>
  <tbody>
  <tr>
    <td class="text-right"></td>
    <td class="text-right px-1">{!! isset($donos) ? 'Donos:' : '<br>' !!}</td>
    <td class="text-right px-1">
      {{ isset($donos) ? number_format($donos['products_sum'], 2) : '' }}
    </td>
    <td class="text-right px-1">
      {{ isset($donos) ? number_format($donos['services_sum'], 2) : '' }}
    </td>
    <td class="text-right px-1">
      {{ isset($donos) ? number_format($donos['sum'], 2) : '' }}
    </td>
  </tr>

  @foreach($data as $item)
    <tr>
      <td class="text-center">{{ $item->ordinal_num }}</td>
      <td class="px-1">{{ $item->date }} - {{ $item->description }}</td>
      <td class="text-right px-1">{{ number_format($item->product_value, 2) }}</td>
      <td class="text-right px-1">{{ number_format($item->service_value, 2) }}</td>
      <td class="text-right px-1">{{ number_format($item->sum, 2) }}</td>
      @if(!app('request')->has('download'))
        <td class="border-none flex justify-between px-2">
          <a href="{{ route('items.edit', $item->id) }}" class="rounded text-blue-500">
            <i class="fas fa-edit"></i>
          </a>

          <form action="{{ route('items.destroy', $item->id) }}" method="POST">
            @csrf
            {{ method_field('DELETE') }}

            <button
              class="rounder text-red-500"
              onclick="return confirm('Are you sure you want to delete this item?');"
            >
              <i class="fas fa-times"></i>
            </button>
          </form>
        </td>
      @endif
    </tr>
  @endforeach

  <tr>
    <td class="text-right"></td>
    <td class="text-right px-1">{{ isset($total) ? 'Ukupno' : 'Prenos' }}:</td>
    <td class="text-right px-1">
      {{ number_format(isset($total) ? $total['products_sum'] : $prenos['products_sum'], 2) }}
    </td>
    <td class="text-right px-1">
      {{ number_format(isset($total) ? $total['services_sum'] : $prenos['services_sum'], 2) }}
    </td>
    <td class="text-right px-1">
      {{ number_format(isset($total) ? $total['sum'] : $prenos['sum'], 2) }}
    </td>
  </tr>
  </tbody>
</table>
