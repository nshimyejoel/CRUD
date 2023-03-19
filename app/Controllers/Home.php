<?php

namespace App\Controllers;

use App\Models\CitizenModel;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $modelObject = new CitizenModel();
        $data['citizenData'] = $modelObject->findAll();

        return view('citizen', $data);
    }

    public function citizenRegister()
    {
        $modelObject = new CitizenModel();
        $session = session();

        $validation = \Config\Services::validation();

        $validation = $this->validate([
            'ni' => [
                'label' => 'National Id',
                'rules' => 'required|is_unique[citizen.national_id]',
                'errors' => [
                    'required' => 'Please provide a valid National ID.',
                    'is_unique' => 'The National ID you provided already exists in our records.',
                ],
            ],
            'na' => [
                'label' => 'Name(s)',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please provide your name.',
                ],
            ],
            'we' => [
                'label' => 'Weight',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please provide your weight.',
                ],
            ],
            'he' => [
                'label' => 'Height',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please provide your height.',
                ],
            ],
            'dt' => [
                'label' => 'Date of birth',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please provide your date of birth.',
                ],
            ],
        ]);
        if (!$validation) {
            $data['citizenData'] = $modelObject->findAll();
            $data['validation'] = $this->validator;

            return view('citizen', $data);
        } else {
            try {
                $data = [
                    'national_id' => $this->request->getPost('ni'),
                    'names' => $this->request->getPost('na'),
                    'weight' => $this->request->getPost('we'),
                    'height' => $this->request->getPost('he'),
                    'date_of_birth' => $this->request->getPost('dt'),
                ];

                $modelObject->insert($data);
                $session->setFlashdata('yego', 'Data have been saved');
            } catch (\Exception $e) {
                $session->setFlashdata('oya', 'Data not saved');
            }
        }

        return redirect()->to('/');
    }

    public function deleteCitizen($national_id)
    {
        $modelObject = new CitizenModel();
        $modelObject->delete($national_id);
        $session = session();
        if ($modelObject->delete($national_id)) {
            $session->setFlashdata('yego', 'Data deleted');
        } else {
            $session->setFlashdata('oya', 'Data failed to delete');
        }

        return redirect()->to('/');
    }

    public function getCitizenData($national_id)
    {
        $modelObject = new CitizenModel();
        $data['citizenData'] = $modelObject->find($national_id);

        return view('updateForm', $data);
    }

    public function updateDataCitizen($national_id)
    {
        $modelObject = new CitizenModel();
        $session = session();
        $data = [
            'national_id' => $this->request->getPost('ni'),
            'names' => $this->request->getPost('na'),
            'weight' => $this->request->getPost('we'),
            'height' => $this->request->getPost('he'),
            'date_of_birth' => $this->request->getPost('dt'),
        ];

        if ($modelObject->update($national_id, $data)) {
            $session->setFlashdata('yego', 'Data Updated');
        } else {
            $session->setFlashdata('oya', 'Data failed to update');
        }

        return redirect()->to('/');
    }
}
