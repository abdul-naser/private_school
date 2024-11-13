<?php
include 'conn.php';
if(isset($_POST['submit']))

    {
        $id=$_POST['id'];

        $date=$_POST['date_txt'];
    $day=$_POST['day_txt'];
    $request=$_POST['request_txt'];
    $number_register=$_POST['number_register_txt'];
    $number_accept=$_POST['number_accept_txt'];
    $number_request=$_POST['number_request_txt'];
    $name_request=$_POST['name_request_txt'];
    $phone=$_POST['phone_txt'];
    $programe=$_POST['programe_txt'];
    $name_school=$_POST['name_school_txt'];
    
    $type_school=$_POST['type_school_txt'];
    // if(!empty($_POST['date_expired_txt']))
    // {
    $date_expired=$_POST['date_expired_txt'];
    
    // } 
    // else{
    //     $date_expired = null; // or set a default date
    
    // }
    
    $name_owner=$_POST['name_owner_txt'];
    $wilaya=$_POST['wilaya_txt'];
    $quiria=$_POST['quiria_txt'];
    $number_place=$_POST['number_place_txt'];
    $square=$_POST['square_txt'];
    $space=$_POST['space_txt'];
    $floorCount=$_POST['floor_txt'];
    
    // File Request 
    $request_ownerF=$_POST['request_ownerF'];
    $land_ownerF=$_POST['land_ownerF'];
    $croqueF=$_POST['croqueF'];
    $letter_ownerF=$_POST['letter_ownerF'];
    $letter_allowedF=$_POST['letter_allowedF'];
    $copy_approveF=$_POST['copy_approveF'];
    $plansF=$_POST['plansF'];
    $paymentF=$_POST['paymentF'];

    
// Total Room 
$countWC=$_POST['countWC'];
$countStudentsAll=$_POST['countStudentsAll'];
$noteCountStudentsAll=$_POST['noteCountStudentsAll'];
$heightOut=$_POST['heightOut'];
$wdithOut=$_POST['wdithOut'];
$hallSpaceOut=$_POST['hallSpaceOut'];
$heightGame=$_POST['heightGame'];
$wdithGame=$_POST['wdithGame'];
$hallSpaceGame=$_POST['hallSpaceGame'];
$countClassRoom=$_POST['countClassRoom'];
// ---------

$accept_visit=$_POST['accept_visit'];
$reasons_not_accept_visit=$_POST['reasons_not_accept_visit'];


$accept_department=$_POST['accept_department'];
$reasons_not_accept_dep=$_POST['reasons_not_accept_dep'];


//--------
$type_school_license=$_POST['type_school_license'];
$license_fee=$_POST['license_fee'];
$secuirtyValue=$_POST['secuirtyValue'];
$compleating_invest=$_POST['compleating_invest'];

$selectedValues = $_POST['myCheckbox'];
$valuesString = implode(",", $selectedValues);

    $sql ="UPDATE schools_buldinge
    SET day = '$day',
        date = '$date',
        request = '$request',
        number_register = '$number_register',
        number_accept = '$number_accept',
        number_request = '$number_request',
        name_request = '$name_request',
        phone = '$phone',
        programe = '$programe',
        name_school = '$name_school',
        type_school = '$type_school',
        date_expired = '$date_expired',
        name_owner = '$name_owner',
        wilaya = '$wilaya',
        quiria = '$quiria',
        number_place = '$number_place',
        square = '$square',
        space = '$space',
        floor = '$floorCount',
        request_ownerF = '$request_ownerF',
        land_ownerF = '$land_ownerF',
        croqueF = '$croqueF',
        letter_ownerF = '$letter_ownerF',
        letter_allowedF = '$letter_allowedF',
        copy_approveF = '$copy_approveF',
        plansF = '$plansF',
        paymentF = '$paymentF',
        countWC = '$countWC',
        countStudentsAll = '$countStudentsAll',
        noteCountStudentsAll = '$noteCountStudentsAll',
        heightOut = '$heightOut',
        wdithOut = '$wdithOut',
        hallSpaceOut = '$hallSpaceOut',
        heightGame = '$heightGame',
        wdithGame = '$wdithGame',
        hallSpaceGame = '$hallSpaceGame',
        countClassRoom = '$countClassRoom',
        accept_visit = '$accept_visit',
        reasons_not_accept_visit = '$reasons_not_accept_visit',
        accept_department = '$accept_department',
        reasons_not_accept_dep = '$reasons_not_accept_dep',
        type_school_license = '$type_school_license',
        license_fee = '$license_fee',
        secuirtyValue = '$secuirtyValue',
        compleating_invest ='$compleating_invest',
        invest_platform = '$valuesString'
    WHERE number = $id";
$result = $pdo->query($sql);


$devicePairs = $_POST["devicePairs"];

foreach ($devicePairs as $pair) {
    $no_components = $pair["no_components"];
    $floor = $pair["floor"];
    $hall = $pair["hall"];
    $height = $pair["height"];
    $width = $pair["width"];
    $hall_space = $pair["hall_space"];
    $wc = $pair["w_c"];
    $type_of_use = $pair["type_of_use"];
    $hall_capacity = $pair["hall_capacity"];
    $notes = $pair["notes"];

    $sql_comp = "UPDATE building_components 
                 SET floor = :floor, hall = :hall, height = :height, 
                     width = :width, hall_space = :hall_space, w_c = :wc, 
                     type_of_use = :type_of_use, hall_capacity = :hall_capacity, 
                     notes = :notes, building_number = :id 
                 WHERE no = :no_components";

    $stmt = $pdo->prepare($sql_comp);
    $stmt->bindParam(':floor', $floor);
    $stmt->bindParam(':hall', $hall);
    $stmt->bindParam(':height', $height);
    $stmt->bindParam(':width', $width);
    $stmt->bindParam(':hall_space', $hall_space);
    $stmt->bindParam(':wc', $wc);
    $stmt->bindParam(':type_of_use', $type_of_use);
    $stmt->bindParam(':hall_capacity', $hall_capacity);
    $stmt->bindParam(':notes', $notes);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':no_components', $no_components);
    $stmt->execute();
}

