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
    public function list()
    {
        $treatments = Treatment::all();

        foreach ($treatments as $treatment) {
            $dentist = Dentist::find($treatment->dentist_id);
            $userDentist = User::find($dentist->user_id);
            $patient = Patient::find($treatment->patient_id);
            $userPatient = User::find($patient->user_id);

            $dentist->makeHidden('created_at'); //oculto el atributo
            $dentist->makeHidden('updated_at');
            $dentist->makeHidden('user_id');
            $dentist->full_name = $userDentist->name .' '. $userDentist->surname;
            $dentist->email = $userDentist->email;

            $patient->makeHidden('created_at');
            $patient->makeHidden('updated_at');
            $patient->makeHidden('user_id');
            $patient->full_name = $userPatient->name .' '. $userPatient->surname;
            $patient->email = $userPatient->email;

            $treatment->dentist = $dentist;
            $treatment->makeHidden('dentist_id');
            $treatment->patient = $patient;
            $treatment->makeHidden('patient_id');

            //cambiar formato de fechas
            $treatment->created_at = Carbon::parse($treatment->created_at)->format('d-m-Y');
            $treatment->updated_at = Carbon::parse($treatment->updated_at)->format('d-m-Y');
            $treatment->ended_at = Carbon::parse($treatment->ended_at)->format('d-m-Y');
        }

        return response()->json($treatments);
    }
}
