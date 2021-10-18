<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Resources\TreatmentCollection;
use App\Models\Treatment;
use App\Models\Dentist;
use App\Models\Patient;
use App\Models\User;

class TreatmentController extends Controller
{
    /**
     * list of Treatments
     * 
     * @return view
     */
    public function list()
    {
        return response()->json(new TreatmentCollection(Treatment::all()));
    }
}
