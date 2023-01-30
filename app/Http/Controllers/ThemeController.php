<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{
    //
    public function create(Request $request){


        return view('themes.create');
     }
     public function store(Request $request){


        $validator = Validator::make($request->all(), [

            'objet' => 'string'


        ]);

        Theme::create($request->except('_token'));
        return redirect()->route('themes.index');
     }
     public function index(Request $request){
        $themes = Theme::orderBy('created_at', 'DESC')->paginate(5);

       return view('themes.index', ['themes' => $themes]);
    }
    public function edit(Request $request, Theme $theme){
        return view('themes.edit', ['theme' => $theme]);
    }
    public function update(Request $request, Theme $theme){
        $validator = Validator::make($request->all(), [

            'objet' => 'string',


        ]);

        $theme->update($request->except('_token'));
        return redirect()->route('themes.index');
    }
    public function deleteTheme(Theme $theme){

        $theme->delete();

        return redirect()->back();
     }
}
