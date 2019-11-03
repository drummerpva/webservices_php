<table width="100%">
    <tr>
        <th>Foto</th>
        <th>Titulo</th>
        <th>Valor</th>
    </tr>




<?php
require './simple_html_dom.php';
/*$html = file_get_html("https://www.youtube.com/results?search_query=bolsonaro");
$results = $html->find('.video-thumb');
//echo $html;
echo "Total: ".count($results)."<br/>";
exit;
foreach ($results as $foto){
    $image = ($foto->find('.item-link img',0)->attr['data-src']) ?? $foto->find('.item-link img',0)->attr['src'];
    echo $image."<br/>";
    $titulo = $foto->find('.main-title',0);
    echo $titulo."<br/>";
    $valor = "R$ ".$foto->find('.price__fraction',0).",".$foto->find('.price__decimals',0);
    echo $valor."<hr/>";
    
}
*/

$html = file_get_html("https://lista.mercadolivre.com.br/".(($_GET['p'])??""));
$results = $html->find('.results-item');
//echo "Total: ".count($results)."<br/>";
//exit;
foreach ($results as $foto){
    echo "<tr>";
    $image = ($foto->find('.item-link img',0)->attr['data-src']) ?? $foto->find('.item-link img',0)->attr['src'];
    echo "<td><img src='".$image."' height='80'></td>";
    $titulo = $foto->find('.main-title',0);
    echo "<td>".$titulo."</td>";
    $valor = "R$ ".$foto->find('.price__fraction',0).",".$foto->find('.price__decimals',0);
    echo "<td nowrap>".$valor."</td>";
    echo "</td>";
    
}
//*/
//echo $html;