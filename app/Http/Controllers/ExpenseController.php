<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Expensetype;
use App\Models\Customer;
use App\Models\Countries;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\Expect;
use App\CustomClass\Userdetails;
use App\CustomClass\Userroles;

class ExpenseController extends Controller
{
protected $userDetails;
protected $userRoles;
public function __construct(Userdetails $userDetails, Userroles $userRoles)
{
$this->userDetails = $userDetails;
$this->userRoles = $userRoles;
}



public function index(){
$delete_permission = 0;
$title = 'Expenses';
$breadCrumbs = 'Hotel Expenses';
$expenses_type = Expensetype::all();
if ($this->userRoles->isEither([1,2])) {
$expenses_captured = Expense::all()->sum('amount');
$expenses_data = DB::table('vw_expenses')->get();
}else{
$expenses_captured = Expense::all()
->where('entered_by',$this->userDetails->username())
->sum('amount');
$expenses_data = DB::table('vw_expenses')
->where('entered_by',$this->userDetails->username())
->get();
}
if ($this->userRoles->isEither([1,2])) {
$delete_permission = 1;
}
return view('pages.expenses.index',
compact('title','breadCrumbs','expenses_data','expenses_type','expenses_captured','delete_permission'));
}


public function index_exptypes(){
$title = 'Expenses';
$breadCrumbs = 'Hotel Expenses Types / Categories';
$ExpenType_data = Expensetype::all();
$ExpensesCount = $ExpenType_data->count();
$ExpensesCaptured = Expense::all()->sum('amount');
return view('pages.expenses.expenses_types', compact('title','breadCrumbs','ExpenType_data','ExpensesCount','ExpensesCaptured'));
}



public function save_expenses_category(Request $request){
$title = 'Expenses';
$breadCrumbs = 'Hotel Expenses Types / Categories ';
$validated = $request->validate([
'expenses_type' => 'required',
'description' => 'required'
]);

$Expense = new Expensetype();
$Expense->expenses_type = $request->input('expenses_type');
$Expense->description = $request->input('description');
$Expense->entered_by = Auth::guard('logindetails')->user()->email;
$Expense->save();
$notification = array('success'=>"Expenses Category Saved");
return back()->with($notification);
}



public function save_expenses(Request $request){
$title = 'Expenses';
$breadCrumbs = 'Hotel Expenses';
$validated = $request->validate([
'exp_category' => 'required',
'amount' => 'required'
]);


$Expen = new Expense();
$Expen->exp_type = $request->input('exp_category');
$Expen->comments = $request->input('comment');
$Expen->amount = $request->input('amount');
$Expen->entered_by = Auth::guard('logindetails')->user()->email;
$Expen->save();
$notification = array('success'=>"Expenses Saved");
return back()->with($notification);
}


public function update_expenses_category(Request $request, $id){
$title = 'Expenses';
$breadCrumbs = 'Hotel Expenses Types / Categories ';
Expensetype::findOrFail($id)->update([
'expenses_type'=>$request->input('expenses_type_edits'),
'description'=>$request->input('description_edits')
]);
$notification = array('success'=>"Expenses Updated");
return back()->with($notification);

}

public function update_expenses(Request $request, $id){
$title = 'Expenses';
$breadCrumbs = 'Hotel Expenses';
Expense::findOrFail($id)->update([
'exp_type'=>$request->input('exp_category_edit'),
'comments'=>$request->input('comment_edit'),
'amount'=>$request->input('amount_edit')
]);
$notification = array('success'=>"Expenses Updated");
return back()->with($notification);

}



public function destroy_expenses($id){
$title = 'Expenses';
$breadCrumbs = 'Hotel Expenses';
Expense::findOrFail($id)->delete();
$notification = array('success'=>"Expenses Deleted");
return back()->with($notification);
}




public function destroy_expenses_category($id){
$title = 'Expenses';
$breadCrumbs = 'Hotel Expenses Types / Categories ';
Expensetype::findOrFail($id)->delete();
$notification = array('success'=>"Expenses Category Deleted");
return back()->with($notification);
}
}
