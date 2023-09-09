<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Response;

use App\Models\Student;
use App\Models\User;
use App\Models\GroupData;
use App\Models\Proposal;
use App\Models\ProjectTitle;
use App\Models\GroupSupervisor;
use App\Models\Announcement;
use App\Models\Group;
use App\Models\GroupSize;
use App\Models\GroupRequest;

class StudentController extends Controller
{
  public function loadStudeDashboard(){
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();

    $title = "Home Page";
    return view('student.home',compact('data','title','logged_in_student'));
  }

  public function StudentuploadPhoto(Request $Request){
    $Request->validate([
      'picture'=> 'required|mimes:jpg',

    ]);
    $student_data = Auth::User();
    $data = Student::where('regno',$student_data->username)->first();
    try {


      $file = date('mdYHis').uniqid().$student_data->username.'.'.$Request->picture->extension();
      $Request->picture->move(public_path('uploads/profiles/student'),$file);
      $upload_photo = Student::where('id',$data->id)->update([
        'photo' => $file
      ]);
      return redirect('student/home')->with('success','profile picture uploaded successfully');
    } catch (\Exception $e) {
      return redirect('student/home')->with('fail','Error');
    }
  }

  

  public function loadProjectTitle(){
    $title = "Project Title";
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();
    //fetch all group data
    $group_data = GroupData::where('regno',$logged_in_student->regno)->first();
    if($logged_in_student->has_group == 1 || $logged_in_student->has_group == 5){
        $details = ProjectTitle::where('group_id',$group_data->group_id)->get();
        return view('student.project-title',compact('details','title','data','logged_in_student'));
    }else{
        return redirect('/student/home')->with('fail','Sorry!, You have to create group first, or group must reach maximum group size for you to post project title, or you can consult your project coordinator!');

    }

  }

  public function uploadTitleForm(){
    $title = "Title Upload";
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();
    //   //fetch all group data
    $group_data = GroupData::where('regno',$logged_in_student->regno)->first();
    if($group_data == null){
      return redirect('/student/home')->with('fail','Sorry!, You have to create group first, for you to post project title.');
    }else{
      return view('student.title-form',compact('title','data','group_data','logged_in_student'));
    }
  }
  public function uploadProjectTitle(Request $request){

    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();
    //   //fetch all group data
    $group_data = GroupData::where('regno',$logged_in_student->regno)
    ->first();

    $validator = Validator::make($request->all(),[
      'group_id' => 'required',
      'name' => 'required'
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        
        $title = ProjectTitle::where('group_id',$request->group_id)->first();

        if($title == null){

			if ($logged_in_student->has_group == 1 || $logged_in_student->has_group == 5) {
				$title_data =  new ProjectTitle;
				$title_data->group_id = $request->group_id;
				$title_data->title = $request->name;
				$title_data->save();
				return response()->json(['success' => true, 'msg' => 'Title Uploaded Successfully']);
			}else {
          		return response()->json(['success' => false, 'msg' => 'Your Group is not complete please make sure your group size reach the required number or consult your project coordinator!']);
				
			}
          
        }else{
          return response()->json(['success' => false, 'msg' => 'Already You have uploaded Your Title']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => 'Failed! because your Project Title Has already been taken by another group!']);
      }
    }

  }

  public function ReuploadTitleForm($id){
    $title = "Reupload Title";
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();
    $title_id = $id;
    return view('student.reuplod-title-form',compact('title','data','title_id','logged_in_student'));
  }

