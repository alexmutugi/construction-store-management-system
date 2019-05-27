<?php

namespace App\Http\Controllers;

use App\material_category;
use App\employee;
use App\material;
use App\material_detail;
use App\material_usage;
use App\supplier;
use App\tool;
use App\tool_category;
use App\tool_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.index');
    }

    public function currentMaterials()
    {
        $materials=material_detail::OrderBy('created_at','des')->get();
        $suppliers=supplier::all();
        $cats=material_category::all();
        $Tmaterials=material::all();
        $currents=material::all();

        return view('Admin.instore',compact('materials','suppliers','cats','Tmaterials','currents'));
    }
    public function materialsUsage()
    {
        $materials=material_detail::OrderBy('created_at','desc')->get();
        $usages=material_usage::OrderBy('created_at','desc')->get();
        $suppliers=supplier::all();
        $cats=material_category::all();
        $Tmaterials=material::all();





        return view('Admin.materialUsage',compact('materials','cats','suppliers','Tmaterials','bycats','selects','selecteds','usages'));

}
    public function materials()
    {
        $materials=material_detail::OrderBy('created_at','des')->get();
        $suppliers=supplier::all();
        $cats=material_category::all();
        $Tmaterials=material::all();

        return view('Admin.material',compact('materials','cats','suppliers','Tmaterials'));

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
        $alerts=material::where('current','<','5')->get();
        $employees=employee::all();
        $supps=supplier::all();

        return view('Admin.index',compact('alerts','supps','employees'));


    }
    public function workers()
    {

        $employees=employee::orderBy('created_at','des')->get();
        return view('Admin.workers',compact('employees'));



    }
    public function tools()
    {
        $toolss=tool_detail::all();
        $suppliers=supplier::all();
        $cats=tool_category::all();
       $tools=tool::all();
        return view('Admin.tools',compact('tools','suppliers','cats','tools','toolss'));
    }
    public function supliers()
    {
        $suppliers=supplier::all();
        return view('Admin.supliers',compact('suppliers'));



    }

    public function inStore()
    {

        $materials=material_detail::OrderBy('created_at','des')->where(['current'=> !null])->get();
        $suppliers=supplier::all();
        $cats=material_category::all();
        $Tmaterials=material::all();
        $currents=material::all();


        return view('Admin.instore',compact('materials','suppliers','cats','Tmaterials','currents'));

    }
}