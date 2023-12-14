<?php
    $requete_select =$bdd->prepare("SELECT c.nom, COUNT(p.titre) as product FROM produits p ,categories c WHERE c.cat_id=p.cat_id GROUP BY nom") ;
    $requete_select->execute();
    $result = $requete_select->fetchAll(PDO::FETCH_ASSOC);
    $chartData = array();
    foreach ($result as $row) {
        $chartData[] = array(
            'name' => $row['nom'],
            'y' => (int)$row['product']
        );
    }

    //  converts the data into a JSON-formatted string
    $chartDataJSON = json_encode($chartData);
    //This JSON string can then be easily embedded into the JavaScript code and passed to the frontend for further processing, such as rendering a chart using a library like Highcharts.
?>

<script>
    // Retrieve chart data from PHP
    var chartData = <?php echo $chartDataJSON; ?>;
    // Create Highcharts chart
    Highcharts.chart('chart-container', {
        chart: {
            type: 'column',
            style:{
               
                
                fontFamily:"sen-Regular "
            }
        },
        title: {
            text: 'STATISTIQUE DE CATEGORIES ET PRODUITS'
        },
        xAxis: {
            categories: <?php echo json_encode(array_column($result, 'nom')); ?>
        },
        series: [{
            name: 'Nombre de produits',
            data: chartData
        }]
    });
</script>