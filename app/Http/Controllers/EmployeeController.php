<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use DB;
class EmployeeController extends Controller
{
    public function show(){
        return view('employees.index');
    }

    public function addEmployee(){
        return view('employees.add');
    }

    public function editEmployee($id=0){
        $employee = User::find($id);
        return view('employees.edit',compact('employee'));
    }
    public function store(Request $request, $id = 0)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',         
                'number' => 'required|string',
                'password' => 'required|string|min:6',
                'status' => 'required|in:1,2',
                'dob' => 'required|date',
            ]);

            if($request->picture){
                $validator = Validator::make($request->all(), [
                    'picture' => 'image|mimes:jpg,png'
                ]);
            }

            if ($validator->fails()) {
                print_r($validator->errors());exit;
                return redirect()->back()->withInput(Input::all())->withErrors($validator->errors());
            }

            if ($id == 0) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'number' => $request->number,
                    'password' => $request->password,
                    'status' => $request->status,
                    'date_of_birth' => $request->dob,
                ]);
            } else {        
                //edit account
                \App\User::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'number' => $request->number,
                    'password' => $request->password,
                    'status' => $request->status,
                    'date_of_birth' => $request->dob
                ]);
            } 

            if(isset($request->picture) && $request->hasFile($request->picture)) {
                $image = $request->file($request->picture);
                $fileName   = time() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->stream(); 
                Storage::disk('local')->put(public_path().'/iamges/'.$fileName, $img);
            }

        } catch (\Exception $e) {
            \Log::error(json_encode(['file name: ' => $e->getFile(), 'line no.' => $e->getLine(), 'error message: ' => $e->getMessage()]));
        }
        return redirect('/');
    }



    public function fetchAllEmployees(Request $request)
    {
        $request = $request->all();

        $sort_by = isset($request['order']) ? $request['order'][0]['column'] : 'datetime';
        $sort_dir = isset($request['order']) ? $request['order'][0]['dir'] : 'DESC';
        $offset = isset($request['start']) ? $request['start'] : 0;
        $limit = isset($request['length']) ? $request['length'] : 10;
        
        $params = array(
        'sort_by' => $sort_by,
        'sort_dir' => $sort_dir,
        'offset' => $offset,
        'limit' => $limit,
        );
        
        $filters = isset($request['filters']) ? $request['filters'] : [];
        
        $employees = User::fetchAllSMS($filters, $params);

        $data['draw'] = $request['draw'];
        $data['recordsTotal'] = $employees['recordsTotal'];
        $data['recordsFiltered'] = $employees['recordsFiltered'];
        
        $table_data = array();
        
        foreach ($employees['data'] as $key => $employee) {
            $temp = array(
            $offset + $key + 1 . '.',
            $employee['name'],
            $employee['email'],
            $employee['number'],
            $employee['date_of_birth'],
            $employee['status'] == 1 ? "Enabled" : "Disabled",
            $employee['action'] = '<button onclick=window.location="'.url("edit-employee")."/".$employee['id'].'">Edit</button>  
            <button onclick="deleteEmployee('.$employee["id"].')">Delete</button> <button onclick="changeStatus('.$employee['id'].','.$employee['status'].')">Change Status</button>'
            );
            array_push($table_data, $temp);
        }
        $data['data'] = $table_data;
        
        echo json_encode($data);
    }

    public function deleteEmployee(Request $request)
    {
        $response = false;
        try {
            // Soft Delete
            $employee = User::find($request->id);
            $employee->is_deleted = 1;
            $employee->save();   
           
            //Hard Delete
            //$employee->forceDelete();
            return response()->json(['success' => true ,'message' => 'Deleted Successfully.']);
        } catch(\Exception $e){
            \Log::error(json_encode(['file name: ' => $e->getFile(), 'line no.' => $e->getLine(), 'error message: ' => $e->getMessage()]));
            return response()->json(['success' => false ,'message' => 'Some error occurred.']);
        }
    }

    public function changeStatus(Request $request)
    {
        $response = false;
        try {
            $employee = User::find($request->id);
            $employee->status = $request->status == 1 ? 2 : 1;
            $employee->save();   

            return response()->json(['success' => true ,'message' => 'Status Updated Successfully.']);
        } catch(\Exception $e){
            \Log::error(json_encode(['file name: ' => $e->getFile(), 'line no.' => $e->getLine(), 'error message: ' => $e->getMessage()]));
            return response()->json(['success' => false ,'message' => 'Some error occurred.']);
        }
    }
}



