<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use function Symfony\Component\Console\Debug\getClientIp;
use Barryvdh\DomPDF\Facade\Pdf;
class EmployeeController extends Controller
{
    public function index(Request $request){
        if ($request->has('search')) {
            $data = Employee::where('name', 'LIKE', '%' .$request->search.'%')->paginate(5);
        } else {
            $data = Employee::paginate(5);
        }
        return view('datapegewai', compact('data'));
    }

    public function add(){
        return view('adddata');
    }

    public function insert(Request $request){
//        dd($request->all());
        $data = Employee::create($request->all());
        if ($request->hasFile('foto')){
            $request->file('foto')->move('photos/', $request->file('foto')->getClientOriginalName());
            $data -> foto = $request -> file('foto') -> getClientOriginalName();
            $data -> save();
        }
        return redirect()->route('pegewai')->with('success', 'New data success added!');
    }

    public function edit($id){
        $data = Employee::find($id);
//        dd($data);
        return view('edit', compact('data'));
    }
    public function update(Request $request, $id){
        $data = Employee::find($id);
        $data -> update($request -> all());
        return redirect() -> route('pegewai')->with('success', 'Data success updated!');
    }
    public function delete($id){
        $data = Employee::find($id);
        $data -> delete();
        return redirect()->route('pegewai')->with('success', 'Data success deleted!');
    }
    public function export(){
        $data = Employee::all();
        view()->share('data', $data);
        $pdf = PDF::loadView('data-pdf');
        return $pdf->download('data.pdf');
    }
}
