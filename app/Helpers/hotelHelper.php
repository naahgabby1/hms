<?php



use Illuminate\Support\Facades\DB;

function hotel_details() {
    return DB::table('company_details')->first();
}






