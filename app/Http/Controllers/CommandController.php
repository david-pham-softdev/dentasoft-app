<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandController extends Controller
{
    public function runCommand(Request $request)
    {
        if ($request->input('confirm') !== 'yes') {
            return response()->json(['message' => 'Confirmation required! Add ?confirm=yes to proceed.'], 400);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $tables = DB::select('SHOW TABLES');
        $dbName = env('DB_DATABASE');
        $key = "Tables_in_{$dbName}";

        foreach ($tables as $table) {
            $tableName = $table->$key;
            DB::table($tableName)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return response()->json([
            'message' => 'Command executed successfully.'
        ]);
    }
}
