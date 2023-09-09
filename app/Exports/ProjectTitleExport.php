<?php

namespace App\Exports;
use App\Models\GroupData;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectTitleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return $report = GroupData::join('students','students.regno','=','group_data.regno')
        ->join('project_titles','project_titles.group_id','=','group_data.group_id')
        ->where('project_titles.title_status',2)
        ->orderBy('group_id','ASC')
        ->get(['project_titles.title','group_data.group_id','group_data.regno','students.fname','students.mname','students.lname']);
    }
}
