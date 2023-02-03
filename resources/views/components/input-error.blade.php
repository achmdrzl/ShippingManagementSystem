@props(['messages'])

@if ($messages)
    <div class="alert alert-danger">
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </div>
@endif
