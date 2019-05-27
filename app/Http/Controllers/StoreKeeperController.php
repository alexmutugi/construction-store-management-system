<?php

namespace App\Http\Controllers;

use App\employee;
use App\material;
use App\material_category;
use App\material_detail;
use App\material_usage;
use App\supplier;
use App\tool;
use App\tool_category;
use App\tool_detail;
use App\tools_allocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreKeeperController extends Controller
{
    //
    public function index()
    {
        return view('Storekeeper.index');
    }

    public function currentMaterials()
    {
        $materials=material_detail::OrderBy('created_at','des')->get();
//        $suppliers=supplier::all();
        $cats=material_category::all();
        $Tmaterials=material::all();
        $currents=material::all();

        return view('Storekeeper.instore',compact('materials','suppliers','cats','Tmaterials','currents'));
    }
    public function materialsUsage()
    {
        $materials=material_detail::OrderBy('created_at','desc')->get();
        $usages=material_usage::OrderBy('created_at','desc')->get();
//        $suppliers=supplier::all();
        $cats=material_category::all();
        $Tmaterials=material::all();





        return view('Storekeeper.materialUsage',compact('materials','cats','suppliers','Tmaterials','bycats','selects','selecteds','usages'));

    }
    public function materials()
    {
        $materials=material_detail::OrderBy('created_at','des')->get();
//        $suppliers=supplier::all();
        $cats=material_category::all();
        $Tmaterials=material::all();

        return view('Storekeeper.material',compact('materials','cats','suppliers','Tmaterials'));

    }

    public function SaveUsage(Request $request){

        $usage=new material_usage();
        $usage->material_id=request('name');
        $usage->date=request('date');
        $usage->quantity=request('quantity');
        $usage->material_category_id=request('category');
        $usage->user_id=Auth::id();

        $id=\request('name');
        $q=\request('quantity');

        $Q1 = material::find(\request('name'));
        if ($q > $Q1->current) {
            $cu=$Q1->current;
            return redirect()->back()->with('oops',' your usage is more than the available material');
            exit();
        }else {
            $current = $Q1->current - $q;

            DB::table('materials')
                ->where("materials.id", '=', $id)
                ->update(['materials.current' => $current]);

            $usage->save();
            return redirect()->back()->with('status', 'saved successfully');
        }
    }

    public function dashboard()
    {
        return view('Admin.index');


    }
    public function workers()
    {
        $employees=employee::orderBy('created_at','des')->get();
        return view('Storekeeper.workers',compact('employees'));
    }
    public function tools()
    {
        $toolss=tool_detail::orderBy('created_at','desc')->get();
        $suppliers=supplier::all();
        $cats=tool_category::all();
        $tools=tool::all();
        return view('Storekeeper.tools',compact('tools','suppliers','cats','tools','toolss','suppliers'));
    }
//    public function supliers()
//    {
//        $suppliers=supplier::all();
//        return view('Admin.supliers',compact('suppliers'));
//    }

    public function inStore()
    {
        $materials=material_detail::OrderBy('created_at','des')->get();
//        $suppliers=supplier::all();
        $cats=material_category::all();
        $Tmaterials=material::all();
        $currents=material::all();

        return view('Storekeeper.instore',compact('materials','suppliers','cats','Tmaterials','currents'));

    }


    public function saveAllocate(Request $request)
    {
        $allocate=new tools_allocation();
        $allocate->date=request('date');
        $allocate->quantity=request('quantity');
        $allocate->user_id=Auth::id();
        $allocate->tool_category_id=request('cat');
        $allocate->employee_id=request('employee');
        $allocate->tool_id=request('tool');
        $allocate->status='pending';

        $allocate->save();

        return redirect('/view/allocate');
    }

    public function viewAllocate(){

        $allocates=tools_allocation::where('status','pending')->orderBy('created_at','des')->get();

        return view('Admin.viewAllocation',compact('allocates'));
    }
    public function Allocate(){
        $employees=employee::all();
        $ctools=tool_category::all();
        $tools=tool_detail::all();
        $allocates=tools_allocation::orderBy('created_at','des')->get();

        return view('Admin.allocate',compact('allocates','employees','tools','ctools'));
    }



    //reports
    public function report()
    {
        $tools=tools_allocation::all();
     return view('storekeepers.IndexReport',compact('tools'));
    }
    public function reportcurrent()
    {
        $data=material::all();
     return view('storekeepers.currentReport',compact('data'));
    }
    public function reportusage()
    {
        $data=material_usage::all();
     return view('storekeepers.usageReport',compact('data'));
    }
}
