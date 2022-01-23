<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

  protected $Promotion;

  public function __construct(StudentPromotionRepositoryInterface $Promotion)
  {
      $this->Promotion = $Promotion;
  } // End Of construct

  public function index()
  {
    return $this->Promotion->index();
  } // End Of Index


  public function create()
  {
    return $this->Promotion->create();
  } // End Of create


  public function store(Request $request)
  {
    return $this->Promotion->store($request);
  } // End Of Store

  public function destroy(Request $request)
  {
    return $this->Promotion->destroy($request);

  } // End Of Destroy

} // End Of Controller
