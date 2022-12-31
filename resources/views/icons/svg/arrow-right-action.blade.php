{{--
    Uses slightly different SVG position from 'arrow-right' so that it can be
    placed as the 'action' in a table layout (see organisations list)
--}}
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
    viewBox="0 0 64 64" height="{{ $size }}" width="{{ $size }}"
    aria-labelledby="title" aria-describedby="desc" role="img">
    <path data-name="layer1" d="M14.002 48.002h35M36 36.21l13 11-13 11"
        fill="none" stroke="{{ $colour }}" stroke-miterlimit="10" stroke-width="{{ $width }}"
        stroke-linejoin="round" stroke-linecap="round">
    </path>
</svg>
