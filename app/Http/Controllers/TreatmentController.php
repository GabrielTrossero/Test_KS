<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $treatments = Treatment::all();

        foreach ($treatments as $treatment) {
            //formalize json Dentist
            $treatment->dentist->email = $treatment->dentist->user->email;
            $treatment->dentist->makeHidden('user');
            $treatment->dentist->makeHidden('created_at');
            $treatment->dentist->makeHidden('updated_at');
            $treatment->dentist->makeHidden('user_id');

            //formalize json Patient
            $treatment->patient->email = $treatment->patient->user->email;
            $treatment->patient->makeHidden('user');
            $treatment->patient->makeHidden('created_at');
            $treatment->patient->makeHidden('updated_at');
            $treatment->patient->makeHidden('user_id');

            //formalize json Treatment
            $treatment->makeHidden('dentist_id');
            $treatment->makeHidden('patient_id');
        }

        return response()->json($treatments);
    }
}
