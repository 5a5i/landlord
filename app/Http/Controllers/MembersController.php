<?php

namespace App\Http\Controllers;

use \Illuminate\View\View;
use Illuminate\Http\Request;
use \App\Tables\MembersTable;
use App\Model\Members;

class MembersController extends Controller
{
    public function index(): View
    {
        $table = (new MembersTable)->setup();

        return view('members.index', compact('table'));
    }

    public function create(Request $request)
    {
      // dd($request->method());
      if ($request->isMethod('post')) {
        $member = Members::create(['name' => $request->input('name')]);
        return redirect()->route('members.index')->with('status', 'New member '.$member->name.' added.');
      } else {
        $base = [
          'purpose' => 'members',
          'operation' => 'create',
        ];
        return view('operation', $base);
      }
    }

    public function edit(Request $request, $id)
    {
      // dd($request->method());
      if ($request->isMethod('post')) {
        $member = Members::find($id);
        $name = $member->name;
        $member->update(['name' => $request->input('name')]);
        return redirect()->route('members.index')->with('status', 'Existing member '.$name.' name updated to '.$member->name.'.');
      } else {
        $member = Members::find($id);
        // dd($member->name);
        $base = [
          'purpose' => 'members',
          'operation' => 'edit',
          'values' => $member,
        ];
        return view('operation', $base);
      }
    }

    public function destroy(Request $request,$id)
    {
      dd($request->input('id'));
        $table = (new MembersTable)->setup();

        return view('welcome', compact('table'));
    }
}