/*  this for another way 
foreach ($devicePairs as $pair) {
    $no_components = $pair["no_components"];
    $floor = $pair["floor"];
    $hall = $pair["hall"];
    $height = $pair["height"];

    $width = $pair["width"];
    $hall_space = $pair["hall_space"];
    $wc = $pair["w_c"];

    $type_of_use = $pair["type_of_use"];
    $hall_capacity = $pair["hall_capacity"];
    $notes = $pair["notes"];

 

    $sql_comp = "UPDATE building_components SET floor = ?, hall = ?, height = ?, width = ?, hall_space = ?, w_c = ?, type_of_use = ?, hall_capacity = ?, notes = ?, building_number = ? WHERE no = ?";
$stmt = $pdo->prepare($sql_comp);
$stmt->execute([$floor, $hall, $height, $width, $hall_space, $wc, $type_of_use, $hall_capacity, $notes, $id, $no_components]);

} */


$devicePairsNew = $_POST["devicePairsNew"];


foreach ($devicePairsNew as $pairNew) {

    $floor = $pairNew["floor"];
    $hall = $pairNew["hall"];
    $height = $pairNew["height"];

    $width = $pairNew["width"];
    $hall_space = $pairNew["hall_space"];
    $wc = $pairNew["w_c"];

    $type_of_use = $pairNew["type_of_use"];
    $hall_capacity = $pairNew["hall_capacity"];
    $notes = $pairNew["notes"];

  

    
$sql_compNew = "INSERT INTO building_components(floor,hall,height,width,hall_space,w_c,type_of_use,hall_capacity,notes,building_number) VALUES('$floor','$hall','$height','$width','$hall_space','$wc','$type_of_use','$hall_capacity','$notes','$id')";


$sql_resNew = $pdo->query($sql_compNew);

}

//Visit Bulding Name

// $devicePairs2 = $_POST["devicePairs2"];

// foreach ($devicePairs2 as $pair2) {
//     $no_visit= $pair2["no_visit"];

//     $name = $pair2["name"];
//     $position = $pair2["position"];

 

// $sql_visit= "UPDATE visit_staff_building SET name = '$name',  position = '$position' WHERE no = '$no_visit'";
// $sql_res_vist = $pdo->query($sql_visit);

// }


$devicePairsNew2 = $_POST["devicePairsNew2"];

foreach ($devicePairsNew2 as $pairNew2) {

    $name = $pairNew2["name"];
    $position = $pairNew2["position"];

$sql_visitNew = "INSERT INTO visit_staff_building(name,position,building_number) VALUES('$name','$position','$id')";


$sql_resVisitNew = $pdo->query($sql_visitNew);
}


//---------------------------------------------------------


$devicePairs3 = $_POST["devicePairs3"];

foreach ($devicePairs3 as $pair3) {
    $no_recommendation = $pair3["no_recommendation"];

    $recommendation = $pair3["recommendation"];
 

$sql_recom= "UPDATE recommendations_building SET recommendation = '$recommendation' WHERE no = '$no_recommendation'";
$sql_res_recom = $pdo->query($sql_recom);

}
$devicePairsNew3 = $_POST["devicePairsNew3"];

foreach ($devicePairsNew3 as $pairNew3) {

    $recommendation = $pairNew3["recommendation"];

$sql_recoNew = "INSERT INTO recommendations_building(recommendation,building_number) VALUES('$recommendation','$id')";


$sql_resRecoNew = $pdo->query($sql_recoNew);
}


if($result) 
{
    echo "<script>
    alert('تم تعديل البيانات بنجاح');
    window.location='../main.php';
    </script>";

    exit();

}

}

// window.location='report_building.php?no= $id';

?>