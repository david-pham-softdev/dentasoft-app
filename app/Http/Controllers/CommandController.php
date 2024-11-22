<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{
    public function runCommand(Request $request)
    {
        if ($request->input('confirm') !== 'yes') {
            return response()->json(['message' => 'Confirmation required! Add ?confirm=yes to proceed.'], 400);
        }

        $exitCode = Artisan::call('db:async');

        return response()->json([
            'message' => 'Command executed successfully.',
            'output' => Artisan::output(),
        ]);
    }
}
