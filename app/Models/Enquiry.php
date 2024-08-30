<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceMember;

class Enquiry extends Model
{
    use HasFactory;
    public function serviceMembersEnquiries(){

        return $this->hasMany(ServiceMember::class);

    }
}
