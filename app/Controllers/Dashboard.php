<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $patientsModel = new \App\Models\PatientsModel();
        $loggedpatientID = session()->get('loggedPatient');
        $patientInfo = $patientsModel ->find($loggedpatientID);
        $data = [
            'title' => 'Dashboard',
            'patientInfo'=> $patientInfo
        ];
        return view('dashboard/index', $data);
    } 
}
