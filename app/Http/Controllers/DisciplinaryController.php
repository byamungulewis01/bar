<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\DisciplineParticipant;
use App\Models\DisciplineSitting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplinaryController extends Controller
{
    public function index()
    {
        $users = User::all();
        $cases = DB::table('discipline')
            ->join('discipline_sittings', 'discipline.id', '=', 'discipline_sittings.discipline_case')
            ->select('discipline.*', 'discipline_sittings.*')
            ->get();
        return view('cases.index', compact('users', 'cases'));
    }
    public function store(Request $request)
    {
        $code = Discipline::all()->count() + 1;
        $number = 'DC/' . $code . '/' . date('Y');
        if ($request->case_type == 1) {
            $advocate = User::find($request->advocate);
            $name = $advocate->name;
            $email = $advocate->email;
            $case = Discipline::create([
                'p_name' => $request->name,
                'p_email' => $request->email,
                'p_phone' => $request->phone,
                'd_name' => $name,
                'd_email' => $email,
                'd_advocate' => $request->advocate,
                'case_number' => $number,
                'case_type' => $request->case_type,
                'complaint' => $request->complaint,
                'sammary' => $request->sammary,
                'register' => auth()->guard('admin')->user()->id,
            ]);
            DisciplineParticipant::create([
                'discipline_case' => $case->id,
                'advocate' => $request->advocate,
                'role' => 'Plaintiff',
            ]);
            DisciplineSitting::create(
                [
                    'discipline_case' => $case->id,
                    'category' => '',
                    'scheduledBy' => auth()->guard('admin')->user()->id,
                ]
            );
        }
        if ($request->case_type == 2) {
            $advocate = User::find($request->advocate);
            $name = $advocate->name;
            $email = $advocate->email;
            $case = Discipline::create([
                'p_name' => $name,
                'p_email' => $email,
                'p_advocate' => $request->advocate,
                'd_name' => $request->name,
                'd_email' => $request->email,
                'd_phone' => $request->phone,
                'case_number' => $number,
                'case_type' => $request->case_type,
                'complaint' => $request->complaint,
                'sammary' => $request->sammary,
                'register' => auth()->guard('admin')->user()->id,
            ]);
            DisciplineParticipant::create([
                'discipline_case' => $case->id,
                'advocate' => $request->advocate,
                'role' => 'Defendant',
            ]);
            DisciplineSitting::create(
                [
                    'discipline_case' => $case->id,
                    'category' => '',
                    'scheduledBy' => auth()->guard('admin')->user()->id,
                ]
            );
        }
        if ($request->case_type == 3) {
            if ($request->plaintiff == $request->defendant) {

                return back()->with('warning', 'Please Select difference Advocate');
            } else {

                $plaintiff = User::find($request->plaintiff);
                $p_name = $plaintiff->name;
                $p_email = $plaintiff->email;
                $defendant = User::find($request->defendant);
                $d_name = $defendant->name;
                $d_email = $defendant->email;
                $case = Discipline::create([
                    'p_name' => $p_name,
                    'p_email' => $p_email,
                    'p_advocate' => $request->plaintiff,
                    'd_name' => $d_name,
                    'd_email' => $d_email,
                    'd_advocate' => $request->defendant,
                    'case_number' => $number,
                    'case_type' => $request->case_type,
                    'complaint' => $request->complaint,
                    'sammary' => $request->sammary,
                    'register' => auth()->guard('admin')->user()->id,
                ]);
                DisciplineParticipant::create([
                    'discipline_case' => $case->id,
                    'advocate' => $request->plaintiff,
                    'role' => 'Plaintiff',
                ]);
                DisciplineParticipant::create([
                    'discipline_case' => $case->id,
                    'advocate' => $request->defendant,
                    'role' => 'Defendant',
                ]);
                DisciplineSitting::create(
                    [
                        'discipline_case' => $case->id,
                        'category' => '',
                        'scheduledBy' => auth()->guard('admin')->user()->id,
                    ]
                );
            }

        }

        return back()->with('message', 'Discipline case Added Successfully !!');
    }
    public function update(Request $request)
    {
        if ($request->case_type == 1) {
            $advocate = User::find($request->advocate);
            $name = $advocate->name;
            $email = $advocate->email;
            $discipline = Discipline::findorfail($request->case);
            $discipline->p_name = $request->name;
            $discipline->p_email = $request->email;
            $discipline->p_phone = $request->phone;
            $discipline->d_name = $name;
            $discipline->d_email = $email;
            $discipline->d_advocate = $request->advocate;
            $discipline->complaint = $request->complaint;
            $discipline->sammary = $request->sammary;
            $discipline->register = auth()->guard('admin')->user()->id;
            $discipline->updated_at = date('Y/m/d');
            $discipline->save();

            DisciplineParticipant::where('discipline_case', $request->case)->where('role', 'Plaintiff')
                ->orderBy('created_at')->take(1)->update([
                'advocate' => $request->advocate,
                'updated_at' => date('Y/m/d'),
            ]);
        }
        if ($request->case_type == 2) {
            $advocate = User::find($request->advocate);
            $name = $advocate->name;
            $email = $advocate->email;
            $discipline = Discipline::findorfail($request->case);
            $discipline->d_name = $request->name;
            $discipline->d_email = $request->email;
            $discipline->d_phone = $request->phone;
            $discipline->p_name = $name;
            $discipline->p_email = $email;
            $discipline->p_advocate = $request->advocate;
            $discipline->complaint = $request->complaint;
            $discipline->sammary = $request->sammary;
            $discipline->register = auth()->guard('admin')->user()->id;
            $discipline->updated_at = date('Y/m/d');
            $discipline->save();

            DisciplineParticipant::where('discipline_case', $request->case)->where('role', 'Defendant')
                ->orderBy('created_at')->take(1)->update([
                'advocate' => $request->advocate,
                'updated_at' => date('Y/m/d'),

            ]);
        }
        if ($request->case_type == 3) {
            if ($request->plaintiff == $request->defendant) {

                return back()->with('warning', 'Please Select difference Advocate');
            } else {

                $plaintiff = User::find($request->plaintiff);
                $p_name = $plaintiff->name;
                $p_email = $plaintiff->email;
                $defendant = User::find($request->defendant);
                $d_name = $defendant->name;
                $d_email = $defendant->email;

                $discipline = Discipline::findorfail($request->case);
                $discipline->d_name = $d_name ;
                $discipline->d_email = $d_email;
                $discipline->p_name =$p_name;
                $discipline->p_email = $p_email;
                $discipline->p_advocate = $request->plaintiff;
                $discipline->d_advocate = $request->defendant;
                $discipline->complaint = $request->complaint;
                $discipline->sammary = $request->sammary;
                $discipline->register = auth()->guard('admin')->user()->id;
                $discipline->updated_at = date('Y/m/d');
                $discipline->save();

                DisciplineParticipant::where('discipline_case', $request->case)
                ->where('role', 'Plaintiff')->orderBy('created_at')->take(1)
                ->update([
                'advocate' => $request->plaintiff,
                'updated_at' => date('Y/m/d'),
            ]);
                DisciplineParticipant::where('discipline_case', $request->case)
                ->where('role', 'Defendant')->orderBy('created_at')->take(1)
                ->update([
                'advocate' => $request->defendant,
                'updated_at' => date('Y/m/d'),
            ]);

            }

        }
        return back()->with('message', 'Discipline Case Updated Successfully');
    }

    public function addmember(Request $request)
    {
        $check = DisciplineParticipant::where('advocate',$request->advcate_id)->count();
        if($check == 0){
            DisciplineParticipant::create([
                'advocate' => $request->advcate_id,
                'discipline_case' => $request->case_id,
                'role' => $request->role,
            ]);
            
        return back()->with('message', 'Participant Added Successfully');
        }
        else{       
        return back()->with('warning', 'Participant is Already on List');
        }
      

    }
    public function deleteparticipant(Request $request)
    {

        $participant = DisciplineParticipant::where('table_id', $request->id);
        $participant->delete();

        return back()->with('message', 'Participant remove Successfully');
    }
    public function sitting(Request $request)
    {
        $sitting = DisciplineSitting::where('discipline_case', $request->id)->get();
        foreach ($sitting as $key) {
            $incase = $key->sittingDay;
        }

        if ($incase == 'NONE') {
            DisciplineSitting::where('discipline_case', $request->id)->update([
                'category' => $request->category,
                'sittingDay' => $request->sittingdate,
                'sittingTime' => $request->sittingtime,
                'sittingVenue' => $request->sittingAvenue,
            ]);

        } else {
            DisciplineSitting::create([
                'category' => $request->category,
                'sittingDay' => $request->sittingdate,
                'sittingTime' => $request->sittingtime,
                'sittingVenue' => $request->sittingAvenue,
                'discipline_case' => $request->id,
                'scheduledBy' => auth()->guard('admin')->user()->id,
            ]);
        }

        return back()->with('message', 'Next sitting Setted');
    }
    public function case_status(Request $request)
    {
        if ($request->status == 'closed') {
            $status = 'open';

        } else {
            $status = 'closed';

        }

        $discipline = Discipline::findorfail($request->case_id);
        $discipline->status = $status;
        $discipline->save();
        return back()->with('message', 'Status updates');

    }

    public function api(Request $request)
    {
        $data = Discipline::latest();
        if (!$request->expectsJson()) {
            return $data;
        } else {
            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        }
    }
    public function show($case_id)
    {
        $users = User::all();
        // $cases= DB::table('discipline')
        // ->join('discipline_sittings', 'discipline.id', '=', 'discipline_sittings.discipline_case')
        // ->select('discipline.*', 'discipline_sittings.*')
        // ->where('discipline.id',$case_id)->get();
        $sittings = DisciplineSitting::where('discipline_case', $case_id)->get();

        $case = Discipline::find($case_id);

        $members = DisciplineParticipant::where('discipline_case', $case_id)->get();

        return view('cases.detail', compact('case', 'users', 'members', 'sittings'));
    }
    public function mydiscipline($user)
    {
        // $members = DisciplineMember::where('case',$user)->get();

        // $case = Discipline::findorfail($user);
        // $hoster = $case->createdby;
        // $users = User::all();
        // $host = Admin::find($hoster);

        // $disciplines = Discipline::where('advcate_id',$user)->get();
        // $user = User::find($user);

        // return view('users.discipline',compact('user','disciplines','case','host','users','members'));

    }
}
