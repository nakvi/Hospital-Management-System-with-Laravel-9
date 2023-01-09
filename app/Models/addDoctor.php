<?php

namespace App\Models;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class addDoctor extends Model
{
    use Uuids;
    use SoftDeletes;
    use HasFactory;
    protected $fillable =
    [
        "name",
        "phone",
        "doctor",
        "roomNo",
        "image",
        "created_at",
        "updated_at"
    ];

}
