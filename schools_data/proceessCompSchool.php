<?php
        include '../conn.php';
        
        if (isset($_POST['submitNewSchool'])) {

            $schoolNo=$_POST['schoolNo'];
            $id=$_POST['id_txt'];
            $type_school=$_POST['type_school_txt'];
            $name=$_POST['name_txt'];
            $wilayat=$_POST['wilayat_txt'];
            $location=$_POST['location_txt'];
            $school_status=$_POST['school_status_txt'];
            
            $phone=$_POST['phone_txt'];
            $email=$_POST['email_txt'];
            $sjel=$_POST['sjel_txt'];
            $type2=$_POST['type2_txt'];
            $statue_bulding=$_POST['statue_bulding_txt'];
            $celender=$_POST['celender_txt'];
            $classlow=$_POST['classlow_txt'];
            $classhi=$_POST['classhi_txt'];
            $owner=$_POST['owner_txt'];
            $national=$_POST['national_txt'];
            $renew_date_approval=$_POST['renew_date_approval_txt'];
            $expired_date_approval=$_POST['expired_date_approval_txt'];
            $start=$_POST['start_txt'];
        
            $sql = "UPDATE school_private_main SET 
            school_id = '$id',
            school_type = '$type_school',
            school_name = '$name',
            wilaya = '$wilayat',
            location = '$location',
            phone = '$phone',
            email = '$email',
            commercial_number = '$sjel',
            program_type = '$type2',
            owner_bulding = '$statue_bulding',
            celender = '$celender',
            low_class = '$classlow',
            high_class = '$classhi',
            owner_school = '$owner',
            owner_national = '$national',
            renew_date_approval = '$renew_date_approval',
            expired_date_approval = '$expired_date_approval',
            school_status = '$school_status',
            year_start = '$start',
            add_by = '$report_writer'
           WHERE number='$schoolNo'";
        
            $result = $pdo->query($sql);
        
            if ($result) {
                echo "<script>
                alert('تم ارسال البيانات بنجاح');
                window.location='../main.php';
                </script>";
                exit();
            } else {
                echo "<h6 style='color:#E63946;text-align:center;font-size:25px'>رمز المدرسة مسجل من قبل</h6>";
            }
        }
    ?>
   