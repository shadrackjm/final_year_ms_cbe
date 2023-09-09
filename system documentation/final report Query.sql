$presentation = FinalPresentation::join('students','students.id','=','final_presentations.student_id')
      ->join('project_titles','project_titles.group_id','=','final_presentations.group_id')
      ->select(DB::raw('AVG(final_presentations.introduction_Presentation) as p1,AVG(final_presentations.Final_Presentation_1) as p2,AVG(final_presentations.Proposal_Marks) as p3,AVG(final_presentations.Requirements_Presentation) as p4,AVG(final_presentations.Development_Presentation) as p5,AVG(final_presentations.Final_Presentation_Final) as p6,AVG(final_presentations.Supervisors_Individual) as p7,AVG(final_presentations.Project_Report) as p8,students.id,students.fname,students.mname,students.lname,project_titles.title,project_titles.group_id'))
      ->where('project_titles.title_status',2)
      ->whereYear('final_presentations.created_at',$request->date)
       ->groupBy('students.id')
        ->groupBy('students.fname')
        ->groupBy('students.mname')
        ->groupBy('students.lname')
        ->groupBy('project_titles.title')
        ->groupBy('project_titles.group_id')
        ->orderBy('project_titles.group_id','ASC')
      ->get();
      
select AVG(final_presentations.introduction_Presentation) as p1,
AVG(final_presentations.Final_Presentation_1) as p2,
AVG(final_presentations.Proposal_Marks) as p3,
AVG(final_presentations.Requirements_Presentation) as p4,
AVG(final_presentations.Development_Presentation) as p5,
AVG(final_presentations.Final_Presentation_Final) as p6,
AVG(final_presentations.Supervisors_Individual) as p7,
AVG(final_presentations.Project_Report) as p8,students.id,students.fname,students.mname,students.lname,project_titles.title,project_titles.group_id 
from `final_presentations` inner join `students` on `students`.`id` = `final_presentations`.`student_id` inner join `project_titles` on `project_titles`.`group_id` = `final_presentations`.`group_id` where `project_titles`.`title_status` = 2 and year(`final_presentations`.`created_at`) = 2023 
group by `students`.`id`,`students`.`fname`, `students`.`mname`, `students`.`lname`, `project_titles`.`title`, `project_titles`.`group_id` order by `project_titles`.`group_id` asc;

return $presentation = Presentation1::join('project_titles','project_titles.group_id','=','presentation1s.group_id')
      ->join('presentation2s','presentation2s.student_id','=','presentation1s.student_id')
      ->join('presentation3s','presentation3s.student_id','=','presentation1s.student_id')
      ->join('presentation4s','presentation4s.student_id','=','presentation1s.student_id')
      ->join('presentation5s','presentation5s.student_id','=','presentation1s.student_id')
      ->join('presentation6s','presentation6s.student_id','=','presentation1s.student_id')
      ->join('presentation7s','presentation7s.student_id','=','presentation1s.student_id')
      ->join('presentation8s','presentation8s.student_id','=','presentation1s.student_id')
      ->join('students','students.id','=','presentation1s.student_id')
      ->select(DB::raw('AVG(presentation1s.introduction_Presentation) as p1,AVG(presentation2s.Final_Presentation_1) as p2,AVG(presentation3s.Proposal_Marks) as p3,AVG(presentation4s.Requirements_Presentation) as p4,AVG(presentation5s.Development_Presentation) as p5,AVG(presentation6s.Final_Presentation_Final) as p6,AVG(presentation7s.Supervisors_Individual) as p7,AVG(presentation8s.Project_Report) as p8,students.id,students.fname,students.mname,students.lname,project_titles.title,project_titles.group_id'))
      ->where('project_titles.title_status',2)
      ->whereYear('presentation1s.created_at',$current_year)
       ->groupBy('students.id')
        ->groupBy('students.fname')
        ->groupBy('students.mname')
        ->groupBy('students.lname')
        ->groupBy('project_titles.title')
        ->groupBy('project_titles.group_id')
        ->orderBy('project_titles.group_id','ASC')
      ->get();