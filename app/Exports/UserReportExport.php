<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class UserReportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function collection()
    {
        return $this->users;
    }
}
