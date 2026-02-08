<svg class="moon" viewBox="0 0 120 120"
     xmlns="http://www.w3.org/2000/svg" aria-hidden="true">

  <defs>
    <radialGradient id="moonGlow">
      <stop offset="0%" stop-color="#fff7d6"/>
      <stop offset="100%" stop-color="#f4a835"/>
    </radialGradient>

    <mask id="crescentMask">
      <rect width="120" height="120" fill="black"/>
      <circle cx="60" cy="60" r="40" fill="white"/>
      <circle cx="72" cy="52" r="40" fill="black"/>
    </mask>
  </defs>

  <circle cx="60" cy="60" r="40"
          fill="url(#moonGlow)"
          mask="url(#crescentMask)"/>
</svg>
