<?php

namespace App\Http\Controllers;

use App\User;
use App\Competence;
use Illuminate\Http\Request;
use DB;
use Auth;

class UsersController extends Controller
{

  public function afficherAdmin()
  {

    $users = auth()->user();
    return view('users_admin', [
    'users' => $users, 
    ]);

  }

  public function afficherMember()
  {

    $users = auth()->user();
    return view('users', [
    'users' => $users, 
    ]);

  }

  public function btn_comp()
    {
      $competences = Competence::all();
      return view('comp', [
        'competences' => $competences,
       ]);
        
    }

    public function btn_comp_admin()
    {
      $competences = Competence::all();
      return view('comp_admin', [
        'competences' => $competences,
       ]);
        
    }

  public function updateAdmin(Request $req)
    {
        DB::table('competence_user')->where('user_id', Auth::user()->id)->where('competence_id', $req->id)->update(['level' => $req->level ]);
        return redirect()->route('current_users_admin');
    }
    public function deleteAdmin(Request $req)
    {
        DB::table('competence_user')->where('user_id', Auth::user()->id)->where('competence_id', $req->id)->delete();
        return redirect()->route('current_users_admin');
    }

    public function updateMember(Request $req)
    {
        DB::table('competence_user')->where('user_id', Auth::user()->id)->where('competence_id', $req->id)->update(['level' => $req->level ]);
        return redirect()->route('current_users_member');
    }
    public function deleteMember(Request $req)
    {
        DB::table('competence_user')->where('user_id', Auth::user()->id)->where('competence_id', $req->id)->delete();
        return redirect()->route('current_users_member');
    }
}
