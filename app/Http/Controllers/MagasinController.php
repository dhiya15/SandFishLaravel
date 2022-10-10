<?php

namespace App\Http\Controllers;

use App\Models\Magasin;
use Illuminate\Http\Request;

class MagasinController extends Controller
{
    public function magasin()
    {
        $shop = Magasin::find(1);
        return response()->json($shop);
    }
}
