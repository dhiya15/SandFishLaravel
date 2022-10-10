<?php

namespace App\Http\Controllers;

use App\Models\Magasin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function init()
    {
        $shop = Magasin::find(1);
        $faq_header = $this->getSection("faq_header");
        $faq_content = $this->getSection("faq_content");
        $department_header = $this->getSection("department_header");
        $department_content = $this->getSection("department_content");
        $services_header = $this->getSection("services_header");
        $services_content = $this->getSection("services_content");
        $how_it_work_header = $this->getSection("how_it_work_header");
        $how_it_work_content = $this->getSection("how_it_work_content");
        $gallery_header = $this->getSection("gallery_header");
        $gallery_content = $this->getSection("gallery_content");
        $why_us_header = $this->getSection("why_us_header");
        $why_us_content = $this->getSection("why_us_content");

        return response()->json([
            "magasin" => $shop,
            "faq_header" => $faq_header,
            "faq_content" => $faq_content,
            "department_header" => $department_header,
            "department_content" => $department_content,
            "services_header" => $services_header,
            "services_content" => $services_content,
            "how_it_work_header" => $how_it_work_header,
            "how_it_work_content" => $how_it_work_content,
            "gallery_header" => $gallery_header,
            "gallery_content" => $gallery_content,
            "why_us_header" => $why_us_header,
            "why_us_content" => $why_us_content
        ]);
    }

    public function getSection($section_name) {
        return DB::table('publications')
            ->select(['publications.*', "sec.name as section_name"])
            ->join('sections AS sec', 'sec.id', '=', 'publications.section_id')
            ->where("sec.name", "=", $section_name)
            ->get();
    }

    public function publication($id)
    {
        $shop = Magasin::find(1);
        $pub = DB::table('publications')
            ->select(['publications.*', "sec.name as section_name"])
            ->join('sections AS sec', 'sec.id', '=', 'publications.section_id')
            ->where("publications.id", "=", $id)
            ->get();

        return response()->json([
            "magasin" => $shop,
            "pub" => $pub
        ]);
    }

}
