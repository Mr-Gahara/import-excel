<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function import_excel()
    {
        return view("import_excel");
    }

    public function import_excel_post(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new UserImport, $request->file('excel_file'));

        return redirect()->back();
        
    }


    
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'class_name' => 'required|string',
        ]);

        return User::create($request->all());
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'class_name' => 'required|string',
        ]);

        $contact = User::findOrFail($id);
        $contact->update($request->all());

        return $contact;
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return response()->noContent();
    }
}