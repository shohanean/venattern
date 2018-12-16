<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function login_me(Request $request)
    {
      echo $request->password;
      //$request->emailAddress;
    }
}
