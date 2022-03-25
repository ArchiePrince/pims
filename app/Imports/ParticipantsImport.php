<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class ParticipantsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure

{
    use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Participant([
            'f_name' =>$row['first_name'],
            'l_name' =>$row['last_name'],
            'gender' =>$row['gender'],
            'p_email' =>$row['email'],
            'profession' =>$row['profession'],
            'org' =>$row['organization'],
            'workloc' =>$row['work_location'],
            'district' =>$row['district'],
            'region' =>$row['region'],
            'tel' =>$row['telephone'],
            'phone' =>$row['mobile_number'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.first_name' => ['string', 'required', 'max:255'],
            '*.last_name' => ['string', 'required', 'max:255'],
            '*.gender' => 'required',
            '*.email' => ['email', 'string', 'max:255', 'unique:participants,p_email'],
            '*.profession' => ['string','required'],
            '*.organization' => ['string','required', 'max:255'],
            '*.work_location' => ['string','required', 'max:255'],
            '*.district' => ['string','required', 'max:255'],
            '*.region' => ['string','required', 'max:255'],
            '*.telephone' => 'required',
            '*.mobile_number' => 'required',
        ];
    }



}
