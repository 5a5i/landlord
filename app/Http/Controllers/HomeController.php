<?php

namespace App\Http\Controllers;

use \Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use \App\Tables\ScoresTable;
use App\Model\Members;
use App\Model\Scores;

class HomeController extends Controller
{
    public function index(): View
    {
        $table = (new ScoresTable)->setup();

        return view('welcome', compact('table'));
    }

    public function create(Request $request)
    {
      if ($request->isMethod('post')) {
        $inputs = Arr::except($request->input(),['submit','_token']);
        $member = Scores::create($inputs);
        return redirect()->route('scores.index')->with('status', 'New score '.$member->name.' added.');
      } else {
        $base = [
          'purpose' => 'scores',
          'operation' => 'create',
          'members' => Members::all(),
        ];
        return view('operation', $base);
      }
    }

    public function edit()
    {
        $table = (new ScoresTable)->setup();

        return view('welcome', compact('table'));
    }

    public function destroy(Request $request,$id)
    {
      dd($request->input('id'));
        $table = (new ScoresTable)->setup();

        return view('welcome', compact('table'));
    }
}
