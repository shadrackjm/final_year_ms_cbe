<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Supervisor;
use App\Models\GroupSupervisor;
use App\Models\GroupData;
use App\Models\Subphase;
use App\Models\Phase;
use App\Models\Phase1Subphase1;
use App\Models\Phase1Subphase2;
use App\Models\Phase1Subphase3;
use App\Models\Phase2Subphase1;
use App\Models\Phase2Subphase2;
use App\Models\Phase2Subphase3;
use App\Models\Phase2Subphase4;
use App\Models\Phase2Subphase5;
use App\Models\Presentation1;
use App\Models\Presentation2;
use App\Models\Presentation3;
use App\Models\Presentation4;
use App\Models\Presentation5;
use App\Models\Presentation6;
use App\Models\Presentation7;
use App\Models\Presentation8;
use App\Models\ProjectTitle;
use App\Models\Announcement;
use App\Models\FinalPresentation;

class SupervisorController extends Controller
{
  public function loadSuperDashboard(){
    $supervisor = Auth::user();
    $data = Supervisor::where('email',$supervisor->username)->first();
    $title = "Home Page";
    return view('supervisor.home',compact('data','title'));
  }

  public function loadAssignedGroup(){
    $supervisor = Auth::user();
    $data = Supervisor::where('email',$supervisor->username)->first();
    $title = "Assigned Groups";

    $group_data = GroupSupervisor::join('supervisors','supervisors.id','=','group_supervisors.supervisor_id')
    ->join('project_titles','project_titles.group_id','=','group_supervisors.group_id')
    ->where('group_supervisors.supervisor_id',$data->id)
    ->orderBy('project_titles.group_id','ASC')
    ->get(['project_titles.title','project_titles.group_id','project_titles.id','project_titles.title_status','project_titles.remarks','project_titles.created_at']);

    return view('supervisor.assigned-group',compact('title','group_data','data'));
  }

  public function loadAssessGroup(){
    $supervisor = Auth::user();
    $data = Supervisor::where('email',$supervisor->username)->first();
    $title = "Assess Groups";
    $group_data = ProjectTitle::join('groups','groups.id','=','project_titles.group_id')
    // ->join('students','students.regno','=','group_data.regno')
    ->orderBy('project_titles.group_id','ASC')
    ->paginate(10,['project_titles.title','project_titles.group_id','project_titles.id','project_titles.title_status','project_titles.remarks','project_titles.created_at']);

    return view('supervisor.asses-group',compact('title','group_data','data'));
  }

  public function loadAssessGroupForm($id){
    $supervisor = Auth::user();
    $data = Supervisor::where('email',$supervisor->username)->first();
    $title = "Assess Group Presentation";
    $group_id = $id;
    $phases = Phase::all();
    $group_title = ProjectTitle::where('group_id',$group_id)->first();
    $group_data = GroupData::join('students','students.regno','=','group_data.regno')
    ->where('group_id',$group_id)->get(['students.id','students.fname']);
    return view('supervisor.assess-form',compact('title','data','group_id','phases','group_title','group_data'));
  }

  public function GetSubphase(Request $request){
    try {
      $subphase = Subphase::where([['phase_id',$request->id],['allow_status',1]])->get();

      return response()->json($subphase);
    } catch (\Exception $e) {
      return response()->json($e->getMessage());
    }
  }
  public function getGroupDetail($id){
    try {
      $title = ProjectTitle::where('id',$id)->get();
      foreach ($title as $value) {
        // code...
      }
      $group_data = GroupData::join('students','students.regno','=','group_data.regno')
      ->where('group_id',$value->group_id)->get();
      return response()->json(['success'=>true,'data'=>$group_data]);
    } catch (\Exception $e) {
      return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    }
  }