  public function ReuploadTitle(Request $request){
    $data = Auth::user();
    $validator = Validator::make($request->all(),[
      'title_id' => 'required',
      'name' => 'required'
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{
      try {
        $update_title = ProjectTitle::where('id',$request->title_id)->update([
          'title' => $request->name,
          'title_status' => 0,
          'remarks' => '',
        ]);
        return response()->json(['success' => true, 'msg' => 'Title Re-uploaded Successfully']);
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }
  public function loadProposal(){
    $title = "Proposal Details";
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();
    //fetch all group data
    $group_data = GroupData::where('regno',$logged_in_student->regno)->first();
    if($group_data == null){
      return redirect('/student/home')->with('fail','Sorry!, You have to create group first, for you to Upload project proposal.');
    }else{
      $proposal_data = Proposal::join('groups','groups.id','=','proposals.group_id')
      ->where('proposals.group_id',$group_data->group_id)->get(['groups.id','proposals.created_at']);
      return view('student.proposal',compact('title','data','proposal_data','logged_in_student'));
    }


  }
  public function loadProposalForm(){
    $title = "Proposal Upload Form";
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();
    //   //fetch all group data
    $group_data = GroupData::where('regno',$logged_in_student->regno)
    ->first();
     $project_tls = ProjectTitle::where('group_id',$group_data->group_id)->first();
  if ($project_tls == null ) {
      return redirect('/student/home')->with('fail','Title is not upoaded!');
  }elseif($project_tls->title_status == 2){
    return view('student.proposal-form',compact('title','data','group_data','logged_in_student'));
  }else{
    return redirect('/student/home')->with('fail','Title is not yet Accepted!');
  }
    // return view('student.proposal-form',compact('title','data','group_data','logged_in_student','value'));
  }
  public function uploadProposal(Request $request){
    $validator = Validator::make($request->all(),[
      'proposal' => 'required|mimes:docx|max:5000'
    ]);
    if($validator->fails()){
      return response()->json(['msg' => $validator->errors()->toArray()]);
    }else{

      try {
        $data = Auth::user();
        $logged_in_student = Student::where('regno',$data->username)->first();
        //   //fetch all group data
        $group_data = GroupData::where('regno',$logged_in_student->regno)
        ->first();
        $proposal_data = Proposal::where('group_id',$group_data->group_id)->first();

        if($proposal_data == null){

          $file = date('mdYHis').$logged_in_student->fname.$logged_in_student->Mname.$logged_in_student->lname.uniqid().'.'.$request->proposal->extension();
          $request->proposal->move(public_path('uploads/proposal'),$file);

          $proposal = new Proposal;
          $proposal->proposal = $file;
          $proposal->group_id = $group_data->group_id;
          $proposal->proposal_status = 1;
          $proposal->save();
          return response()->json(['success' => true, 'msg' => 'proposal uploaded successfully']);
        }else{
          return response()->json(['success' => false, 'msg' => 'Sorry! you have already uploaded your Group proposal!']);
        }
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'msg' => $e->getMessage()]);
      }
    }
  }

  public function ViewSupervisor(){
    $title = 'Assigned Supervisor';
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();
    //   //fetch all group data
    $group_data = GroupData::where('regno',$logged_in_student->regno)->first();

    if($group_data == null){
      return redirect('/student/home')->with('fail','Sorry!, You have to create group first, for you to View Your Assigned Supervisor.');
    }else{
    $group_supervisor_check = GroupSupervisor::where('group_id',$group_data->group_id)->first();

      if($group_supervisor_check == null){
        return redirect('/student/home')->with('fail','Sorry!, Your Group Have Not Yet Assigned Supervisor.');
      }else{
          $group_supervisor = GroupSupervisor::join('supervisors','supervisors.id','=','group_supervisors.supervisor_id')
          ->join('group_data','group_data.group_id','=','group_supervisors.group_id')
          ->join('students','students.regno','=','group_data.regno')
          ->where('group_data.group_id',$group_data->group_id)
          ->groupBy('supervisors.firstname')
          ->groupBy('supervisors.middlename')
          ->groupBy('supervisors.lastname')
          ->groupBy('students.fname')
          ->groupBy('students.mname')
          ->groupBy('students.lname')
          ->get(['supervisors.firstname','supervisors.middlename','supervisors.lastname','students.fname','students.mname','students.lname']);
          
            foreach ($group_supervisor as $value) {
              # code...
            }
            return view('student.view-supervisor',compact('title','data','logged_in_student','group_supervisor','value'));
      }
      
    }
  }

  public function loadAnnouncements(){
    $title = "Announcements";
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();
    $announcement = Announcement::where('level',$logged_in_student->level)->orderBy('created_at','DESC')->paginate(3);
    return view('student.announcements',compact('title','data','logged_in_student','announcement'));
  }

  public function loadDoneTitles(){
    $title = "Project Titles";
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();
    $announcement = ProjectTitle::where('title_status',2)->paginate(10);
    return view('student.done-titles',compact('title','data','logged_in_student','announcement'));
  }
  public function UpchangePassword(Request $request){
    try {
      $request->validate([
        'password'=> 'required|min:6|max:15|confirmed',
      ]);
      $student_data = Auth::User();
      $upload_photo = User::where('id',$student_data->id)->update([
        'password' => Hash::make($request->password)
      ]);
      return redirect('/student/home')->with('success','password Updated Successfully');
    } catch (\Exception $e) {
      return redirect('/student/home')->with('fail',$e->getMessage());
    }
  }
  public function loadListStudentGroupRequest(){
    $title = "Group List";
    $current_year = date('Y');
    $group_list = Group::get('g_id');
    $group_size = GroupSize::whereYear('created_at',$current_year)->first('group_size');
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();
    $student_list = GroupData::join('students','students.regno','=','group_data.regno')
    ->where('students.level',$logged_in_student->level)
    ->whereYear('group_data.created_at',$current_year)
    ->orderBy('group_data.group_id')
    ->paginate(10,['group_data.group_id','students.id','students.has_group','students.fname','students.mname','students.lname','students.regno']);
    return view('student.group-request-list',compact('title','group_list','group_size','student_list','data','logged_in_student'));
  }
  public function loadStudentList(){
    try {

      $data = Auth::user();
      $logged_in_student = Student::where('regno',$data->username)->first();
      $title = "My group Details";
      $member_data = GroupData::where('regno',$logged_in_student->regno)->first();
        if($logged_in_student->has_group == 2){
            $group_status = 1;
			      $group_data = GroupData::join('students','students.regno','=','group_data.regno')
            ->where([['group_id',$member_data->group_id]])
            ->get(['students.regno','students.fname','students.mname','students.lname','students.has_group','group_data.group_id']);
            return view('student.student-list',compact('group_status','title','data','group_data','logged_in_student'));
        }elseif($logged_in_student->has_group == 3){
            return redirect('/student/home')->with('fail','Sorry! you have group request which is not completed!, Please! complete request procedure to view your complete group!');
        }elseif($logged_in_student->has_group == 0){
        return redirect('/group')->with('fail','Sorry! you have no group yet, Please! Create New Group Or Join the existing group or you can consult Your Project Coordinator');
        }elseif($logged_in_student->has_group == 1){
            $group_status = 1;
            $group_data = GroupData::join('students','students.regno','=','group_data.regno')
            ->where([['group_id',$member_data->group_id]])
            ->get(['students.regno','students.fname','students.mname','students.lname','students.has_group','group_data.group_id']);
            return view('student.student-list',compact('group_status','title','data','group_data','logged_in_student'));
        }elseif($logged_in_student->has_group == 10){
            $group_status = 2;
            $group_data = GroupData::join('students','students.regno','=','group_data.regno')
            ->where([['group_id',$member_data->group_id]])
            ->get(['students.regno','students.fname','students.mname','students.lname','students.has_group','group_data.group_id']);
            return view('student.student-list',compact('group_status','title','data','group_data','logged_in_student'));
        }elseif($logged_in_student->has_group == 5){
            $group_status = 1;
            $group_data = GroupData::join('students','students.regno','=','group_data.regno')
            ->where([['group_id',$member_data->group_id]])
            ->get(['students.regno','students.fname','students.mname','students.lname','students.has_group','group_data.group_id']);
            return view('student.student-list',compact('group_status','title','data','group_data','logged_in_student'));
        }
   

    } catch (\Exception $e) {
      return redirect('/project/groups')->with('fail',$e->getMessage());
    }


  }
  public function getMemberDetails($id){
    try {
       // check if group already reach maximum size
       $current_year = date('Y');
       $current_year_group_size = GroupSize::whereYear('created_at',$current_year)->first();
       

      $student_data = GroupData::join('students','students.regno','=','group_data.regno')
      ->where('group_id',$id)
      ->whereYear('group_data.created_at',$current_year)
      ->get();
      return response()->json(['success'=>true,'data'=> $student_data ,'check' => $current_year_group_size->group_size]);
    } catch (\Exception $e) {
      return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    }
  }

  public function CreateNewGroup(Request $request){
    
      $validator = Validator::make($request->all(),[
        'group_id' => 'required'
      ]);

      if($validator->fails()){
          return response()->json(['msg' => $validator->errors()->toArray()]);
      }else{
        try {

          $data = Auth::user();
          $logged_in_student = Student::where('regno',$data->username)->first();
        // check if group id already exist in a group data table
        $current_year = date('Y');
        $group_data = GroupData::where('group_id',$request->group_id)
        ->whereYear('group_data.created_at',$current_year)
        ->first();

        if($group_data == null ){
          // check if a student exist in group data table if yes means have a complete group!
          $student_group_data = GroupData::where('regno',$logged_in_student->regno)
        ->whereYear('group_data.created_at',$current_year)
        ->first();
          if($student_group_data == null){

            if($logged_in_student->has_group != 0){
                return response()->json(['success'=>false,'msg'=> 'Sorry!, You can not create new group, because You have another group already, or you have requested to join another group, Please Check my requests or my group options.']);
            }else{
                $create_group = new GroupData;
                $create_group->regno = $logged_in_student->regno;
                $create_group->group_id = $request->group_id;
                $create_group->save();
    // give permission to be admin of a group
                $update_students = Student::where('regno','=',$logged_in_student->regno)->update([
                    'has_group' => 10,
                ]);
                return response()->json(['success'=>true,'msg'=> 'Group Created Successfully!']);
            }
          }else{
            return response()->json(['success'=>false,'msg'=> 'Sorry!, You can not create new group, because You have another group already, view your group details by "<a href="/project/groups">click here<a>"']);
          }
        }else{
          return response()->json(['success'=>false,'msg'=> 'group number Already exist choose another one that does not exist']);
        }
    } catch (\Exception $e) {
      return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    }
  }
  }

  public function RequestGroup(Request $request){
    try{
        $data = Auth::user();
        $logged_in_student = Student::where('regno',$data->username)->first();
        if($logged_in_student->has_group == 3){
			return response()->json(['success'=>false,'msg'=>'You can not request more than one group check your request by <a href="/my/request">click here</a>']);
		}elseif($logged_in_student->has_group == 2){
			return response()->json(['success'=>false,'msg'=>'You can not request another Group Because you have joined Another Group!']);
		}elseif($logged_in_student->has_group == 10){
			return response()->json(['success'=>false,'msg'=>'You can not request another Group Because Already You have Created another group <a href="/project/groups">click here</a> to view Your Group Details or Go to "My Group" option on your sidebar menu.']);
		}elseif($logged_in_student->has_group == 5){
			return response()->json(['success'=>false,'msg'=>'You can not request another Group Because Already You have Created another group <a href="/project/groups">click here</a> to view Your Group Details or Go to "My Group" option on your sidebar menu.']);
		}elseif($logged_in_student->has_group == 1){
			return response()->json(['success'=>false,'msg'=>'You can not request another Group Because Already You have a Complete Group! <a href="/project/groups">click here</a> to view Your Group Details or Go to "My Group" option on your sidebar menu.']);
		}elseif($logged_in_student->has_group == 0){

			$request_group = new GroupRequest;
			$request_group->student_id_requested = $request->student_requested_id;
			$request_group->student_id_req = $logged_in_student->id;
			$request_group->group_id = $request->group_id;
			$request_group->save();
			// 
		  $update_students = Student::where('regno','=',$logged_in_student->regno)->update([
			'has_group' => 3,
		  ]);
		//   $update_students = Student::where('id','=',$request->student_requested_id)->update([
		// 	'has_group' => 3,
		//   ]);
		  return response()->json(['success'=>true,'msg'=>'group Request Sent Successfully']);
	
		}else{
			return response()->json(['success'=>false,'msg'=>'your not ligible to join any group']);

		}
        
    }catch(\Exception $e){
		return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

    }
  }

  public function loadRequest() {
    $title = "My Group Request";
    $data = Auth::user();
    $logged_in_student = Student::where('regno',$data->username)->first();

    $request_data = GroupRequest::join('students','students.id','group_requests.student_id_req')
   ->where('student_id_req',$logged_in_student->id)
   ->orWhere('student_id_requested',$logged_in_student->id)
   ->first();
   if($request_data == null){
		return redirect('/group')->with('fail','Sorry! you have no any group Request For Now!');
   }else{
	if($logged_in_student->has_group == 0){
		# have no any
			return redirect('/group')->with('fail','Sorry! you have no any group Request For Now, Please! Create New Group Or Join the existing group or you can consult Your Project Coordinator');
	   }elseif ($logged_in_student->has_group == 1) {
		# have complete group
			return redirect('/group')->with('fail','Sorry! You have a Complete Group, You can not have group requests!');
	   }elseif ($logged_in_student->has_group == 2) {
		# creted new group
			return redirect('/group')->with('fail','You can not have any request because you are not a group creator!');
	   }elseif ($logged_in_student->has_group == 3) {
		# requested joining group
        $my_request_data = GroupRequest::join('students','students.id','group_requests.student_id_requested')
        ->where('student_id_req',$logged_in_student->id)
        ->get(['students.fname','students.mname','students.lname','students.regno','group_requests.id','group_requests.group_id','group_requests.request_status','group_requests.created_at']);
        $request_type = 'requesting..';
        return view('student.request-details',compact('title','data','logged_in_student','my_request_data','request_type'));
	   }elseif ($logged_in_student->has_group == 10) {
		# group creator
		if($logged_in_student->id == $request_data->student_id_req){
			$my_request_data = GroupRequest::join('students','students.id','group_requests.student_id_requested')
			->where('student_id_req',$logged_in_student->id)
			->get(['students.fname','students.mname','students.lname','students.regno','group_requests.id','group_requests.group_id','group_requests.request_status','group_requests.created_at']);
			$request_type = 'requesting..';
			return view('student.request-details',compact('title','data','logged_in_student','my_request_data','request_type'));
		}elseif($logged_in_student->id == $request_data->student_id_requested){
			$my_request_data = GroupRequest::join('students','students.id','group_requests.student_id_req')
			->where('student_id_requested',$logged_in_student->id)
			->get(['students.fname','students.mname','students.lname','students.regno','group_requests.id','group_requests.group_id','group_requests.request_status','group_requests.created_at']);
			$request_type = 'requested..';
			return view('student.request-details',compact('title','data','logged_in_student','my_request_data','request_type'));
		}
	   }elseif ($logged_in_student->has_group == 5) {
		if($logged_in_student->id == $request_data->student_id_req){
			$my_request_data = GroupRequest::join('students','students.id','group_requests.student_id_requested')
			->where('student_id_req',$logged_in_student->id)
			->get(['students.fname','students.mname','students.lname','students.regno','group_requests.id','group_requests.group_id','group_requests.request_status','group_requests.created_at']);
			$request_type = 'requesting..';
			return view('student.request-details',compact('title','data','logged_in_student','my_request_data','request_type'));
		}elseif($logged_in_student->id == $request_data->student_id_requested){
			$my_request_data = GroupRequest::join('students','students.id','group_requests.student_id_req')
			->where('student_id_requested',$logged_in_student->id)
			->get(['students.fname','students.mname','students.lname','students.regno','group_requests.id','group_requests.group_id','group_requests.request_status','group_requests.created_at']);
			$request_type = 'requested..';
			return view('student.request-details',compact('title','data','logged_in_student','my_request_data','request_type'));
		}
	   }else{
				
	   }
   }
  
   
  }

  public function AcceptRequest($id){
    try {
        $request_data = GroupRequest::where('id',$id)->first();
        $get_student_requesting_data = Student::where('id',$request_data->student_id_req)->first();
        $get_student_requested_data = Student::where('id',$request_data->student_id_requested)->first();

		// check if group created members till now have meet the required group size if yes give them has_group == 1 otherwise set it to 2
        $current_year = date('Y');
        $current_year_group_size = GroupSize::whereYear('created_at',$current_year)->first();
        $group_data = GroupData::where('group_id',$request_data->group_id)
        ->get();

        if (count($group_data) == $current_year_group_size->group_size) {
			$update_students2 = Student::where('regno','=',$get_student_requested_data->regno)->update([
				'has_group' => 5,
			]);
			$update_students1 = Student::where('regno','=',$get_student_requesting_data->regno)->update([
				'has_group' => 0,
				]);
			$request_data = GroupRequest::where('student_id_requested',$get_student_requested_data->id)->delete();
			return redirect('/project/groups')->with('fail','Request Rejected Because your group is already complete!');
		}elseif(count($group_data) < $current_year_group_size->group_size){
            $create_group = new GroupData;
            $create_group->regno = $get_student_requesting_data->regno;
            $create_group->group_id = $request_data->group_id;
            $create_group->save();
			$update_students1 = Student::where('regno','=',$get_student_requesting_data->regno)->update([
				'has_group' => 1,
			]);
			$current_year = date('Y');
			$current_year_group_size = GroupSize::whereYear('created_at',$current_year)->first();
			$group_data = GroupData::where('group_id',$request_data->group_id)
			->get();
				if (count($group_data) == $current_year_group_size->group_size) {
					$update_students2 = Student::where('regno','=',$get_student_requested_data->regno)->update([
					'has_group' => 5,
					]);
			}
			$request_data = GroupRequest::where('id',$id)->delete();
			return redirect('/project/groups')->with('success','Request Accepted Successfully!');
		}
    } catch (\Exception $e) {
    	return redirect('/my/request')->with('fail',$e->getMessage());
    }
  }
  public function RejectRequest($id){
    try {
      $request_data = GroupRequest::where('id',$id)->first();
      $get_student_requesting_data = Student::where('id',$request_data->student_id_req)->first();
      //delete request details
      $request_delete = GroupRequest::where('id',$id)->delete();
      $update_students = Student::where('regno','=',$get_student_requesting_data->regno)->update([
				'has_group' => 0,
			]);
    	return redirect('/group')->with('success','Request Rejected Successfully!');
    } catch (\Exception $e) {
    	return redirect('/group')->with('fail',$e->getMessage());
    }
  }
  public function CancelRequest($id){
    try {
      $data = Auth::user();
      $logged_in_student = Student::where('regno',$data->username)->first();
  
      //code...
      $request_data = GroupRequest::where('id',$id)->delete();
      $update_students = Student::where('regno','=',$logged_in_student->regno)->update([
				'has_group' => 0,
			]);
    	return redirect('/group')->with('success','Request Cancelled Successfully!');

    } catch (\Exception $e) {
    	return redirect('/group')->with('fail',$e->getMessage());
    }
  }
}
