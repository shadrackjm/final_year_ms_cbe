<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Exports\StudentExport;
use App\Exports\GroupSupervisorExport;
use App\Imports\StudentImport;
use App\Imports\SupervisorImport;
use App\Exports\SupervisorExport;
use App\Imports\GroupDataImport;
use App\Exports\GroupExport;
use App\Models\Coordinator;
use App\Models\Supervisor;
use App\Models\Student;
use App\Models\Announcement;
use App\Models\User;
use App\Models\GroupData;
use App\Models\Group;
use App\Models\GroupSupervisor;
use App\Models\ProjectTitle;
use App\Models\Proposal;
use App\Models\RejectedTitle;
use App\Models\Phase;
use App\Models\SubPhase;
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
use App\Models\FinalPresentation;
use App\Models\GroupSize;
use Mail;
use App\Mail\AssignedGroup;

class CoordinatorController extends Controller
{
  public function loadCoordiDashboard(){
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $title = "Dashboard";
    $current_year = date('Y');
    $bachelor = Student::where('level','bachelor')->whereYear('created_at',$current_year)->get();
    $all_students = Student::whereYear('created_at',$current_year)->get();
    $diploma = Student::where('level','diploma')->whereYear('created_at',$current_year)->get();
    $supervisor = Supervisor::whereYear('created_at',$current_year)->get();
    $groups = GroupData::distinct()->whereYear('created_at',$current_year)->get(['group_id']);
    return view('coordinator.home',compact('data','title','coordinator_data','groups','supervisor','diploma','bachelor','all_students'));
  }
  public function loadCoordiProfile(){
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $title = "Dashboard";
    return view('coordinator.profile',compact('data','title','coordinator_data'));
  }
  public function loadRegisterCoord(){
    $title = 'Register Coordinator';
    return view('register',compact('title'));
  }
  public function RegisterCoord(Request $request){
    $request->validate([
      'fname' => 'required',
      'email' => 'required|email|unique:users',
      'Mname' => 'string',
      'lname' => 'required|string',
      'phone' => 'required|regex:/^[0-9]{10}$/',
    ]);
    $coordinator_data = Coordinator::first();
    if ($coordinator_data == null) {
      # code...
    $admin = new Coordinator;
    $admin->fname = $request->fname;
    $admin->Mname = $request->Mname;
    $admin->lname = $request->lname;
    $admin->email = $request->email;
    $admin->phone = $request->phone;
    $admin->save();

    $user = new User;
    $user->username = $request->email;
    $user->fname = $request->fname;
    $user->Mname = $request->Mname;
    $user->lname = $request->lname;
    $user->email = $request->email;
    $user->is_admin = 1;
    $user->password = Hash::make('123456');
    $user->save();
    return redirect('/login')->with('success','Coordinator Registered Successfully use Email And Password Provided to login');
  }else {
    return redirect('/login')->with('fail','Coordinator Account can be created only once please consult system administrator!');
    
  }
  }

