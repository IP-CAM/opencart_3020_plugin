<?php
/**
 * Manage_model
 */
class LogisticsSearch_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Test Debug Search All Logistics
    public function searchAllLogistics() {
        $this->db->select('*');
        $allLogisticsObj = $this->db->get('oc_01_dev_logistics');

        var_dump($allLogisticsObj->result_array());
    }

//    // Get Employee List Count
//    public function getEmployeeListCount($searchArray = null) {
//        if ($searchArray) {
//            $this->db->like($searchArray['search_type'], $searchArray['search_text'], 'both');
//        }
//        $count = $this->db->count_all_results('user');
//        if ($count) {
//            return $count;
//        } else {
//            throw new Exception("Search Not Found");
//        }
//    }
//    // Get Employee List
//    public function getEmployeeList($initNumber, $showNumber, $searchArray = null) {
//        $cityList = $this->master_model->getTypeList(TYPE_CITY);
//
//        $this->db->select('id,username,level,name,email,area,create_time,update_time');
//        if ($searchArray) {
//            $this->db->like($searchArray['search_type'], $searchArray['search_text'], 'both');
//        }
//        $query = $this->db->get('user', $showNumber, $initNumber);
//
//        // result logic
//        if ($query->num_rows() == 0) {
//            throw new Exception("Search Not Found");
//        } else {
//            $employeeListArray = array();
//
//            foreach ( $query->result_array() as $row ) {
//                $initNumber++;
//                switch ($row['level']) {
//                    case 1 :
//                        $level = 'Administrator';
//                        break;
//                    case 2 :
//                        $level = 'Staff';
//                        break;
//                    case 3 :
//                        $level = 'Employee';
//                        break;
//                    case 4 :
//                        $level = 'Customer';
//                        break;
//                    default :
//                        $level = 'Unknow User';
//                }
//
//                $employeeListArray[] = array(
//                        'number' => $initNumber,
//                        'id' => $row['id'],
//                        'username' => $row['username'],
//                        'level' => $level,
//                        'levelNumber' => $row['level'],
//                        'name' => $row['name'],
//                        'email' => $row['email'],
//                        'area_name' => isset($cityList[$row['area']]) ? $cityList[$row['area']] : 'Unknow Area',
//                        'area' => $row['area'],
//                        'create_time' => date("Y-m-d", $row['create_time']),
//                        'update_time' => date("Y-m-d H:i", $row['update_time'] != 0 ? $row['update_time'] : '')
//                );
//            }
//        }
//        return $employeeListArray;
//    }
//
//    // Create Account
//    public function createAccount($createArray) {
//        // Check exist user
//        $this->searchAccountCount($createArray['username']);
//
//        $createArray['password'] = password_hash($createArray['orig_password'], CRYPT_BLOWFISH);
//        $createArray['orig_password'] = md5($createArray['orig_password']);
//        $createArray['name'] = 'nickname_' . $createArray['username'];
//        $createArray['email'] = '@';
//        $createArray['area'] = $createArray['area'];
//        $createArray['create_time'] = time();
//        $createArray['update_time'] = 0;
//        $createArray['first_login'] = 1;
//        $createArray['access_token'] = md5($createArray['create_time']);
//
//        // result logic
//        if ($this->db->insert('user', $createArray)) {
//            $resultArray = (array(
//                    'messageColor' => '#0B9A0B',
//                    'getMessage' => '<h3>Create New Account Success !</h3>'
//            ));
//            return $resultArray;
//        } else {
//            throw new Exception("Create New Account Error");
//        }
//    }
//
//    // Search Account Count
//    public function searchAccountCount($username) {
//        $this->db->select('username');
//        $this->db->where('username', $username);
//        $count = $this->db->count_all_results('user');
//        // result logic
//        if ($count) {
//            throw new Exception("Create New Account Error !!! Existing User $username");
//        }
//    }
//
//    // Search Account
//    public function searchAccount($id, $username) {
//        $this->db->select('level');
//        $this->db->where('id', $id);
//        $this->db->where('username', $username);
//        $accountObj = $this->db->get('user');
//
//        // result logic
//        if ($accountObj->num_rows() == 1) {
//            $accountObjArray = $accountObj->result();
//            $accountObj = $accountObjArray[0];
//            return $accountObj;
//        } else {
//            throw new Exception("Modify Account Error !!! Data Error");
//        }
//    }
//
//    // Update Account
//    public function updateAccount($modifyArray) {
//        switch ($modifyArray['type']) {
//            case 'change_password' :
//                $modifyArray['password'] = password_hash($modifyArray['orig_password'], PASSWORD_DEFAULT);
//                $modifyArray['orig_password'] = md5($modifyArray['orig_password']);
//                $this->db->set('orig_password', $modifyArray['orig_password']);
//                $this->db->set('password', $modifyArray['password']);
//                $this->db->set('first_login', 1);
//                break;
//            case 'change_level' :
//                if ($modifyArray['level'] == LEVEL_ADMIN) {
//                    $accountObj = $this->searchAccount($modifyArray['id'], $modifyArray['username']);
//                    if ($accountObj->level != LEVEL_ADMIN) {
//                        throw new Exception("Modify Account Error !!! Can Not Modify Level");
//                    }
//                } else {
//                    $this->db->set('level', $modifyArray['level']);
//                }
//                $this->db->set('area', $modifyArray['area']);
//                break;
//            default :
//                redirect('manage/index');
//        }
//
//        $this->db->where('id', $modifyArray['id']);
//        $this->db->where('username', $modifyArray['username']);
//
//        // result logic
//        if ($this->db->update('user')) {
//            $resultArray = (array(
//                    'messageColor' => '#0B9A0B',
//                    'getMessage' => '<h3>Update Account Success !</h3>'
//            ));
//            return $resultArray;
//        } else {
//            throw new Exception("Update Account Error");
//        }
//    }
//
//    // Delete Account
//    public function deleteAccount($deleteArray) {
//        $accountObj = $this->searchAccount($deleteArray['id'], $deleteArray['username']);
//        if ($accountObj->level == LEVEL_ADMIN) {
//            throw new Exception("Delete Account Error !!! Can not Delete Administrator");
//        }
//        $this->db->where('id', $deleteArray['id']);
//        $this->db->where('username', $deleteArray['username']);
//
//        // result logic
//        if ($this->db->delete('user')) {
//            $resultArray = (array(
//                    'messageColor' => '#FF00FF',
//                    'getMessage' => '<h3>Delete Account Success !</h3>'
//            ));
//            return $resultArray;
//        } else {
//            throw new Exception("Delete Account Error");
//        }
//    }
}