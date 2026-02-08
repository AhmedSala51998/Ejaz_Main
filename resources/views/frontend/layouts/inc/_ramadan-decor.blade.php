<!-- RAMADAN TOP BUNTING -->
<div class="ramadan-top-decor ramadan-visible">
  <svg viewBox="0 0 1920 180" preserveAspectRatio="none"
       xmlns="http://www.w3.org/2000/svg">

    <path id="rope" d="M0 80 Q960 150 1920 80"
          stroke="#f4a835" stroke-width="1.2" fill="none"/>

    <g id="flags">
      @for($i=0;$i<18;$i++)
        <polygon fill="{{ ['#f7c400','#4fc3f7','#7cb342'][$i%3] }}"/>
      @endfor
    </g>

    <g fill="#f7c400" opacity=".9">
      <circle cx="350" cy="55" r="4"/>
      <circle cx="520" cy="45" r="3"/>
      <circle cx="690" cy="55" r="4"/>
      <circle cx="860" cy="45" r="3"/>
      <circle cx="1030" cy="55" r="4"/>
      <circle cx="1200" cy="45" r="3"/>
      <circle cx="1370" cy="55" r="4"/>
    </g>
  </svg>
</div>

<!-- RAMADAN SCENE -->
<div class="ramadan-svg-decor ramadan-visible" aria-hidden="true">
  <div class="stars"></div>

  @include('frontend.layouts.inc._ramadan-lantern',['side'=>'left'])
  @include('frontend.layouts.inc._ramadan-moon')
  @include('frontend.layouts.inc._ramadan-lantern',['side'=>'right'])
</div>
