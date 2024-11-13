


<section class="popup-outer">
    <div class="popup-box">
    <i id="close" class="close"><ion-icon name="close-outline"></ion-icon></i>


    <?php 



  

                    $wilayatCounts = array(); // Create an empty array to store the data

$distinctWilayatsQuery = $pdo->query("SELECT DISTINCT wilaya FROM schools_buldinge");

if ($distinctWilayatsQuery) {
    while ($rowWilayats = $distinctWilayatsQuery->fetch(PDO::FETCH_ASSOC)) {
        $wilaya = $rowWilayats['wilaya'];
        
        // Query for the number of rows with this wilayat
        $countQuery = $pdo->query("SELECT COUNT(*) AS count FROM schools_buldinge WHERE wilaya = '$wilaya'");
        if ($countQuery) {
            $resultCount = $countQuery->fetch(PDO::FETCH_ASSOC);
            $count = $resultCount['count'];
            
            // Add the data to the array
            $wilayatCounts[] = array(
                'name' => $wilaya,
                'count' => $count
            );
        }
    }
}

?>


  <!-- ================ Add Charts JS ================= -->
  <div class="chartsBx">
                    <!-- <div class="chart"> <canvas id="chart-1Search"></canvas> </div> -->
                   
                </div>

                <div class="chart"> <canvas id="chart-2-Search"></canvas> </div>



<script>
    // Assuming you have an array named $wilayatCounts in your PHP code
     wilayats_s = <?php echo json_encode($wilayatCounts); ?>;

     ctx2S = document.getElementById("chart-2-Search").getContext("2d");
     myChart2S = new Chart(ctx2S, {
        // type: "polarArea",
        type: "bar",

        data: {
            labels: wilayats_s.map(wilaya => wilaya.name), // Assuming each element in the $wilayatCounts array has a "name" property

            datasets: [{
                label: "تقرير معاينة المبنى في كل ولاية ",

                data: wilayats_s.map(wilaya => wilaya.count), // Assuming each element in the $wilayatCounts array has a "count" property

                backgroundColor: [

                    "#06d6a0",

                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)",

                    "rgba(255, 99, 132, 1)",
                    "#c1121f",
                    "#e36414",


                ],
            }, ],
        },
        options: {
            responsive: true,
        },
    });


    /*--------------------------------------------*/


</script>


</div>
</section>