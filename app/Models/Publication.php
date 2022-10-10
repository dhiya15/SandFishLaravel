<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        "section_id",
        "icon",
        "image",
        "title",
        "description",
        "content"
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id')->withDefault();
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "uploads";
        $destination_path = "/uploads/publications";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public static function boot()
    {
        parent::boot();
        static::deleted(function($obj) {
            \Storage::disk('uploads')->delete($obj->image);
            \Storage::disk('uploads')->delete($obj->icon);
        });
    }

    public function setIconAttribute($value)
    {
        $attribute_name = "icon";
        $disk = "uploads";
        $destination_path = "/uploads/publications";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
