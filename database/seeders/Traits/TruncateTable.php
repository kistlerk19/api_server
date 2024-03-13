<?php

namespace Database\Seeders\Traits;

use App\Models\User;
use Illuminate\Support\Facades\DB;

trait TruncateTable
{
    protected function truncate($table)
    {
        DB::table($table)->truncate();
    }
}
