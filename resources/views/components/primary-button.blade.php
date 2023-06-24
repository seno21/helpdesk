<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-block btn-primary bg-primary btn-lg font-weight-bold auth-form-btn']) }}>
    {{ $slot }}
</button>
