<?php

use App\Http\constantes\Paths;

    $split = "/";

    $URL =   explode('/', request() ->path() ) ?? '';

?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <?php foreach (Paths::getValueSidebar() as $index => $value) {

      $path = $value['path'];
      $icon = $value['icon'];
      //explode("$split", trim($URL, "$split") == $path)
      ($URL[0] == $path) ? $active = 'active' :  $active = '';

    ?>
      @if (!isset($value['items']))
      <li class="nav-item">
        <a class="nav-link collapsed <?= $active ?? null ?>" href="<?= Paths::DOMAINE . $path ?>">
          <i class="<?= $icon ?>"></i>
          <span><?= $index ?></span>
        </a>
      </li>
      @else

      <li class="nav-item">
        <a class="nav-link collapsed <?= $active ?? null ?>" data-bs-target="#{{trim($index)}}-nav" data-bs-toggle="collapse" href="#">
          <i class="{{$icon}}"></i><span>{{ $index }}</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="{{trim($index)}}-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @foreach($value['items'] as $key => $item)
          <li>
            <a href="{{ Paths::DOMAINE .$item['path'] }}">
              <i class="bi bi-circle"></i><span>{{ $key }}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </li>

      @endif


    <?php  } ?>


  </ul>

</aside><!-- End Sidebar-->