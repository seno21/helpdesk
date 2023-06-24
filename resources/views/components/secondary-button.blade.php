<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-block btn-secondary bg-secondary btn-lg font-weight-bold text-light auth-form-btn']) }}>
    {{ $slot }}
</button>
