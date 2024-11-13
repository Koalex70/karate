<?php

namespace App\Imports;

use App\Models\Club;
use App\Models\Federation;
use App\Models\Participant;
use App\Models\Rank;
use App\Models\Trainer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ParticipantsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $federation = Federation::firstOrCreate(['name' => $row['federation'] ?? '-']);
        $club = Club::firstOrCreate(['name' => $row['club']], ['federation_id' => $federation->id]);

        $trainerFio = explode(' ', $row['trainer']);

        if (empty($trainerFio[1])) {
            dd($row);
        }

        $trainer = Trainer::firstOrCreate(['surname' => $trainerFio[0]], [
            'name' => explode('.', $trainerFio[1])[0],
            'patronymic' => explode('.', $trainerFio[1])[1],
            'club_id' => $club->id,
        ]);

        if (is_numeric($row['date_of_birth'])) {

            $row['date_of_birth'] = Date::excelToDateTimeObject($row['date_of_birth'])->format('Y-m-d');
        }

        $rank = Rank::where('rank', $row['rank'])->first();

        return new Participant([
            'name' => $row['name'],
            'surname' => $row['surname'],
            'patronymic' => $row['patronymic'] ?? null,
            'date_of_birth' => $row['date_of_birth'],
            'weight' => $row['weight'] ?? null,
            'trainer_id' => $trainer->id,
            'rank_id' => $rank->id,
            'club_id' => $club->id,
        ]);
    }
}
