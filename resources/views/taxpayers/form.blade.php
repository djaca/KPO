@csrf

@input([
  'type' => 'number',
  'name' => 'id',
  'label' => ucfirst(__('taxpayer.id')),
  'error' => $errors->has('id') ? $errors->first('id') : null
])
  {{ old('id', $taxpayer->id) }}
@endinput


@input([
  'name' => 'name',
  'label' => ucfirst(__('taxpayer.name')),
  'error' => $errors->has('name') ? $errors->first('name') : null
])
  {{ old('name', $taxpayer->name) }}
@endinput

@input([
  'name' => 'place',
  'label' => ucfirst(__('taxpayer.place')),
  'error' => $errors->has('place') ? $errors->first('place') : null
])
  {{ old('place', $taxpayer->place) }}
@endinput

@input([
  'name' => 'taxpayer_code',
  'label' => ucfirst(__('taxpayer.taxpayer_code')),
  'error' => $errors->has('taxpayer_code') ? $errors->first('taxpayer_code') : null
])
  {{ old('taxpayer_code', $taxpayer->taxpayer_code) }}
@endinput

@input([
  'name' => 'activity_code',
  'label' => ucfirst(__('taxpayer.activity_code')),
  'error' => $errors->has('activity_code') ? $errors->first('activity_code') : null
])
  {{ old('activity_code', $taxpayer->activity_code) }}
@endinput

@actions([
  'btnText' => $taxpayer->id ? __('general.update') : __('general.save'),
  'cancelRoute' => 'taxpayers.index'
])
@endactions
