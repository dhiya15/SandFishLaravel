<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caravan extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        "student_full_name",
        "student_birth_date",
        "parent_full_name",
        "parent_email",
        "parent_phone_number",
        "student_photo",
        "student_birth_certificate",
        "is_accepted",
        "student_category",
        "student_state"
    ];

    public function showCertificate($crud = false)
    {
        return '</p><a class="btn btn-sm btn-link"
                   target="_blank"
                   href="' . url($this->student_birth_certificate) . '"
                   data-toggle="tooltip" title="Just a demo custom button.">
                   Show Certificate
                </a><br>';
    }

    public function acceptStudent($crud = false)
    {
        return '<a class="btn btn-sm btn-link"
                   href="' . url("/admin/accept-caravan-student") . '/'.$this->id . '"
                   data-toggle="tooltip" title="Just a demo custom button.">
                   Accept Student
                </a>';
    }

    public function refuseStudent($crud = false)
    {
        return '<a class="btn btn-sm btn-link"
                   href="' . url("/admin/refuse-caravan-student") . '/'.$this->id.'"
                   data-toggle="tooltip" title="Just a demo custom button.">
                   Refuse Student
                </a><br>';
    }

    public function switchCategory1($crud = false)
    {
        return '<a class="btn btn-sm btn-link"
                   href="' . url("/admin/switch-caravan-category1") . '/'.$this->id.'"
                   data-toggle="tooltip" title="Just a demo custom button.">
                   Switch Student to Category 1
                </a>';
    }
    public function switchCategory2($crud = false)
    {
        return '<a class="btn btn-sm btn-link"
                   href="' . url("/admin/switch-caravan-category2") . '/'.$this->id.'"
                   data-toggle="tooltip" title="Just a demo custom button.">
                   Switch Student to Category 2
                </a>';
    }
    public function switchCategory3($crud = false)
    {
        return '<a class="btn btn-sm btn-link"
                   href="' . url("/admin/switch-caravan-category3") . '/'.$this->id.'"
                   data-toggle="tooltip" title="Just a demo custom button.">
                   Switch Student to Category 3
                </a>';
    }

    public function isAccepted() {
        return ($this->is_accepted == 1) ? "Accepted" : "Refused";
    }
}
