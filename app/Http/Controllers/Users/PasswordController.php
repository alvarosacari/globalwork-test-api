<?php

namespace App\Http\Controllers\Users;

use App\User;
use App\Rules\ValidNewPass;
use Illuminate\Http\Request;
use App\Rules\ValidCurrentPass;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
        $request->validate([
            'old_password' => ['required', 'string', new ValidCurrentPass($user)],
            'new_password' => ['required', new ValidNewPass($user)],
            'confirmation_password' => 'required|same:new_password',
        ]);

        $user->changePassword($request->new_password);

        return response()->json();
    }
}
