<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    } // End Of construct


    public function index()
    {
       return $this->Student->Get_Student();
    } // End Of index


    public function create()
    {
        return $this->Student->Create_Student();
    } // End Of create

    public function store(StoreStudentsRequest $request)
    {
       return $this->Student->Store_Student($request);
    } // End Of store

    public function show($id){

     return $this->Student->Show_Student($id);

    } // End Of show


    public function edit($id)
    {
       return $this->Student->Edit_Student($id);
    } // End Of edit


    public function update(StoreStudentsRequest $request)
    {
        return $this->Student->Update_Student($request);
    } // End Of update


    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request);
    } // End Of destroy

    public function Get_classrooms($id)
    {
       return $this->Student->Get_classrooms($id);
    } // End Of Get_classrooms

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    } // End Of Get_Sections

    public function Upload_attachment(Request $request)
    {
        return $this->Student->Upload_attachment($request);
    } // End Of Upload_attachment

    public function Download_attachment($studentsname,$filename)
    {
        return $this->Student->Download_attachment($studentsname,$filename);
    } // End Of Download_attachment

    public function Delete_attachment(Request $request)
    {
        return $this->Student->Delete_attachment($request);

    } // End Of Delete_attachment

}
