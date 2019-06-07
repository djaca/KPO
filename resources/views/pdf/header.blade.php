<div class="mb-4">
  <div class="text-center text-xl mb-4">Obrazac KPO</div>

  <table class="border border-transparent">
    @foreach($taxpayer as $name => $value)
      <tr class="border border-transparent">
        <td class="pr-2 border border-transparent">{{ $name }}:</td>
        <td>{{ $value }}</td>
      </tr>
    @endforeach
  </table>

  <div class="text-center text-2xl whitespace-pre-line font-bold my-8">KNJIGA O OSTVARENOM PROMETU
    PAUSALNO OPOREZOVANIH OBVEZNIKA
  </div>
</div>
