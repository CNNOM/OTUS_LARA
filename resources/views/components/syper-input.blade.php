<div class="input-group">
    <span class="input-group-text">{{ $label }}</span>
    <input type="{{ $type }}" class="form-control" placeholder="{{ $label }}"
        aria-describedby="visible-addon">
</div>
{{ $slot }}
