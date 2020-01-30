<?php
date_default_timezone_set('America/Bogota');
/* var_dump(date('m/d/Y g:ia')); */

function GetPlantilla($registros)
{
  $template = '
   
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/arduino.png" widht=80 height="80">
      </div>
      <div id="company">
        <h2 class="name">Door Security Project</h2>
        <div>Idat-San Juan Miraflores</div>
        <div>928644700</div>
        <div><a href="https://maximojunior.netlify.com/" target="_blank">maximopeoficiales@gmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
        <div id="invoice">
          <h1>Reporte</h1>
          <div class="date">Hecho a las :'. date('m/d/Y g:ia').'</div>
        </div>
      </div>
      <br><br>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Chip ID</th>
            <th class="unit">Fecha</th>
            <th class="qty">Accion</th>
          </tr>
        </thead>
        <tbody>';
  foreach ($registros as $r) {
    

    $template .= '<tr>
            <td class="no">'.$r['id'].'</td>
            <td class="desc">'.$r['chipId'].'</td>
            <td class="unit">'.$r['fecha'].'</td>
            <td class="qty">'.$r['fecha'].'</td>
          </tr>';
  }
  $template .= '</tbody>
      </table>
      <div id="thanks">Fin de Reporte</div>
      <div id="notices">
        <div>NOTICIA:</div>
        <div class="notice">Contratanos Somos los mejores en Seguridad</div>
      </div>
    </main>
    <footer>
    Todos los Derechos Reservados &copy; 2020
    </footer>
  </body>

  ';

  return $template;
}
