<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Student;
 
class StrukController extends Controller
{
    public function index()
    {
    	$struk = Student::latest();
    	return view('students.index',['student'=>$struk]);
    }
 
    public function print()
    {
    	$struk = Student::latest();
 
    	$pdf = PDF::loadview('students.print',['student'=>$struk]);
    	return $pdf->download('struk.pdf');
    }
}
