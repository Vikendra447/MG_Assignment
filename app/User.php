<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'number', 'password','date_of_birth','status','is_deleted','picture'
    ];

    protected $table = 'employee';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function fetchAllSMS($filters = array(), $params = array()){
    switch ($params['sort_by']) {
        case 0:
            $params['sort_by'] = 'id';
            break;
        case 1:
            $params['sort_by'] = 'name';
            break;
        case 3:
            $params['sort_by'] = 'email';
            break;
        case 4:
            $params['sort_by'] = 'number';
            break;
        case 7:
            $params['sort_by'] = 'status';
            break;
        default:
            $params['sort_by'] = 'created_at';
            $params['sort_dir'] = 'desc';
    }

    $where_clause = "";

    if (is_array($filters) && !empty($filters)) {
        if (!empty($filters['name'])) {
            $where_clause .= " name LIKE '%" . $filters['name'] . "%' AND";
        }
        if (!empty($filters['email'])) {
            $where_clause .= " email='{$filters['email']}' AND";
        }
        if (!empty($filters['number'])) {
            $where_clause .= " number='{$filters['number']}' AND";
        }
        if (!empty($filters['status'])) {
            $where_clause .= " status='{$filters['status']}' AND";
        }
    }

    $sql_without_filters = "SELECT count(temp.id) as recordsTotal FROM (SELECT id FROM employee WHERE is_deleted != 1) temp";
    // $sql_without_filters = "SELECT SQL_CALC_FOUND_ROWS id,name,email,number,status, date_of_birth FROM employee
    // WHERE is_deleted !=1";

    $recordsTotal = DB::select(DB::raw($sql_without_filters));
    $recordsTotal = json_decode(json_encode($recordsTotal), true);

    // $where_clause = rtrim($where_clause, 'AND');

    $sql = "SELECT SQL_CALC_FOUND_ROWS id,name,email,number,status,date_of_birth FROM employee
            WHERE $where_clause is_deleted !=1 ";

   
    $sql .= "ORDER BY {$params['sort_by']} {$params['sort_dir']} LIMIT {$params['limit']} OFFSET {$params['offset']}";
  
    $temp_result = DB::select(DB::raw($sql));
    $temp_result = json_decode(json_encode($temp_result), true);

    $rows_sql = "SELECT FOUND_ROWS() as recordsFiltered";
    $result2 = DB::select(DB::raw($rows_sql));
    $result2 = json_decode(json_encode($result2), true);


    $result['data'] = $temp_result;
    $result['recordsFiltered'] = (is_array($result2) && !empty($result2)) ? $result2[0]['recordsFiltered'] : 0;
    $result['recordsTotal'] = (is_array($recordsTotal) && !empty($recordsTotal)) ? $recordsTotal[0]['recordsTotal'] : 0;

    return $result;
}

   
}
