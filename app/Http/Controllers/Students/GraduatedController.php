<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\StudentGraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
  protected $Graduated;

  public function __construct(StudentGraduatedRepositoryInterface $Graduated)
  {
      $this->Graduated = $Graduated;
  } // End Of construct

  public function index()
  {
     return $this->Graduated->index();
  } // End Of index

  public function create()
  {
      return $this->Graduated->create();
  } // End Of create

  public function store(Request $request)
  {
      return $this->Graduated->SoftDelete($request);
  } // End Of store

  public function update(Request $request)
  {
      return $this->Graduated->ReturnData($request);
  } // End Of update

  public function destroy(Request $request)
  {
     return $this->Graduated->destroy($request);
  } // End Of destroy

} // End Of Controller
