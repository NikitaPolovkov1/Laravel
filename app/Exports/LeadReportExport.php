<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class LeadReportExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $lead;

    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    public function collection()
    {
        return $this->lead;
    }
}
