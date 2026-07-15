@props([
    'name' => 'state',
    'value' => null,
    'id' => null,
    'required' => true,
    'label' => 'State',
    'showCode' => true,
    'placeholder' => 'Select state',
])

@php
    use App\Support\IndianGstStates;

    $selected = old($name, $value);
    $canonical = IndianGstStates::canonicalName($selected) ?? $selected;
    $fieldId = $id ?: $name;
    $states = IndianGstStates::all();
@endphp

<div @class(['admin-field', $attributes->get('class')])>
    <label for="{{ $fieldId }}">{{ $label }}@if($required) *@endif</label>
    <select
        id="{{ $fieldId }}"
        name="{{ $name }}"
        @required($required)
        {{ $attributes->except('class') }}
    >
        <option value="">{{ $placeholder }}</option>
        @foreach($states as $code => $stateName)
            <option value="{{ $stateName }}" @selected((string) $canonical === (string) $stateName)>
                @if($showCode)
                    {{ $code }} — {{ $stateName }}
                @else
                    {{ $stateName }}
                @endif
            </option>
        @endforeach
        @if(filled($selected) && ! IndianGstStates::isValid($selected))
            <option value="{{ $selected }}" selected>{{ $selected }} (legacy — please reselect)</option>
        @endif
    </select>
</div>
