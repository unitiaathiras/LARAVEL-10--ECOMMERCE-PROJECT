<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AdminLoginController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function authenticate(Request $request) {
        $validator = FacadesValidator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'

        ]);
        if ($validator->passes()) {

        } else {
            return redirect()->route('admin.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }
}
