<!-- RAMADAN DECOR -->
<div class="ramadan-wrapper" aria-hidden="true">

    <!-- ===== Rope + Flags ===== -->
    <div class="ramadan-top-decor">
        <svg viewBox="0 0 1920 180" preserveAspectRatio="none"
             xmlns="http://www.w3.org/2000/svg">

            <!-- Rope -->
            <path id="rope"
                  d="M0 80 Q960 150 1920 80"
                  stroke="#f4a835"
                  stroke-width="2"
                  fill="none"/>

            <!-- Flags -->
            <g id="flags">
                <polygon fill="#f7c400"/>
                <polygon fill="#4fc3f7"/>
                <polygon fill="#7cb342"/>
                <polygon fill="#f7c400"/>
                <polygon fill="#4fc3f7"/>
                <polygon fill="#7cb342"/>
                <polygon fill="#f7c400"/>
                <polygon fill="#4fc3f7"/>
                <polygon fill="#7cb342"/>
            </g>
        </svg>
    </div>

    <!-- ===== Lanterns + Moon ===== -->
    <div class="ramadan-svg-decor">

        <!-- Left Lantern -->
        <svg class="lantern left" viewBox="0 0 160 260"
             xmlns="http://www.w3.org/2000/svg">
            <line x1="80" y1="0" x2="80" y2="35"
                  stroke="#9c6a1a" stroke-width="4"/>
            <path d="M35 60 Q80 35 125 60
                     V165 Q80 195 35 165 Z"
                  fill="#f4a835"
                  stroke="#b17819"
                  stroke-width="4"/>
        </svg>

        <!-- Moon -->
        <svg class="moon" viewBox="0 0 120 120"
             xmlns="http://www.w3.org/2000/svg">
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

        <!-- Right Lantern -->
        <svg class="lantern right" viewBox="0 0 160 260"
             xmlns="http://www.w3.org/2000/svg">
            <line x1="80" y1="0" x2="80" y2="35"
                  stroke="#9c6a1a" stroke-width="4"/>
            <path d="M35 60 Q80 35 125 60
                     V165 Q80 195 35 165 Z"
                  fill="#f4a835"
                  stroke="#b17819"
                  stroke-width="4"/>
        </svg>

    </div>
</div>

<!-- ===== JS: Flags on Rope ===== -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const rope = document.getElementById('rope');
    const flags = document.querySelectorAll('#flags polygon');
    if (!rope || !flags.length) return;

    const positions = [300,420,540,660,780,900,1020,1140,1260];
    const drop = 40;

    flags.forEach((flag, i) => {
        const len = rope.getTotalLength();
        const p = rope.getPointAtLength((positions[i] / 1920) * len);

        flag.setAttribute(
            'points',
            `${positions[i]-18},${p.y}
             ${positions[i]+18},${p.y}
             ${positions[i]},${p.y+drop}`
        );

        flag.style.transformOrigin = `${positions[i]}px ${p.y}px`;
        flag.style.animation = `flutter-${i} 3s ease-in-out infinite alternate`;

        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes flutter-${i} {
                from { transform: rotate(-3deg); }
                to   { transform: rotate(3deg); }
            }
        `;
        document.head.appendChild(style);
    });
});
</script>
