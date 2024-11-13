<?php



include '../conn.php';



// إضافة مستخدم جديد

if (isset($_POST['addSchool'])) {
    $no = $_POST['no'];
    $school_id = $_POST['school_id'];
    $school_type = $_POST['school_type'];
    $school_name = $_POST['school_name'];

    $wilaya = $_POST['wilaya'];
    $location = $_POST['location'];
    $school_status = $_POST['school_status'];
    $phone = $_POST['phone'];

    $email = $_POST['email'];
    $commercial_number = $_POST['commercial_number'];
    $program_type = $_POST['program_type'];
    $owner_bulding = $_POST['owner_bulding'];


    
    $celender = $_POST['celender'];
    $low_class = $_POST['low_class'];
    $high_class = $_POST['high_class'];
    $owner_school = $_POST['owner_school'];


    $owner_national = $_POST['owner_national'];
    $renew_date_approval = $_POST['renew_date_approval'];
    $expired_date_approval = $_POST['expired_date_approval'];
    $year_start = $_POST['year_start'];

    try {
        $pdo->query("INSERT INTO school_private_main (
            school_id, school_type, school_name, wilaya, location, school_status, phone, email, 
            commercial_number, program_type, owner_bulding, celender, low_class, high_class, 
            owner_school, owner_national, renew_date_approval, expired_date_approval, year_start
        ) VALUES (
            '$school_id', '$school_type', '$school_name', '$wilaya', '$location', '$school_status', 
            '$phone', '$email', '$commercial_number', '$program_type', '$owner_bulding', '$celender', 
            '$low_class', '$high_class', '$owner_school', '$owner_national', '$renew_date_approval', 
            '$expired_date_approval', '$year_start'
        )");
        echo json_encode(["status" => "success"]);
    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);  // Catch and display SQL errors
        exit;
    }
}


// جلب جميع المستخدمين
// جلب جميع المستخدمين
if (isset($_GET['getSchools'])) {
    try {
        $stmt = $pdo->query("
            SELECT * FROM school_private_main WHERE school_type IS NOT NULL
        ");
        
        $schools = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $schools[] = $row;
        }
        
        echo json_encode($schools);
        exit;
    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
        exit;
    }
}

// حذف مستخدم باستخدام prepared statements
if (isset($_POST['deleteSchool'])) {
    $no = $_POST['number'];
    try {
        $stmt = $pdo->prepare("DELETE FROM school_private_main WHERE number = :no");
        $stmt->bindParam(':no', $no, PDO::PARAM_INT);
        $stmt->execute();
        echo json_encode(["status" => "deleted"]);
    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
    exit;
}

// تعديل مستخدم باستخدام prepared statements
if (isset($_POST['editSchool'])) {
    $number = $_POST['number'];
    $school_id = $_POST['school_id'];
    $school_type = $_POST['school_type'];
    $school_name = $_POST['school_name'];
    $wilaya = $_POST['wilaya'];
    $location = $_POST['location'];
    $school_status = $_POST['school_status'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $commercial_number = $_POST['commercial_number'];
    $program_type = $_POST['program_type'];
    $owner_bulding = $_POST['owner_bulding'];
    $celender = $_POST['celender'];
    $low_class = $_POST['low_class'];
    $high_class = $_POST['high_class'];
    $owner_school = $_POST['owner_school'];
    $owner_national = $_POST['owner_national'];
    $renew_date_approval = $_POST['renew_date_approval'];
    $expired_date_approval = $_POST['expired_date_approval'];
    $year_start = $_POST['year_start'];

    try {
        $stmt = $pdo->prepare("
            UPDATE school_private_main SET
                school_id = :school_id,
                school_type = :school_type,
                school_name = :school_name,
                wilaya = :wilaya,
                location = :location,
                school_status = :school_status,
                phone = :phone,
                email = :email,
                commercial_number = :commercial_number,
                program_type = :program_type,
                owner_bulding = :owner_bulding,
                celender = :celender,
                low_class = :low_class,
                high_class = :high_class,
                owner_school = :owner_school,
                owner_national = :owner_national,
                renew_date_approval = :renew_date_approval,
                expired_date_approval = :expired_date_approval,
                year_start = :year_start
            WHERE number = :number
        ");

        // Bind parameters
        $stmt->bindParam(':school_id', $school_id);
        $stmt->bindParam(':school_type', $school_type);
        $stmt->bindParam(':school_name', $school_name);
        $stmt->bindParam(':wilaya', $wilaya);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':school_status', $school_status);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':commercial_number', $commercial_number);
        $stmt->bindParam(':program_type', $program_type);
        $stmt->bindParam(':owner_bulding', $owner_bulding);
        $stmt->bindParam(':celender', $celender);
        $stmt->bindParam(':low_class', $low_class);
        $stmt->bindParam(':high_class', $high_class);
        $stmt->bindParam(':owner_school', $owner_school);
        $stmt->bindParam(':owner_national', $owner_national);
        $stmt->bindParam(':renew_date_approval', $renew_date_approval);
        $stmt->bindParam(':expired_date_approval', $expired_date_approval);
        $stmt->bindParam(':year_start', $year_start);
        $stmt->bindParam(':number', $number, PDO::PARAM_INT);
        
        $stmt->execute();
        
        echo json_encode(["status" => "updated"]);
    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
    exit;
}
