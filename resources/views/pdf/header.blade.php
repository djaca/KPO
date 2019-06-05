<div class="mb-4">
  <div class="text-center text-xl mb-4">Obrazac KPO</div>

  <table class="border border-transparent">
    <tr class="border border-transparent">
      <td class="pr-2 border border-transparent">PIB:</td>
      <td>{{ $taxpayer->pib }}</td>
    </tr>
    <tr class="border border-transparent">
      <td class="pr-2 border border-transparent">Obveznik:</td>
      <td>{{ $taxpayer->obveznik }}</td>
    </tr>
    <tr class="border border-transparent">
      <td class="pr-2 border border-transparent">Sediste:</td>
      <td>{{ $taxpayer->sediste }}</td>
    </tr>
    <tr class="border border-transparent">
      <td class="pr-2 border border-transparent">Sifra poreskog obveznika:</td>
      <td>{{ $taxpayer->sifra_poreskog_obveznika }}</td>
    </tr>
    <tr class="border border-transparent">
      <td class="pr-2 border border-transparent">Sifra delatnosti:</td>
      <td>{{ $taxpayer->sifra_delatnosti }}</td>
    </tr>
  </table>

  <div class="text-center text-2xl whitespace-pre-line font-bold my-8">KNJIGA O OSTVARENOM PROMETU
    PAUSALNO OPOREZOVANIH OBVEZNIKA
  </div>
</div>
