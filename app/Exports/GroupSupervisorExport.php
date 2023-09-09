<?php

namespace App\Exports;
use App\Models\GroupData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GroupSupervisorExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {   
        $current_year = date('Y');
        return  $g_report = GroupData::join('group_supervisors','group_supervisors.group_id','=','group_data.group_id')
        ->join('supervisors','supervisors.id','=','group_supervisors.supervisor_id')
        ->join('students','students.regno','=','group_data.regno')
        ->join('project_titles','project_titles.group_id','=','group_data.group_id')
        ->where('project_titles.title_status',2)
        ->whereYear('group_data.created_at',$current_year)
        ->orderBy('group_id','ASC')
        ->get(['group_data.group_id','project_titles.title','students.fname','students.mname','students.lname','group_data.regno','supervisors.firstname','supervisors.lastname']);
    }
    public function headings(): array
    {
        return ['Group Number','Project Title', 'Firstname','Middle name','Last name', 'Registration number','Supervisor`s firstname','Supervisor`s Lastname'];
    }
}