  public function loadStudent(){
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $title = "Manage Student";
    $student_data = Student::orderBy('fname')
    ->orderBy('mname')
    ->orderBy('lname')
    ->get();
    return view('coordinator.student-details',compact('title','coordinator_data','data','student_data'));
  }
  public function loadStudentForm(){
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $title = "Register New Student";
    return view('coordinator.studentForm',compact('title','coordinator_data','data'));
  }
  public function studentRegister(Request $request){

    $validator = Validator::make($request->all(),[
      'regno' => 'required|string|unique:students',
      'fname' => 'required',
      'email' => 'required|email|unique:students',
      'Mname' => 'string',
      'lname' => 'required|string',
      'level' => 'required|string',
      'phone' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $student = new Student;
        $student->regno = $request->regno;
        $student->fname = $request->fname;
        $student->Mname = $request->Mname;
        $student->lname = $request->lname;
        $student->level = $request->level;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        //getting the last inserted id

        //register as user
        $user = new User;
        $user->username = $request->regno;
        $user->fname = $request->fname;
        $user->Mname = $request->Mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make('123456');
        $user->save();
        return response()->json(['success' => true, 'msg' => 'student registered successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function ChangeProfileData(Request $request){
    $request->validate([
      'fullName' => 'required',
      'phone' => 'required',
    ]);

    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    //explode the names into array
    $fullName = $request->fullName;
    $names = explode(' ',$fullName);
    $fname = $names[0];
    $Mname = $names[1];
    $lname = $names[2];

    try {
      $upload_photo = Coordinator::where('id',$data->id)->update([
        'phone' => $request->phone,
        'fname' => $fname,
        'Mname' => $Mname,
        'lname' => $lname,
      ]);
    } catch (\Exception $e) {

    }

  }

  public function uploadPhoto(Request $Request){
    $Request->validate([
      'picture'=> 'required|mimes:jpg',

    ]);
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    try {


      $file = date('mdYHis').uniqid().$coordinator_data->username.'.'.$Request->picture->extension();
      $Request->picture->move(public_path('uploads/profiles/coordinator'),$file);
      $upload_photo = Coordinator::where('id',$data->id)->update([
        'photo' => $file
      ]);
      return redirect('coordinator/dashboard')->with('success','profile picture uploaded successfully');
    } catch (\Exception $e) {
      return redirect('coordinator/dashboard')->with('fail','Error');
    }
  }

  public function changePassword(Request $request){
    try {
      $request->validate([
        'password'=> 'required|min:6|max:15|confirmed',
      ]);
      $coordinator_data = Auth::User();
      $upload_photo = User::where('id',$coordinator_data->id)->update([
        'password' => Hash::make($request->password)
      ]);
      return redirect('/coordinator/dashboard')->with('success','password Updated Successfully');
    } catch (\Exception $e) {
      return redirect('/coordinator/dashboard')->with('fail',$e->getMessage());
    }
  }

  public function loadSupervisor(){
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $title = 'Manage Supervisor';
    $current_year = date('Y');
    $supervisor_data = Supervisor::whereYear('supervisors.created_at',$current_year)->paginate(10);
    return view('coordinator.manage-supervisor',compact('title','data','coordinator_data','supervisor_data'));
  }

  public function loadSupervisorForm(){
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $title = 'Manage Supervisor';
    return view("coordinator.supervisor-form",compact('coordinator_data','title','data'));
  }
  public function RegisterSupervisor(Request $request){
    $validator = Validator::make($request->all(),[
      'fName' => 'required|string',
      'Mname' => 'required',
      'lName' => 'required',
      'email' => 'required|email|unique:supervisors|unique:users',
      'phone_number' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        //register as user
        $user = new User;
        $user->username = $request->email;
        $user->fname = $request->fName;
        $user->mname = $request->Mname;
        $user->lname = $request->lName;
        $user->email = $request->email;
        $user->is_admin = 2;
        $user->password = Hash::make('123456');
        $user->save();
        //register to student_course
        $student_course = new Supervisor;
        $student_course->firstname = $request->fName;
        $student_course->middlename = $request->Mname;
        $student_course->lastname = $request->lName;
        $student_course->email = $request->email;
        $student_course->phone = $request->phone_number;
        $student_course->save();

        return response()->json(['success' => true, 'msg' => 'Supervisor registered successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function loadSupervisorEditForm($id){

    $supervisor_data  = supervisor::where('id',$id)->first();
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $title = 'Edit Supervisor';
    return view('coordinator.editSupervisorForm', compact('supervisor_data','title','coordinator_data','data'));
  }

  public function EditSupervisor(Request $request){
    $validator = Validator::make($request->all(),[
      'fName' => 'required|string',
      'mName' => 'required',
      'lName' => 'required',
      'email' => 'required|email',
      'phone' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        // edit supervisor
        $supervisor =  Supervisor::where('id',$request->supervisor_id)->first();
        $supervisor->firstname = $request->fName;
        $supervisor->middlename = $request->mName;
        $supervisor->lastname = $request->lName;
        $supervisor->email = $request->email;
        $supervisor->phone = $request->phone;
        $supervisor->save();
        //edit supervisor's user's details
        $request = User::where('username',$request->old_email)->update([
          'username' => $request->email,
          'fname' => $request->fName,
          'Mname' => $request->Mname,
          'lname' => $request->lName,
          'email' => $request->email,
        ]);

        return response()->json(['success' => true, 'msg' => 'Supervisor Updated successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function deleteSupervisor($id,$email){
    try {
      $delete = Supervisor::where('id',$id)->delete();
      $delete_user = User::where('email',$email)->delete();
      return redirect('/coordinator/manage/supervisors')->with('success','Supervisor deleted Successfully ');

    } catch (\Exception $e) {
      return redirect('/coordinator/manage/supervisors')->with('fail','Failed To delete Supervisor');
    }

  }

  public function loadStudentEditForm($id){
    $student_data  = Student::where('id',$id)->first();
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $title = 'Edit Student';
    return view('coordinator.editStudentForm', compact('student_data','title','coordinator_data','data'));
  }

  public function EditStudent(Request $request){
    $validator = Validator::make($request->all(),[
      'regno' => 'required|string',
      'fName' => 'required|string',
      'mName' => 'required',
      'lName' => 'required',
      'email' => 'required|email',
      'phone' => 'required',
      'level' => 'required',
    ]);

    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        // edit supervisor
        $supervisor =  Student::where('id',$request->student_id)->first();
        $supervisor->regno = $request->regno;
        $supervisor->fname = $request->fName;
        $supervisor->Mname = $request->mName;
        $supervisor->lname = $request->lName;
        $supervisor->email = $request->email;
        $supervisor->phone = $request->phone;
        $supervisor->level = $request->level;
        $supervisor->save();
        //edit supervisor's user's details
        $request = User::where('username',$request->old_regno)->update([
          'username' => $request->regno,
          'fname' => $request->fName,
          'Mname' => $request->Mname,
          'lname' => $request->lName,
          'email' => $request->email,
        ]);

        return response()->json(['success' => true, 'msg' => 'Student Updated successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function deleteStudent($id,$regno){
    try {
      $delete = Student::where('id',$id)->delete();
      $delete_user = User::where('username',$regno)->delete();
      return redirect('/coordinator/manage/students')->with('success','Student deleted Successfully ');

    } catch (\Exception $e) {
      return redirect('/coordinator/manage/students')->with('fail','Failed To delete Student');
    }
  }
  public function loadImportStuForm(){
    $title = 'Import - Students';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    return view('coordinator.import-student',compact('title','data'));
  }
  public function importStudent(Request $request){
    try {
      $request->validate([
        'file' => 'required|mimes:xlsx'
      ]);

      Excel::import(new StudentImport,request()->file('file'));
      return redirect('/import/students')->with('success','file imported successfully');
    } catch (\Exception $e) {
      return redirect('/import/students')->with('fail','check your excel file may contain duplicate data or a data that already existed in the system cross check it carefully!');
    }
  }
  //supervisor import
  public function loadImportSupForm(){
    $title = 'Import - Supervisor';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    return view('coordinator.import-supervisor',compact('title','data'));
  }
  public function importSupervisor(Request $request){
    try {
      $request->validate([
        'file' => 'required|mimes:xlsx'
      ]);

      Excel::import(new SupervisorImport,request()->file('file'));

      return redirect('/import/supervisors')->with('success','file imported successfully');
    } catch (\Exception $e) {
      return redirect('/import/supervisors')->with('fail','your file may have incorrect column sequence or may contain the already existed data in your supervisor list! please check it, before upload the file again!');
    } catch (\NoTypeDetectedException $e) {
      return redirect('/import/supervisors')->with('fail',$e->getMessage());
    }
  }

  public function loadImportGroupForm(){
    $title = 'Import - Groups';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    return view('coordinator.import-group',compact('title','data'));
  }

  public function importGroup(Request $request){
    try {
      $request->validate([
        'file' => 'required|mimes:xlsx'
      ]);

      Excel::import(new GroupDataImport,request()->file('file'));
      return redirect('/group/detail')->with('success','file imported successfully');
    } catch (\Exception $e) {
      return redirect('/import/groups')->with('fail','in your excel may either contain data that already exist in the group table or check if group_id');
    }
  }
  //exports
  public function exportGroup(){
    Excel::store(new GroupExport, 'project groups.xls');
    return Excel::download(new GroupExport,'project groups.xls');
  }
  public function exportGroupSupervisor(){
    Excel::store(new GroupSupervisorExport, 'group - supervisor report.xls');
    return Excel::download(new GroupSupervisorExport,'group - supervisor report.xls');
  }
  public function exportstudent(){
    Excel::store(new StudentExport, 'students.xls');
    return Excel::download(new StudentExport,'students.xls');
  }

  public function exportsupervisor(){
    Excel::store(new SupervisorExport, 'supervisors.xls');
    return Excel::download(new SupervisorExport, 'supervisors.xls');
  }
  public function loadProjectTitles(Request $request){
    $current_year = date('Y');
    $details = ProjectTitle::join('groups','groups.id','=','project_titles.group_id')
    ->orderBy('project_titles.group_id','ASC')
    ->whereYear('project_titles.created_at',$current_year)
    ->paginate(9,['project_titles.title','project_titles.group_id','project_titles.id','project_titles.title_status','project_titles.remarks','project_titles.created_at']);

    $title = 'Project Titles';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    return view('coordinator.project-title',compact('title','data','details'));
  }

  public function AcceptTitle(Request $request){
    try {
      $accept_group_title = ProjectTitle::where('id',$request->title_id)->update([
        'title_status' => 2,
        'remarks' => $request->remark,
      ]);
      return response()->json(['success'=>true,'msg'=>"Title Accepted"]);
    } catch (\Exception $e) {
      return response()->json(['success'=>false,'msg' => $e->getMessage()]);
    }
  }

  public function RejectTitle(Request $request){
    try {
      $ere = ProjectTitle::where('id',$request->title_id)->update([
        'title_status' => 1,
        'remarks' => $request->reject_remark,
      ]);
      //

      $rejected_title =  new RejectedTitle;
      $rejected_title->group_id = $request->group_id;
      $rejected_title->title = $request->rejected_title;
      $rejected_title->save();

      return response()->json(['success'=>true,'msg'=>"Title Rejected"]);
    } catch (\Exception $e) {
      return response()->json(['success'=>false,'msg' => $e->getMessage()]);
    }
  }

  public function RejectedTitle($group_id){
    $title = 'Rejected Title';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $rejected_data = RejectedTitle::join('groups','groups.id','=','rejected_titles.group_id')
    ->where('rejected_titles.group_id',$group_id)
    ->orderBy('created_at','DESC')
    ->get(['rejected_titles.created_at','rejected_titles.group_id','rejected_titles.title']);
    return view('coordinator.rejected-title',compact('title','data','rejected_data'));
  }


  public function loadGroups(){
    $title = 'Group Details';
    $current_year = date('Y');
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $group_data = GroupData::join('students','students.regno','=','group_data.regno')
    ->whereYear('group_data.created_at',$current_year)
    ->orderBy('group_id','ASC')
    ->paginate(10,['group_data.group_id','group_data.regno','students.fname','students.mname','students.lname','students.has_group'])
    ;
    return view('coordinator.group-details',compact('title','data','group_data'));
  }
  public function loadGroupReport(){
    $title = 'Group Report';
    $current_year = date('Y');
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $group_data = GroupData::join('students','students.regno','=','group_data.regno')
    ->whereYear('group_data.created_at',$current_year)
    ->where('students.has_group',1)
    ->orWhere('students.has_group',5)
    ->orderBy('group_id','ASC')
    ->get(['group_data.group_id','group_data.regno','students.fname','students.mname','students.lname']);
    return view('coordinator.group-report',compact('title','data','group_data'));
  }
  public function SearchGroupReport(Request $request){
    $title = 'Group Report';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $group_data = GroupData::join('students','students.regno','=','group_data.regno')
    ->whereYear('group_data.created_at',$request->date)
    ->where('students.has_group',1)
    ->orWhere('students.has_group',5)
    ->orderBy('group_data.group_id','ASC')
    ->get(['group_data.group_id','students.regno','students.fname','students.mname','students.lname']);
    return view('coordinator.group-report',compact('title','data','group_data'));
  }
  public function loadGroupsSupervisor(){
    $title = 'Group Details';
    $current_year = date('Y');
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $group_data = GroupSupervisor::join('supervisors','supervisors.id','=','group_supervisors.supervisor_id')
    ->join('groups','groups.id','=','group_supervisors.group_id')
    ->orderBy('group_id','Asc')
    ->whereYear('group_supervisors.created_at',$current_year)
    ->get(['group_supervisors.id','group_supervisors.group_id','supervisors.firstname','supervisors.middlename','supervisors.lastname']);
    return view('coordinator.group-supervisor',compact('title','data','group_data'));
  }


  public function loadAssignSupervisorForm(){
    $title = 'Assign Group Supervisor';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $supervisors = Supervisor::all();
    $group_data = GroupData::distinct()->get(['group_id']);
    return view('coordinator.assign-form',compact('title','data','group_data','supervisors'));

  }
  public function AssignSupervisor(Request $request){
    $validator = Validator::make($request->all(),[
      'group_id' => 'required',
      'supervisor_id' => 'required'
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $title_data = ProjectTitle::where('group_id',$request->group_id)->first();
        if ($title_data == null) {
          return response()->json(['success' => false, 'msg' => 'Group Has To Post Title First!!']);
        }else{
          $group_supervisor = new GroupSupervisor;
          $group_supervisor->group_id = $request->group_id;
          $group_supervisor->supervisor_id = $request->supervisor_id;
          $group_supervisor->save();

          try {
            $supervisor = Supervisor::where('id',$request->supervisor_id)->get();

            foreach ($supervisor as $key) {
              # code...
            }
                  $mailData = [
                      'title' => 'You Have Been Assigned New Group',
                      'header' => 'You have been Assigned new Group.',
                      'body' => 'Your New Assigned Group is Group No: '.$request->group_id.'.Please! Login to Your Account to view Your Assigned Groups As Per, Your Account User Manual',
                      'footer' => 'Thank You!'
                  ];
                  Mail::to($key->email)->send(new AssignedGroup($mailData));

              } catch (\Exception $e) {
                  return response()->json(['success'=>false,'msg'=> 'failed to send email']);
              }
          return response()->json(['success' => true, 'msg' => 'Group Asssigned To Supervisor Successfully']);
        }

      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => 'Group Assigned to Another Supervisor']);
      }
    }
  }

  public function UnassignSupervisor($id){
    try {
      $un_assign = GroupSupervisor::where('id',$id)->delete();
      return redirect('/group/supervisor/detail')->with('success','Group Supervisor Un-assigned Successfully!');
    } catch (\Exception $e) {
      return redirect('/group/supervisor/detail')->with('fail','Failed to un-assign supervisor');
    }
  }

  public function loadViewProposal(){
    $current_year = date('Y');
    $title = 'Project Proposals';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $proposal_data = Proposal::join('groups','groups.id','=','proposals.group_id')
    ->whereYear('proposals.created_at',$current_year)
    ->get(['proposals.id','proposals.created_at','proposals.group_id']);
    return view('coordinator.view-proposal',compact('data','proposal_data','title'));
  }
  public function ViewProposal($id){
    $data = Proposal::find($id);
    $pathToFile = public_path('uploads/proposal/'.$data->proposal.'');
    return response()->file($pathToFile);
  }

  public function loadUploadProposal($group_id){
    $title = 'Project Proposals';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();


    return view('coordinator.reupload-proposal',compact('data','title','group_id'));
  }

  public function loadPhaseMGT(){
    $title = 'Project Phases Report';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $phase_data = Phase::join('sub_phases','sub_phases.phase_id','=','phases.id')
    ->get(['sub_phases.id','phases.phase_name','sub_phases.subphase_name']);
    return view('coordinator.phase',compact('data','title','phase_data'));
  }
  public function loadPhasemanagement(){
    $title = 'Project Phases';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $phase_data = Phase::all();
    return view('coordinator.phase-mgt',compact('data','title','phase_data'));
  }
  public function deletePhase($id){
    try {
      $delete = Phase::where('id',$id)->delete();
      return redirect('/phases')->with('success','phase Deleted!');
    } catch (\Exception $e) {
      return redirect('/phases')->with('fail','Error occured!');
    }
  }
  public function loadSubPhasemanagement(){
    $title = 'Project Sub - Phases';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $subphase_data = SubPhase::paginate(7);
    return view('coordinator.subphase-mgt',compact('data','title','subphase_data'));
  }

  public function loadPhaseForm(){
    $title = 'Add Project Phases';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    return view('coordinator.phase-form',compact('data','title'));
  }

  public function AddPhase(Request $request){
    $validator = Validator::make($request->all(),[
      'phase' => 'required',
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $phase = new Phase;
        $phase->phase_name = $request->phase;
        $phase->save();
        return response()->json(['success' => true, 'msg' => 'Phase Registered Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => 'failed to register project phase']);
      }
    }
  }

  public function loadSubPhaseForm(){
    $title = 'Add Project Phases';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $phase_data = Phase::all();
    return view('coordinator.subphase',compact('data','title','phase_data'));
  }

  public function AddSubPhase(Request $request){
    $validator = Validator::make($request->all(),[
      'phase_id' => 'required',
      'subphase' => 'required',
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $subphase = new SubPhase;
        $subphase->phase_id = $request->phase_id;
        $subphase->subphase_name = $request->subphase;
        $subphase->save();
        return response()->json(['success' => true, 'msg' => 'SubPhase Registered Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => 'failed to register Sub - Phase']);
      }
    }
  }

  public function loadeditPhasePage($id){
    $title = 'Add Project Phases';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $phase_data = Phase::where('id',$id)->first();
    return view('coordinator.edit-phase',compact('data','title','phase_data'));
  }
  public function EditPhase(Request $request){
    $validator = Validator::make($request->all(),[
      'phase' => 'required',
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $request = Phase::where('id',$request->phase_id)->update([
          'phase_name' => $request->phase,
        ]);
        return response()->json(['success' => true, 'msg' => 'Phase Updated Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => 'Error Occured While Updating Phase']);
      }
    }
  }
  public function loadeditSubPhasePage($id){
    $title = 'Add Project Phases';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $phase = Phase::all();
    $subphase_data = SubPhase::join('phases','phases.id','=','sub_phases.phase_id')
    ->where('sub_phases.id',$id)->first(['phases.id','phases.phase_name','sub_phases.subphase_name']);
    $subphase_id = $id;
    return view('coordinator.edit-subphase',compact('data','title','phase','subphase_data','subphase_id'));
  }
  public function EditSubPhase(Request $request){
    $validator = Validator::make($request->all(),[
      'phase_id' => 'required',
      'subphase' => 'required',
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $request = SubPhase::where('id',$request->SubPhase_id)->update([
          'phase_id' => $request->phase_id,
          'subphase_name' => $request->subphase,
        ]);
        return response()->json(['success' => true, 'msg' => 'Subphase Updated Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => 'Error Occured While Updating Subphase']);
      }
    }
  }
  public function deleteSubPhase($id){
    try {
      $delete = SubPhase::where('id',$id)->delete();
      return redirect('/subphases')->with('success','SubPhase Deleted!');
    } catch (\Exception $e) {
      return redirect('/subphases')->with('fail','Error occured!');
    }
  }
  public function loadAddMemberForm(){
    $title = 'Add Group Member';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $group_data = Group::distinct()->get(['g_id']);
    $current_year = date('Y');
    $student_data = Student::where('has_group',0)->distinct()->whereYear('created_at',$current_year)->get(['regno','fname','lname']);
    return view('coordinator.add-member',compact('data','title','group_data','student_data'));
  }

  public function AddMember(Request $request){
    $validator = Validator::make($request->all(),[
      'regno' => 'required',
      'group_id' => 'required',
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        // check if group already reach maximum size
        $current_year = date('Y');
         $current_year_group_size = GroupSize::whereYear('created_at',$current_year)->first();
        $group_data = GroupData::where('group_id',$request->group_id)
        ->get();
        if (count($group_data) == $current_year_group_size->group_size) {
        return response()->json(['success' => false, 'msg' => 'Sorry! Group Number Selected Already Reached Maximum Group Size of '.$current_year_group_size->group_size.' Members']);

        }else{
          $group_data = new GroupData;
          $group_data->group_id = $request->group_id;
          $group_data->regno = $request->regno;
          $group_data->save();

          $update_students = Student::where('regno',$request->regno)->update([
            'has_group' => 1,
          ]);
          return response()->json(['success' => true, 'msg' => 'Student Added To Group number '.$request->group_id.'']);
        }

      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }
  public function MemberDetails($id){
    try {

      $group_data = GroupData::join('students','students.regno','=','group_data.regno')
      ->where('group_id',$id)->get();
      return response()->json(['success'=>true,'data'=> $group_data]);
    } catch (\Exception $e) {
      return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    }
  }
  public function ViewReports(){
    $title = 'Presentation Reports';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $phases = Phase::all();
    // get presentation details,student,supervisor and title
    $presentation = Phase1Subphase1::join('project_titles','project_titles.group_id','=','phase1_subphase1s.group_id')
    ->join('students','students.id','=','phase1_subphase1s.student_id')
    ->join('supervisors','supervisors.id','=','phase1_subphase1s.supervisor_id')
    ->where('project_titles.title_status',2)
    ->orderBy('phase1_subphase1s.group_id','ASC') //this line make sure the repeatition of regno and names of student get merged by the merging plugin
    ->orderBy('phase1_subphase1s.student_id','ASC') //this line make sure the repeatition of regno and names of student get merged by the merging plugin
    ->get(['phase1_subphase1s.group_id','phase1_subphase1s.Appearance','phase1_subphase1s.Presentation_skills','phase1_subphase1s.Understanding_topic','phase1_subphase1s.Significance_project','phase1_subphase1s.Setting_objectives','project_titles.title','students.regno','students.fname','students.mname','students.lname','supervisors.firstname','supervisors.lastname']);
    return view('coordinator.presentation-report',compact('title','data','presentation','phases'));
  }
  public function GetSubphaseData(Request $request){
    try {
      $subphase = Subphase::where('phase_id',$request->id)->get();
      return response()->json($subphase);
    } catch (\Exception $e) {
      return response()->json($e->getMessage());
    }
  }
  public function GetReport(Request $request){
    try {
      // check if the value comes with the request match any of the conditions then return the desired report
      if($request->value == 2){
        $report2 = Phase1Subphase2::join('project_titles','project_titles.group_id','=','phase1_subphase2s.group_id')
        ->join('students','students.id','=','phase1_subphase2s.student_id')
        ->join('supervisors','supervisors.id','=','phase1_subphase2s.supervisor_id')
        ->where('project_titles.title_status',2)
        ->orderBy('phase1_subphase2s.group_id','ASC')
        ->orderBy('phase1_subphase2s.student_id','ASC') //this line make sure the repeatition of regno and names of student get merged by the merging plugin
        ->get(['phase1_subphase2s.group_id','phase1_subphase2s.Appearance','phase1_subphase2s.Presentation_skills','phase1_subphase2s.Understanding_topic','phase1_subphase2s.Significance_project','phase1_subphase2s.Setting_objectives','phase1_subphase2s.Methodology','phase1_subphase2s.Implementation_plan','project_titles.title','students.regno','students.fname','students.mname','students.lname','supervisors.firstname','supervisors.lastname']);
        return response()->json($report2);
      }elseif($request->value == 3){
        $report3 = Phase1Subphase3::join('project_titles','project_titles.group_id','=','phase1_subphase3s.group_id')
        ->join('students','students.id','=','phase1_subphase3s.student_id')
        ->join('supervisors','supervisors.id','=','phase1_subphase3s.supervisor_id')
        ->where('project_titles.title_status',2)
        ->orderBy('phase1_subphase3s.group_id','ASC')
        ->orderBy('phase1_subphase3s.student_id','ASC') //this line make sure the repeatition of regno and names of student get merged by the merging plugin
        ->get(['phase1_subphase3s.group_id','phase1_subphase3s.Project_Background','phase1_subphase3s.Significance_project','phase1_subphase3s.Setting_objectives','phase1_subphase3s.Methodology','phase1_subphase3s.Implementation_plan','phase1_subphase3s.Expected_Output','phase1_subphase3s.Expected_Outcome','phase1_subphase3s.Conclusion','project_titles.title','students.regno','students.fname','students.mname','students.lname','supervisors.firstname','supervisors.lastname']);
        return response()->json($report3);
      }elseif($request->value == 4){
        $report4 = Phase2Subphase1::join('project_titles','project_titles.group_id','=','phase2_subphase1s.group_id')
        ->join('students','students.id','=','phase2_subphase1s.student_id')
        ->join('supervisors','supervisors.id','=','phase2_subphase1s.supervisor_id')
        ->where('project_titles.title_status',2)
        ->orderBy('phase2_subphase1s.group_id','ASC') //this line make sure the repeatition of regno and names of student get merged by the merging plugin
        ->get(['phase2_subphase1s.group_id','phase2_subphase1s.Appearance','phase2_subphase1s.Presentation_skills','phase2_subphase1s.Understanding_Project_requirements','phase2_subphase1s.Requirements_Analysis_Design','project_titles.title','students.regno','students.fname','students.mname','students.lname','supervisors.firstname','supervisors.lastname']);
        return response()->json($report4);
      }elseif($request->value == 5){
        $report5 = Phase2Subphase2::join('project_titles','project_titles.group_id','=','phase2_subphase2s.group_id')
        ->join('students','students.id','=','phase2_subphase2s.student_id')
        ->join('supervisors','supervisors.id','=','phase2_subphase2s.supervisor_id')
        ->where('project_titles.title_status',2)
        ->orderBy('phase2_subphase2s.group_id','ASC') //this line make sure the repeatition of regno and names of student get merged by the merging plugin
        ->get(['phase2_subphase2s.group_id','phase2_subphase2s.Appearance','phase2_subphase2s.Presentation_skills','phase2_subphase2s.Understanding_Project_requirements','phase2_subphase2s.Initial_Implementation','project_titles.title','students.regno','students.fname','students.mname','students.lname','supervisors.firstname','supervisors.lastname']);
        return response()->json($report5);
      }elseif($request->value == 6){
        $report6 = Phase2Subphase3::join('project_titles','project_titles.group_id','=','phase2_subphase3s.group_id')
        ->join('students','students.id','=','phase2_subphase3s.student_id')
        ->join('supervisors','supervisors.id','=','phase2_subphase3s.supervisor_id')
        ->where('project_titles.title_status',2)
        ->orderBy('phase2_subphase3s.group_id','ASC') //this line make sure the repeatition of regno and names of student get merged by the merging plugin
        ->get(['phase2_subphase3s.group_id','phase2_subphase3s.Appearance','phase2_subphase3s.Presentation_skills','phase2_subphase3s.Understanding_Project_requirements','phase2_subphase3s.Requirements_Analysis_Design','phase2_subphase3s.Implementation','project_titles.title','students.regno','students.fname','students.mname','students.lname','supervisors.firstname','supervisors.lastname']);
        return response()->json($report6);
      }elseif($request->value == 7){
        $report7 = Phase2Subphase4::join('project_titles','project_titles.group_id','=','phase2_subphase4s.group_id')
        ->join('students','students.id','=','phase2_subphase4s.student_id')
        ->join('supervisors','supervisors.id','=','phase2_subphase4s.supervisor_id')
        ->where('project_titles.title_status',2)
        ->orderBy('phase2_subphase4s.group_id','ASC') //this line make sure the repeatition of regno and names of student get merged by the merging plugin
        ->get(['phase2_subphase4s.group_id','phase2_subphase4s.General_Understanding_Project','phase2_subphase4s.System_development','phase2_subphase4s.Team_Working','phase2_subphase4s.Individual_Technical_Capability','project_titles.title','students.regno','students.fname','students.mname','students.lname','supervisors.firstname','supervisors.lastname']);
        return response()->json($report7);
      }elseif($request->value == 8){
        $report8 = Phase2Subphase5::join('project_titles','project_titles.group_id','=','phase2_subphase5s.group_id')
        ->join('students','students.id','=','phase2_subphase5s.student_id')
        ->join('supervisors','supervisors.id','=','phase2_subphase5s.supervisor_id')
        ->where('project_titles.title_status',2)
        ->orderBy('phase2_subphase5s.group_id','ASC') //this line make sure the repeatition of regno and names of student get merged by the merging plugin
        ->get(['phase2_subphase5s.group_id','phase2_subphase5s.Project_Background','phase2_subphase5s.Significance_project','phase2_subphase5s.Setting_objectives','phase2_subphase5s.Methodology','phase2_subphase5s.System_Implementation','phase2_subphase5s.Results','phase2_subphase5s.Conclusion','phase2_subphase5s.System_Documentation','project_titles.title','students.regno','students.fname','students.mname','students.lname','supervisors.firstname','supervisors.lastname']);
        return response()->json($report8);
      }
    } catch (\Exception $e) {
      return response()->json($e->getMessage());
    }
  }

  public function Charts(){
    $title = 'Presentation Reports Charts';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    return view('coordinator.presentation-report-charts',compact('data','title'));
  }
  public function TitleReport(){
    $title = 'Title Report';
    $current_year = date('Y');
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $report = GroupData::join('students','students.regno','=','group_data.regno')
    ->join('project_titles','project_titles.group_id','=','group_data.group_id')
    ->where('project_titles.title_status',2)
    ->whereYear('project_titles.created_at',$current_year)
    ->orderBy('group_id','ASC')
    ->get(['project_titles.title','group_data.group_id','group_data.regno','students.fname','students.mname','students.lname','students.level']);
    return view('coordinator.title-report',compact('title','data','report'));
  }
  public function SearchTitleReport(Request $request){
    $title = 'Title Report';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();

    $date = explode('/',$request->date);
     $date_search = $date[1];
    $report = GroupData::join('students','students.regno','=','group_data.regno')
    ->join('project_titles','project_titles.group_id','=','group_data.group_id')
    ->where('project_titles.title_status',2)
    ->whereYear('project_titles.created_at',$date_search)
    ->orderBy('group_id','ASC')
    ->get(['project_titles.title','group_data.group_id','group_data.regno','students.fname','students.mname','students.lname','students.level']);
    return view('coordinator.title-report',compact('title','data','report'));
  }
  public function GroupSupervisorReport(){
    $current_year = date('Y');
    $title = 'Group Supervisor - Report';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $g_report = GroupData::join('group_supervisors','group_supervisors.group_id','=','group_data.group_id')
    ->join('supervisors','supervisors.id','=','group_supervisors.supervisor_id')
    ->join('students','students.regno','=','group_data.regno')
    ->join('project_titles','project_titles.group_id','=','group_data.group_id')
    ->where('project_titles.title_status',2)
    ->whereYear('group_supervisors.created_at',$current_year)
    ->orderBy('group_id','ASC')
    ->get(['project_titles.title','group_data.group_id','group_data.regno','students.fname','students.mname','students.lname','supervisors.firstname','supervisors.lastname']);
    return view('coordinator.g-supervisor-report',compact('title','data','g_report'));
  }
  public function SearchGroupSupervisorReport(Request $request){
    $title = 'Group Supervisor - Report';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $g_report = GroupData::join('group_supervisors','group_supervisors.group_id','=','group_data.group_id')
    ->join('supervisors','supervisors.id','=','group_supervisors.supervisor_id')
    ->join('students','students.regno','=','group_data.regno')
    ->join('project_titles','project_titles.group_id','=','group_data.group_id')
    ->where('project_titles.title_status',2)
    ->whereYear('group_data.created_at',$request->date)
    ->orderBy('group_id','ASC')
    ->get(['project_titles.title','group_data.group_id','group_data.regno','students.fname','students.mname','students.lname','supervisors.firstname','supervisors.lastname']);
    return view('coordinator.g-supervisor-report',compact('title','data','g_report'));
  }
  public function loadAnnouncement(){
    $title = 'Manage Announcement';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $announces = Announcement::paginate(6);
    return view('coordinator.manage-announcement',compact('title','data','announces'));
  }
  public function loadAnnForm(){
    $title = 'Add New Announcement';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();

    return view('coordinator.add-announcement',compact('title','data'));
  }
  public function addAnnouncement(Request $request){
    $validator = Validator::make($request->all(),[
      'to' => 'required',
      'body' => 'required',
      'title' => 'required',
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {

        $announcement = new Announcement;
        $announcement->level = $request->to;
        $announcement->title = $request->title;
        $announcement->body = $request->body;
        $announcement->save();
        return response()->json(['success' => true, 'msg' => 'Announcement Published Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => 'Error Occured While Publishing Announcement']);
      }
    }
  }
  public function loadEditPage($id){
    $title = 'Edit Announcement';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $announcement_data = Announcement::where('id',$id)->first();
    return view('coordinator.edit-announcement',compact('title','data','announcement_data'));
  }
  public function deleteAnnouncement($id){
    try {
      $delete = Announcement::where('id',$id)->delete();
      return redirect('/manage/announcement')->with('success','Announcement Deleted!');
    } catch (\Exception $e) {
      return redirect('/manage/announcement')->with('fail','Error occured!');
    }
  }
  public function editAnnouncement(Request $request){
    $validator = Validator::make($request->all(),[
      'to' => 'required',
      'body' => 'required',
      'title' => 'required',
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $request = Announcement::where('id',$request->announce_id)->update([
          'level' => $request->to,
          'body' => $request->body,
          'title' => $request->title,
        ]);
        return response()->json(['success' => true, 'msg' => 'Announcement Updated Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => 'Error Occured While Updating Announcement']);
      }
    }
  }
  public function loadManagePresentation(){
    $title = 'Manage Presentations';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $subphase_data = SubPhase::paginate(7);
    return view('coordinator.manage-presentation',compact('title','data','subphase_data'));
  }
  public function enablePresentation($id){
    try {
      $delete = SubPhase::where('id',$id)->update([
        'allow_status' => 1,
      ]);
      return redirect('/manage/presentation')->with('success','Presentation Enabled Successfully!');
    } catch (\Exception $e) {
      return redirect('/manage/presentation')->with('fail','Error occured!');
    }
  }
  public function disablePresentation($id){
    try {
      $delete = SubPhase::where('id',$id)->update([
        'allow_status' => 0,
      ]);
      return redirect('/manage/presentation')->with('success','Presentation Disabled Successfully!');
    } catch (\Exception $e) {
      return redirect('/manage/presentation')->with('fail','Error occured!');
    }
  }
  public function completePresentation($id){
    try {
      $delete = SubPhase::where('id',$id)->update([
        'allow_status' => 2,
      ]);
      return redirect('/manage/presentation')->with('success','Presentation Disabled Successfully!');
    } catch (\Exception $e) {
      return redirect('/manage/presentation')->with('fail','Error occured!');
    }
  }
  public function disableallPresentation(){
    try {
      $delete = SubPhase::where('allow_status','!=',0)->update([
        'allow_status' => 0,
      ]);
      return redirect('/manage/presentation')->with('success','All Presentations Disabled Successfully!');
    } catch (\Exception $e) {
      return redirect('/manage/presentation')->with('fail','Error occured!');
    }
  }

  public function FinalReport(Request $request){

    $title = 'Complete Report';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    if(isset($request->date)){
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
      return view('coordinator.final-report',compact('title','data','presentation'));
    }else{
      $current_year = date('Y');
      $presentation = FinalPresentation::join('students','students.id','=','final_presentations.student_id')
      ->join('project_titles','project_titles.group_id','=','final_presentations.group_id')
      ->select(DB::raw('AVG(final_presentations.introduction_Presentation) as p1,AVG(final_presentations.Final_Presentation_1) as p2,AVG(final_presentations.Proposal_Marks) as p3,AVG(final_presentations.Requirements_Presentation) as p4,AVG(final_presentations.Development_Presentation) as p5,AVG(final_presentations.Final_Presentation_Final) as p6,AVG(final_presentations.Supervisors_Individual) as p7,AVG(final_presentations.Project_Report) as p8,students.id,students.fname,students.mname,students.lname,project_titles.title,project_titles.group_id'))
      ->where('project_titles.title_status',2)
      ->whereYear('final_presentations.created_at',$current_year)
       ->groupBy('students.id')
        ->groupBy('students.fname')
        ->groupBy('students.mname')
        ->groupBy('students.lname')
        ->groupBy('project_titles.title')
        ->groupBy('project_titles.group_id')
        ->orderBy('project_titles.group_id','ASC')
      ->get();
      return view('coordinator.final-report',compact('title','data','presentation'));
    }

  }
  public function loadRemoveMemberForm(){
    $title = 'Shift Group Member';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $group_data = GroupData::distinct()->get(['group_id','regno']);
    $groups = Group::distinct()->get(['g_id']);
    $student_data = Student::where('has_group',1)
    ->orWhere('has_group',5)
    ->get(['regno','fname','lname']);
    return view('coordinator.remove-member',compact('data','title','group_data','groups','student_data'));
  }

  public function RemoveMember(Request $request){
    $validator = Validator::make($request->all(),[
      'regno' => 'required',
      'group_id' => 'required',
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
         // check if group already reach maximum size
         $current_year = date('Y');
         $current_year_group_size = GroupSize::whereYear('created_at',$current_year)->first();
        $group_data = GroupData::where('group_id',$request->group_id)
        ->get();
        if (count($group_data) == $current_year_group_size->group_size) {
            return response()->json(['success' => false, 'msg' => 'Sorry! Group Number Selected Already Reached Maximum Group Size of '.$current_year_group_size->group_size.' Members']);

        }else{

            $group_data = GroupData::where('group_id',$request->group_id)->first();

            $title_data = ProjectTitle::where('group_id',$group_data->group_id)->first();
            if ($title_data == null) {
                $update = GroupData::where('regno',$request->regno)->update([
                    'group_id' => $request->group_id,
                ]);
                return response()->json(['success' => true, 'msg' => 'Student Moved To Group Number '.$request->group_id.'']);
            }else {
            return response()->json(['success' => false, 'msg' => 'You can not shift group member if the group already post their title!']);
            }
      }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function loadGroupsSize(){
    $title = 'Group Size Management';
    $coordinator_data = Auth::User();
    $data = Coordinator::where('email',$coordinator_data->username)->first();
    $group_size = GroupSize::paginate(10);
    return view('coordinator.group-size-manage',compact('title','data','group_size'));
  }

  public function RegisterGroupSize(Request $request){
    if (isset($request->group_size_edit)) {
      $validator = Validator::make($request->all(),[
        'group_size_edit' => 'required',
      ]);
      if($validator->fails()){
        return response()->json(['msg' => $validator->errors()->toArray()]);
      }else{
        try {
          $update = GroupSize::where('id',$request->id)->update([
            'group_size' => $request->group_size_edit,
          ]);
          return response()->json(['success' => true, 'msg' => 'Group Size Updated Successfully']);

        } catch (\Exception $e) {
          return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
      }
    }else{

    $validator = Validator::make($request->all(),[
      'group_size' => 'required',
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $current_year = date('Y');
        $group_data = GroupSize::whereYear('created_at',$current_year)->first();

        if ($group_data == null) {
            $add = new GroupSize;
            $add->group_size = $request->group_size;
            $add->save();
          return response()->json(['success' => true, 'msg' => 'Group Size For '.$current_year.'Added Successfully']);

        }else {
          return response()->json(['success' => false, 'msg' => 'Group Size For '.$current_year.' Already Added Please Update it from edit button']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }
  }
}
