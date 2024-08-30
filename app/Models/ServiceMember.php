<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Enquiry;


class ServiceMember extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }
}
