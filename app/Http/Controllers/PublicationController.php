<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    public function publications()
    {
        $pub = DB::table('publications')
            ->select(['publications.*', "sec.name as section_name"])
            ->join('sections AS sec', 'sec.id', '=', 'publications.section_id')
            ->get();
        return response()->json($pub);
    }
}
