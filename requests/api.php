<?php

require_once('database.php');
Class API extends DBConnection{
    public function __construct(){
        parent::__construct();
    }
    public function __destruct(){
		parent::__destruct();
	}

    function delete_member(){
        $id = $_POST['id'];
        // Delete Query
        $delete = $this->conn->query("DELETE FROM `requests` where no = '{$id}'");
        if($delete){
            $resp['status'] = 'success';
        }else{
            $resp['status'] = 'failed';
            $resp['msg'] = 'There\'s an error occured while deleting the data';
            $resp['error'] = $this->conn->error;
        }
        return json_encode($resp);
    }

}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$api = new API();
switch ($action){
    case('save'):
        echo $api->save_member();
        break;
    case('delete'):
        echo $api->delete_member();
        break;
    default:
        echo json_encode(array('status'=>'failed','error'=>'unknown action'));
        break;
 
}
?>