  public function Phase1Subphase1(Request $request){
    $validator = Validator::make($request->all(),[
      'Appearance' => 'required',
      'Presentation_skills' => 'required',
      'Understanding_topic' => 'required',
      'Significance_project' => 'required',
      'Setting_objectives' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $Phase1Subphase1 = Phase1Subphase1::where([['student_id',$request->student_id],['supervisor_id',$request->supervisor_id],['group_id',$request->group_id]])->first();
        if ($Phase1Subphase1 == null) {
          foreach($request->student_id as $key=>$student_id){
            $total = $request->Appearance[$key] + $request->Presentation_skills[$key] + $request->Understanding_topic[$key] + $request->Significance_project[$key] + $request->Setting_objectives[$key];
            $outof5 = ($total / 100) * 5;
            $assess = new Phase1Subphase1;
            $assess->student_id = $request->student_id[$key];
            $assess->group_id = $request->group_id[$key];
            $assess->supervisor_id = $request->supervisor_id[$key];
            $assess->Appearance = $request->Appearance[$key];
            $assess->Presentation_skills = $request->Presentation_skills[$key];
            $assess->Understanding_topic = $request->Understanding_topic[$key];
            $assess->Significance_project = $request->Significance_project[$key];
            $assess->Setting_objectives = $request->Setting_objectives[$key];
            $assess->introduction_Presentation = $outof5;
            $assess->save();

            try {
                $addoutof5 = new FinalPresentation;
                $addoutof5->student_id = $request->student_id[$key];
                $addoutof5->group_id = $request->group_id[$key];
                $addoutof5->supervisor_id = $request->supervisor_id[$key];
                $addoutof5->introduction_Presentation = $outof5;
                $addoutof5->save();

                // $addoutof5 = new Presentation1;
                // $addoutof5->student_id = $request->student_id[$key];
                // $addoutof5->group_id = $request->group_id[$key];
                // $addoutof5->supervisor_id = $request->supervisor_id[$key];
                // $addoutof5->introduction_Presentation = $outof5;
                // $addoutof5->save();

            } catch (\Exception $e) {
              return response()->json(['success' => false, 'msg' => $e->getMessage()]);

            }

          }
          return response()->json(['success' => true, 'msg' => 'Assessment was Successful']);

        }else{
          return response()->json(['success' => false, 'msg' => 'Already You have Assessed this Presentation!']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function Phase1Subphase2(Request $request){
    $validator = Validator::make($request->all(),[
      'Appearance' => 'required',
      'Presentation_skills' => 'required',
      'Understanding_topic' => 'required',
      'Significance_project' => 'required',
      'Setting_objectives' => 'required',
      'Methodology' => 'required',
      'Implementation_plan' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $Phase1Subphase1 = Phase1Subphase2::where([['student_id',$request->student_id],['supervisor_id',$request->supervisor_id],['group_id',$request->group_id]])->first();
        if ($Phase1Subphase1 == null) {
          foreach($request->student_id as $key=>$student_id){

            $total = $request->Appearance[$key] + $request->Presentation_skills[$key] + $request->Understanding_topic[$key] + $request->Significance_project[$key] +$request->Methodology[$key]+ $request->Setting_objectives[$key]+$request->Implementation_plan[$key];
            $outof5 = ($total / 100) * 5;
            $assess = new Phase1Subphase2;
            $assess->student_id = $request->student_id[$key];
            $assess->group_id = $request->group_id[$key];
            $assess->supervisor_id = $request->supervisor_id[$key];
            $assess->Appearance = $request->Appearance[$key];
            $assess->Presentation_skills = $request->Presentation_skills[$key];
            $assess->Understanding_topic = $request->Understanding_topic[$key];
            $assess->Significance_project = $request->Significance_project[$key];
            $assess->Setting_objectives = $request->Setting_objectives[$key];
            $assess->Methodology = $request->Methodology[$key];
            $assess->Implementation_plan = $request->Implementation_plan[$key];
            $assess->Final_Presentation = $outof5;
            $assess->save();

            try {
              $addoutof5 = FinalPresentation::where([['supervisor_id',$request->supervisor_id[$key]],['group_id',$request->group_id[$key]],['student_id',$request->student_id[$key]]])
              ->update([
                'Final_Presentation_1' => $outof5,
              ]);
                // $addoutof5 = new Presentation2;
                // $addoutof5->student_id = $request->student_id[$key];
                // $addoutof5->group_id = $request->group_id[$key];
                // $addoutof5->supervisor_id = $request->supervisor_id[$key];
                // $addoutof5->Final_Presentation_1 = $outof5;
                // $addoutof5->save();

          } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);

          }
          }
          return response()->json(['success' => true, 'msg' => 'Assessed Successfully!']);
        }else{
          return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }

      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => 'Phase Assessment Completed!']);
      }
    }
  }
  public function Phase1Subphase3(Request $request){
    $validator = Validator::make($request->all(),[
      'Project_Background' => 'required',
      'Significance_project' => 'required',
      'Setting_objectives' => 'required',
      'Methodology' => 'required',
      'Implementation_plan' => 'required',
      'Expected_Output' => 'required',
      'Expected_Outcome' => 'required',
      'Conclusion' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $Phase1Subphase1 = Phase1Subphase3::where([['student_id',$request->student_id],['supervisor_id',$request->supervisor_id],['group_id',$request->group_id]])->first();
        if ($Phase1Subphase1 == null) {
          foreach($request->student_id as $key=>$student_id){
            $total = $request->Project_Background[$key] + $request->Significance_project[$key] + $request->Setting_objectives[$key] + $request->Methodology[$key] +$request->Implementation_plan[$key]+ $request->Expected_Output[$key] + $request->Expected_Outcome[$key] + $request->Conclusion[$key];
            $outof10 = ($total / 100) * 10;
            $assess = new Phase1Subphase3;
            $assess->student_id = $request->student_id[$key];
            $assess->group_id = $request->group_id[$key];
            $assess->supervisor_id = $request->supervisor_id[$key];
            $assess->Project_Background = $request->Project_Background[$key];
            $assess->Significance_project = $request->Significance_project[$key];
            $assess->Setting_objectives = $request->Setting_objectives[$key];
            $assess->Methodology = $request->Methodology[$key];
            $assess->Implementation_plan = $request->Implementation_plan[$key];
            $assess->Expected_Output = $request->Expected_Output[$key];
            $assess->Expected_Outcome = $request->Expected_Outcome[$key];
            $assess->Conclusion = $request->Conclusion[$key];
            $assess->Proposal_Marks = $outof10;
            $assess->save();
              try {
                $addoutof5 = FinalPresentation::where([['supervisor_id',$request->supervisor_id[$key]],['group_id',$request->group_id[$key]],['student_id',$request->student_id[$key]]])
                ->update([
                  'Proposal_Marks' => $outof10,
                ]);

                // $addoutof5 = new Presentation3;
                // $addoutof5->student_id = $request->student_id[$key];
                // $addoutof5->group_id = $request->group_id[$key];
                // $addoutof5->supervisor_id = $request->supervisor_id[$key];
                // $addoutof5->Proposal_Marks = $outof10;
                // $addoutof5->save();

            } catch (\Exception $e) {
              return response()->json(['success' => false, 'msg' => $e->getMessage()]);

            }

          }
          return response()->json(['success' => true, 'msg' => 'Assessed Successfully!']);
        }else{
          return response()->json(['success' => false, 'msg' => 'Already You have Assessed this Presentation!']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }
  public function Phase2Subphase1(Request $request){
    $validator = Validator::make($request->all(),[
      'Appearance' => 'required',
      'Presentation_skills' => 'required',
      'Understanding_Project_requirements' => 'required',
      'Requirements_Analysis_Design' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $Phase1Subphase1 = Phase2Subphase1::where([['student_id',$request->student_id],['supervisor_id',$request->supervisor_id],['group_id',$request->group_id]])->first();
        if ($Phase1Subphase1 == null) {
          foreach($request->student_id as $key=>$student_id){
            $total = $request->Appearance[$key]+$request->Presentation_skills[$key]+$request->Understanding_Project_requirements[$key]+$request->Requirements_Analysis_Design[$key];
            $outof10 = ($total / 100) * 10;
            $assess = new Phase2Subphase1;
            $assess->student_id = $request->student_id[$key];
            $assess->group_id = $request->group_id[$key];
            $assess->supervisor_id = $request->supervisor_id[$key];
            $assess->Appearance = $request->Appearance[$key];
            $assess->Presentation_skills = $request->Presentation_skills[$key];
            $assess->Understanding_Project_requirements = $request->Understanding_Project_requirements[$key];
            $assess->Requirements_Analysis_Design = $request->Requirements_Analysis_Design[$key];
            $assess->Requirements_Presentation = $outof10;
            $assess->save();
            try {
              $addoutof5 = FinalPresentation::where([['supervisor_id',$request->supervisor_id[$key]],['group_id',$request->group_id[$key]],['student_id',$request->student_id[$key]]])
              ->update([
                'Requirements_Presentation' => $outof10,
              ]);
                // $addoutof5 = new Presentation4;
                // $addoutof5->student_id = $request->student_id[$key];
                // $addoutof5->group_id = $request->group_id[$key];
                // $addoutof5->supervisor_id = $request->supervisor_id[$key];
                // $addoutof5->Requirements_Presentation = $outof10;
                // $addoutof5->save();
          } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }

          }
          return response()->json(['success' => true, 'msg' => 'Assessed Successfully!']);
        }else{
          return response()->json(['success' => false, 'msg' => 'Already You have Assessed this Presentation!']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => 'Phase Assessment Completed!']);
      }
    }
  }
  public function Phase2Subphase2(Request $request){
    $validator = Validator::make($request->all(),[
      'Appearance' => 'required',
      'Presentation_skills' => 'required',
      'Understanding_Project_requirements' => 'required',
      'Initial_Implementation' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $Phase1Subphase1 = Phase2Subphase2::where([['student_id',$request->student_id],['supervisor_id',$request->supervisor_id],['group_id',$request->group_id]])->first();
        if ($Phase1Subphase1 == null) {
          foreach($request->student_id as $key=>$student_id){
            $total = $request->Appearance[$key]+$request->Presentation_skills[$key]+$request->Understanding_Project_requirements[$key]+$request->Initial_Implementation[$key];
            $outof10 = ($total / 100) * 10;
            $assess = new Phase2Subphase2;
            $assess->student_id = $request->student_id[$key];
            $assess->group_id = $request->group_id[$key];
            $assess->supervisor_id = $request->supervisor_id[$key];
            $assess->Appearance = $request->Appearance[$key];
            $assess->Presentation_skills = $request->Presentation_skills[$key];
            $assess->Understanding_Project_requirements = $request->Understanding_Project_requirements[$key];
            $assess->Initial_Implementation = $request->Initial_Implementation[$key];
            $assess->Development_Presentation = $outof10;
            $assess->save();

            try {
              $addoutof5 = FinalPresentation::where([['supervisor_id',$request->supervisor_id[$key]],['group_id',$request->group_id[$key]],['student_id',$request->student_id[$key]]])
              ->update([
                'Development_Presentation' => $outof10,
              ]);

                // $addoutof5 = new Presentation5;
                // $addoutof5->student_id = $request->student_id[$key];
                // $addoutof5->group_id = $request->group_id[$key];
                // $addoutof5->supervisor_id = $request->supervisor_id[$key];
                // $addoutof5->Development_Presentation = $outof10;
                // $addoutof5->save();

          } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }
          }
          return response()->json(['success' => true, 'msg' => 'Assessed Successfully!']);
        }else{
          return response()->json(['success' => false, 'msg' => 'Already You have Assessed this Presentation!']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }
  public function Phase2Subphase3(Request $request){
    $validator = Validator::make($request->all(),[
      'Appearance' => 'required',
      'Presentation_skills' => 'required',
      'Understanding_Project_requirements' => 'required',
      'Requirements_Analysis_Design' => 'required',
      'Implementation' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $Phase1Subphase1 = Phase2Subphase3::where([['student_id',$request->student_id],['supervisor_id',$request->supervisor_id],['group_id',$request->group_id]])->first();
        if ($Phase1Subphase1 == null) {
          foreach($request->student_id as $key=>$student_id){
            $total = $request->Appearance[$key]+$request->Presentation_skills[$key]+$request->Understanding_Project_requirements[$key]+$request->Requirements_Analysis_Design[$key] +$request->Implementation[$key];
            $outof15 = ($total / 100) * 15;
            $assess = new Phase2Subphase3;
            $assess->student_id = $request->student_id[$key];
            $assess->group_id = $request->group_id[$key];
            $assess->supervisor_id = $request->supervisor_id[$key];
            $assess->Appearance = $request->Appearance[$key];
            $assess->Presentation_skills = $request->Presentation_skills[$key];
            $assess->Understanding_Project_requirements = $request->Understanding_Project_requirements[$key];
            $assess->Requirements_Analysis_Design = $request->Requirements_Analysis_Design[$key];
            $assess->Implementation = $request->Implementation[$key];
            $assess->Final_Presentation = $outof15;
            $assess->save();

            try {
              $addoutof5 = FinalPresentation::where([['supervisor_id',$request->supervisor_id[$key]],['group_id',$request->group_id[$key]],['student_id',$request->student_id[$key]]])
              ->update([
                'Final_Presentation_Final' => $outof15,
              ]);

				// $addoutof5 = new Presentation6;
        //         $addoutof5->student_id = $request->student_id[$key];
        //         $addoutof5->group_id = $request->group_id[$key];
        //         $addoutof5->supervisor_id = $request->supervisor_id[$key];
        //         $addoutof5->Final_Presentation_Final = $outof15;
        //         $addoutof5->save();
          } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }

          }
          return response()->json(['success' => true, 'msg' => 'Assessed Successfully!']);
        }else{
          return response()->json(['success' => false, 'msg' => 'Already You have Assessed this Presentation!']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function Phase2Subphase4(Request $request){
    $validator = Validator::make($request->all(),[
      'General_Understanding_Project' => 'required',
      'System_development' => 'required',
      'Team_Working' => 'required',
      'Individual_Technical_Capability' => 'required',
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $Phase1Subphase1 = Phase2Subphase4::where([['student_id',$request->student_id],['supervisor_id',$request->supervisor_id],['group_id',$request->group_id]])->first();
        if ($Phase1Subphase1 == null) {
          foreach($request->student_id as $key=>$student_id){
            $total = $request->General_Understanding_Project[$key]+$request->System_development[$key]+$request->Team_Working[$key]+$request->Individual_Technical_Capability[$key];
            $outof10 = ($total / 100) * 10;
            $assess = new Phase2Subphase4;
            $assess->student_id = $request->student_id[$key];
            $assess->group_id = $request->group_id[$key];
            $assess->supervisor_id = $request->supervisor_id[$key];
            $assess->General_Understanding_Project = $request->General_Understanding_Project[$key];
            $assess->System_development = $request->System_development[$key];
            $assess->Team_Working = $request->Team_Working[$key];
            $assess->Individual_Technical_Capability = $request->Individual_Technical_Capability[$key];
            $assess->Supervisors_Individual = $outof10;
            $assess->save();

            try {
              $addoutof5 = FinalPresentation::where([['supervisor_id',$request->supervisor_id[$key]],['group_id',$request->group_id[$key]],['student_id',$request->student_id[$key]]])
              ->update([
                'Supervisors_Individual' => $outof10,
              ]);
				// $addoutof5 = new Presentation7;
        //         $addoutof5->student_id = $request->student_id[$key];
        //         $addoutof5->group_id = $request->group_id[$key];
        //         $addoutof5->supervisor_id = $request->supervisor_id[$key];
        //         $addoutof5->Supervisors_Individual = $outof10;
        //         $addoutof5->save();
          } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }

          }
          return response()->json(['success' => true, 'msg' => 'Assessed Successfully!']);
        }else{
          return response()->json(['success' => false, 'msg' => 'Already You have Assessed this Presentation!']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function Phase2Subphase5(Request $request){
    $validator = Validator::make($request->all(),[
      'Project_Background' => 'required',
      'Significance_project' => 'required',
      'Setting_objectives' => 'required',
      'Methodology' => 'required',
      'System_Implementation' => 'required',
      'Results' => 'required',
      'Conclusion' => 'required',
      'System_Documentation' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $Phase1Subphase1 = Phase2Subphase5::where([['student_id',$request->student_id],['supervisor_id',$request->supervisor_id],['group_id',$request->group_id]])->first();
        if ($Phase1Subphase1 == null) {
          foreach($request->student_id as $key=>$student_id){
            $total = $request->Project_Background[$key] + $request->Significance_project[$key]+$request->Setting_objectives[$key] + $request->Methodology[$key] + $request->System_Implementation[$key] + $request->Results[$key] + $request->Conclusion[$key] + $request->System_Documentation[$key];
            $outof30 = ($total / 100) * 30;
            $assess = new Phase2Subphase5;
            $assess->student_id = $request->student_id[$key];
            $assess->group_id = $request->group_id[$key];
            $assess->supervisor_id = $request->supervisor_id[$key];
            $assess->Project_Background = $request->Project_Background[$key];
            $assess->Significance_project = $request->Significance_project[$key];
            $assess->Setting_objectives = $request->Setting_objectives[$key];
            $assess->Methodology = $request->Methodology[$key];
            $assess->System_Implementation = $request->System_Implementation[$key];
            $assess->Results = $request->Results[$key];
            $assess->Conclusion = $request->Conclusion[$key];
            $assess->System_Documentation = $request->System_Documentation[$key];
            $assess->Project_Report = $outof30;
            $assess->save();

            try {
              $addoutof5 = FinalPresentation::where([['supervisor_id',$request->supervisor_id[$key]],['group_id',$request->group_id[$key]],['student_id',$request->student_id[$key]]])
              ->update([
                'Project_Report' => $outof30,
              ]);
				// $addoutof5 = new Presentation8;
        //         $addoutof5->student_id = $request->student_id[$key];
        //         $addoutof5->group_id = $request->group_id[$key];
        //         $addoutof5->supervisor_id = $request->supervisor_id[$key];
        //         $addoutof5->Project_Report = $outof30;
        //         $addoutof5->save();
          } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
          }

          }
          return response()->json(['success' => true, 'msg' => 'Assessed Successfully!']);
        }else{
          return response()->json(['success' => false, 'msg' => 'Already You have Assessed this Presentation!']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }
  public function loadAnnouncement(){
    $supervisor = Auth::user();
    $data = Supervisor::where('email',$supervisor->username)->first();
    $title = "Announcements";
    $announcement = Announcement::where('level','supervisor')->orderBy('created_at','DESC')->paginate(3);
    return view('supervisor.announcements',compact('title','data','announcement'));
  }

}
