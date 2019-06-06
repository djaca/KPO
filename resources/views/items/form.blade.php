{{ csrf_field() }}

@input([
  'type' => 'date',
  'name' => 'date',
  'label' => 'Datum',
  'error' => $errors->has('date') ? $errors->first('date') : null
])
  {{ old('date', $item->date ? $item->date->format('Y-m-d') : '') }}
@endinput

@input([
  'name' => 'description',
  'label' => 'Opis',
  'error' => $errors->has('description') ? $errors->first('description') : null
])
  {{ old('description', $item->description) }}
@endinput

@input([
  'type' => 'number',
  'name' => 'product_value',
  'label' => 'Prihod od proizvoda',
  'error' => $errors->has('product_value') ? $errors->first('product_value') : null,
  'step' => '0.01'
])
  {{ old('product_value', $item->product_value) }}
@endinput

@input([
  'type' => 'number',
  'name' => 'service_value',
  'label' => 'Prihod od usluga',
  'error' => $errors->has('service_value') ? $errors->first('service_value') : null,
  'step' => '0.01'
])
  {{ old('service_value', $item->service_value) }}
@endinput

@actions([
  'btnText' => $item->id ? 'Update' : 'Save',
  'cancelRoute' => 'home'
])
@endactions
