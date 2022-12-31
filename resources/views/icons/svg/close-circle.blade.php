<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" height="{{ $size }}" width="{{ $size }}"
     aria-labelledby="title" aria-describedby="desc" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
    <circle data-name="layer2"
            cx="32.001" cy="32" r="30" transform="rotate(-45 32.001 32)"
            fill="none" stroke="{{ $colour }}" stroke-miterlimit="10" stroke-width="{{ $width }}"
            stroke-linejoin="miter" stroke-linecap="round">
    </circle>
    <path data-name="layer1" d="M42.999 21.001l-22 22m22 0L21 21"
          fill="none" stroke="{{ $colour }}" stroke-miterlimit="10" stroke-width="{{ $width }}"
          stroke-linejoin="miter" stroke-linecap="round">
    </path>
</svg>
