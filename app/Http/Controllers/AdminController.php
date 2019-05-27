<?php

namespace App\Http\Controllers;

use App\current_material;
use App\material_category;
use App\employee;
use App\material;
use App\material_detail;
use App\supplier;
use App\tool;
use App\tool_category;
use App\tool_detail;
use App\tools_allocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function newCategory()
    {
        return view('Admin.newCategory');
    }

    public function saveMaterialCategory(Request $request)
    {
        $this->validate(request(),[
            'category'=>'required',
        ]);
        $identity=Auth::id();
        $cat=new material_category();
        $cat->category=$request['category'];
        $cat->user_id=$identity;

        $cat->save();

        return back()->with('success','Category saved successfully');

    }
    public function saveMaterial(Request $request){
        $this->validate(request(),[
            'name'=>'required',
            'date'=>'required',
            'supplier'=>'required',
            'quantity'=>'required',
            'category'=>'required',
            'unit'=>'required',
        ]);
        $id=\request('name');
        $q=\request('quantity');

        $smaterial=new material_detail();
        $smaterial->material_id=$id;
        $smaterial->date=request('date');
        $smaterial->supplier_id=request('supplier');
        $smaterial->quantity=request('quantity');
        $smaterial->unit=request('unit');
        $smaterial->material_category_id=request('category');




            $Q1 = material::find(\request('name'));
            $current=$Q1->current+$q;

            DB::table('materials')
                ->where("materials.id", '=',  $id)
                ->update(['materials.current'=> $current]);
//

                $smaterial->save();

        return redirect()->back()->with('status','saved successfully');
    }

    public function materialview($material)
    {
        $selected=material::findOrFail($material);
        $suppliers=supplier::all();
        $cats=material_category::all();

        return view('Admin.EditMaterial',compact('selected','selected','suppliers','cats','material'));

    }

    public function updateMaterial(Request $request,$material)
    {
        $update=material::FindOrFail($material);
        $update->update(array(
            'name'=>request('name'),
            'date'=>request('date'),
            'supplier'=>request('supplier'),
            'category'=>request('category'),
            'quantity'=>request('quantity'),
            'unit'=>request('unit'),
        ));

        return redirect('/materials')->with('success','Material was successfully updated');
    }

    public function saveMaterialType(Request $request)
    {
        $save=new material();
        $save->material_category_id=\request('category');
        $save->name=\request('type');
        $save->current=0;
//        $save->user_id=Auth::id();

        $save->save();

        return redirect()->back()->with('success','Added successfully');

    }
    public function DeleteMaterial($material)
    {
        $delete=material_detail::findOrFail($material);
        $delete->delete();

       return back()->with('success','Material deleted successfully');
    }

    public function OneMaterialCategory($cat)
    {
        $materials=material_detail::where('material_category_id',$cat)->get();
        $cats=material_category::all();
        $selected=material_category::find($cat);
        $suppliers=supplier::all();

        return view('Admin.ByCategory',compact('materials','cats','selected','suppliers'));
    }

    public function viewAByMaterialType($type)
    {
        $materials=material_detail::where('material_id',$type)->get();
        $cats=material_category::all();
        $selected=material::find($type);
        $Tmaterials=material::all();
        $suppliers=supplier::all();

        return view('Admin.MaterialsByType',compact('Tmaterials','cats','selected','suppliers','materials'));

    }

    public function saveToolCategory(Request $request)
    {
        $this->validate(request(),[
            'category'=>'required',
        ]);
        $identity=Auth::id();
        $cat=new tool_category();
        $cat->category=$request['category'];
        $cat->user_id=$identity;

        $cat->save();

        return back()->with('success','Category saved successfully');

    }

    public function saveToolType(Request $request)
    {
        $save=new tool();
        $save->tool_category_id=\request('category');
        $save->name=\request('type');
        $save->user_id=Auth::id();

        $save->save();

        return redirect()->back()->with('success','Added successfully');

    }
    public function saveTool(Request $request){
        $this->validate(request(),[
            'tool'=>'required',
            'date'=>'required',
            'supplier'=>'required',
            'quantity'=>'required',
            'category'=>'required',
            'unit'=>'required',
        ]);

        $smaterial=new tool_detail();
        $smaterial->tool_id=request('tool');
        $smaterial->date=request('date');
        $smaterial->supplier_id=request('supplier');
        $smaterial->quantity=request('quantity');
        $smaterial->unit=request('unit');
        $smaterial->tool_category_id=request('category');

        $smaterial->save();
        return back()->with('status','saved successfully');
    }

    public function OneToolCategory($cat)
    {
        $tools=tool_detail::where('tool_category_id',$cat)->get();
        $cats=tool_category::all();
        $selected=tool_category::find($cat);
        $suppliers=supplier::all();
        $selecteds=tool_detail::groupBy('tool_id')->get(['tool_id',DB::Raw('sum(quantity) AS totals')]);
        $bycats=tool_detail::distinct('tool_id')->get(['tool_category_id']);

        return view('Admin.ByToolCategory',compact('tools','cats','selected','suppliers','selecteds','bycats'));
    }

    public function viewAtoolType($id)
    {
        $toolss=tool_detail::where('tool_id',$id)->get();
        $cats=tool_category::all();
        $tools=tool::all();
        $selected=tool::find($id);
        $suppliers=supplier::all();
//        $selecteds=tool_detail::groupBy('tool_id')->get(['tool_id',DB::Raw('sum(quantity) AS totals')]);
//        $bycats=tool_detail::distinct('tool_id')->get(['tool_category_id']);

        return view('Admin.ByToolType',compact('tools','cats','selected','suppliers','toolss'));

    }

    public function viewAtool($tool)
    {
        $selected=tool_detail::find($tool);
        $cats=tool_category::all();
        $tools=tool::all();
        $suppliers=supplier::all();

        return view('Admin.viewAtool',compact('selected','tools','cats','suppliers'));
    }

    public function updateTool(Request $request, $selected)
    {
        $update=new tool_detail();
        $update->tool_id=request('tool');
        $update->date=request('date');
        $update->supplier_id=request('supplier');
        $update->quantity=request('quantity');
        $update->unit=request('unit');
        $update->tool_category_id=request('category');

        $data=array(
            'tool_id'=>$update->tool_id,
            'date'=>$update->date,
            'supplier_id'=>$update->supplier_id,
            'quantity'=>$update->quantity,
            'unit'=>$update->unit,
            'tool_category_id'=>$update->tool_category_id,
        );
        tool_detail::where('id',$selected)->update($data);

        return redirect()->back()->with('success','Tool information updated successfully');
    }

    public function DeleteTool($tool)
    {
        $selected=tool_detail::find($tool);
        $selected->delete();

        return back()->with('success','Tool deleted');

    }


    public function saveSupplier(Request $request){
        $this->validate(request(),[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',

        ]);

        $supplier=new supplier();
        $supplier->name=request('name');
        $supplier->phone=request('phone');
        $supplier->email=request('email');


        $supplier->save();

        return back()->with('status','saved successfully');
    }

    public function viewSupplier($id)
    {
        $selected=supplier::find($id);
        $suppliers=supplier::all();
        $msupplier=material_detail::where('supplier_id',$id)->get();
        $tsupplier=tool_detail::where('supplier_id',$id)->get();

        return view('Admin.Asupplier',compact('selected','suppliers','id','msupplier','tsupplier'));

    }

    public function updateASupplier(Request $request, $selected)
    {
        $update=new supplier();
        $update->name=request('name');
        $update->email=request('email');
        $update->phone=request('phone');

        $data=array(
            'email'=>$update->email,
            'name'=>$update->name,
            'phone'=>$update->phone,
        );
        tool_detail::where('id',$selected)->update($data);

        return redirect()->back()->with('success','Tool information updated successfully');
    }

    public function saveEmployee()
    {
        $this->validate(request(),[
            'name'=>'required',
            'phone'=>'required',
            'id_no'=>'required|unique:employees|max:8',
            'area'=>'required',
            'status'=>'required',

        ]);

        $employee=new employee();
        $employee->name=request('name');
        $employee->phone=request('phone');
        $employee->id_no=request('id_no');
        $employee->user_id=Auth::id();
        $employee->area=request('area');
        $employee->status=request('status');


        $employee->save();

        return back()->with('status','saved successfully');
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

    public function recieve($allocation)
    {
// updating method 1
//        DB::table('tools_allocations')
//            ->where('id', $allocation)
//            ->update(['status' => 'Recieved']);

// updating method 2
        tools_allocation::where('id',$allocation)->update([
            'status' => 'Recieved'
        ]);


        return redirect()->back()->with('success','Item Recieved Successfully');


    }

    public function employeeAllocation($allocation)
    {
        $emp=tools_allocation::where('id',$allocation)->first();

        return view('Admin.employeeAllocation',compact('emp'));
    }

    public function viewASupplier($id)
    {
        $selected=supplier::find($id);

        return view('Admin.Asupplier',compact('selected'));
    }

}
