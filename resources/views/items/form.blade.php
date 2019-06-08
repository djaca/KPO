{{ csrf_field() }}

@input([
  'type' => 'date',
  'name' => 'date',
  'label' => ucfirst(__('item.date')),
  'error' => $errors->has('date') ? $errors->first('date') : null
])
  {{ old('date', $item->date ? $item->date->format('Y-m-d') : '') }}
@endinput

@input([
  'name' => 'description',
  'label' => ucfirst(__('item.description')),
  'error' => $errors->has('description') ? $errors->first('description') : null
])
  {{ old('description', $item->description) }}
@endinput

@input([
  'type' => 'number',
  'name' => 'product_value',
  'label' => ucfirst(__('item.product_value')),
  'error' => $errors->has('product_value') ? $errors->first('product_value') : null,
  'step' => '0.01'
])
  {{ old('product_value', $item->product_value) }}
@endinput

@input([
  'type' => 'number',
  'name' => 'service_value',
  'label' => ucfirst(__('item.service_value')),
  'error' => $errors->has('service_value') ? $errors->first('service_value') : null,
  'step' => '0.01'
])
  {{ old('service_value', $item->service_value) }}
@endinput

<input type="hidden" name="taxpayer_id" value="{{ \Illuminate\Support\Facades\Cookie::get('taxpayer') }}">

@actions([
  'btnText' => $item->id ? __('button.update') : __('button.save'),
  'cancelRoute' => 'home'
])
@endactions
