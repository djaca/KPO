@csrf

@input([
  'type' => 'number',
  'name' => 'pib',
  'label' => 'PIB',
  'error' => $errors->has('pib') ? $errors->first('pib') : null
])
  {{ old('pib', $taxpayer->pib) }}
@endinput


@input([
  'name' => 'obveznik',
  'label' => 'Obveznik',
  'error' => $errors->has('obveznik') ? $errors->first('obveznik') : null
])
  {{ old('obveznik', $taxpayer->obveznik) }}
@endinput

@input([
  'name' => 'sediste',
  'label' => 'Sediste',
  'error' => $errors->has('sediste') ? $errors->first('sediste') : null
])
  {{ old('sediste', $taxpayer->sediste) }}
@endinput

@input([
  'name' => 'sifra_poreskog_obveznika',
  'label' => 'Sifra obveznika',
  'error' => $errors->has('sifra_poreskog_obveznika') ? $errors->first('sifra_poreskog_obveznika') : null
])
  {{ old('sifra_poreskog_obveznika', $taxpayer->sifra_poreskog_obveznika) }}
@endinput

@input([
  'name' => 'sifra_delatnosti',
  'label' => 'Sifra delatnosti',
  'error' => $errors->has('sifra_delatnosti') ? $errors->first('sifra_delatnosti') : null
])
  {{ old('sifra_delatnosti', $taxpayer->sifra_delatnosti) }}
@endinput

@actions([
  'btnText' => $taxpayer->id ? 'Update' : 'Save',
  'cancelRoute' => 'taxpayers.index'
])
@endactions
