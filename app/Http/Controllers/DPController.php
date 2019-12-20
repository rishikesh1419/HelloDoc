<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\patient;

use App\doctor;

use App\appointment;

use App\clinic;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;

class DPController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function patlogin()
    {  
        return view('pages.patient.patlogin');
    }

    public function patsignup()
    {
        return view('pages.patient.patsignup');
    }
 
    public function newpat(Request $request)
    {
        $P_EMAIL = Input::get("pemail");
        $PSWD = Input::get("pswd");
        $AGE = Input::get("age");
        $FNAME = Input::get("fname");
        $LNAME = Input::get("lname");
        $GENDER = Input::get("gender");
        $PHONE = Input::get("phn");
  
        $insertQuery = 'INSERT into patient (P_EMAIL, PSWD, AGE, FNAME, LNAME, GENDER, PHONE) VALUES (?,?,?,?,?,?,?)';
        DB::insert($insertQuery, [$P_EMAIL, $PSWD, $AGE, $FNAME, $LNAME, $GENDER, $PHONE]);

        $results = DB::select('SELECT * FROM patient WHERE P_EMAIL=?',[$P_EMAIL]);
        if(count($results)==0) {
            request()->session()->put('invalidpemail',TRUE);
            return redirect()->to('patlogin');
        }
        else if($results[0]->PSWD==$PSWD) {
            request()->session()->forget('invalidpemail');
            request()->session()->put('FNAME',$results[0]->FNAME);
            request()->session()->put('LNAME',$results[0]->LNAME);
            request()->session()->put('P_EMAIL',$P_EMAIL);
            
            request()->session()->put('A',$results[0]->AGE);
            if ($results[0]->GENDER == 'F') {
                request()->session()->put('G','Female');
            }
            else {
                request()->session()->put('G','Male');
            }
            $apts = DB::select('SELECT * FROM appointment WHERE P_EMAIL=?',[$P_EMAIL]);
            $papts = [];
            // foreach($apts as $apt){
            //     $papts[0]['D_EMAIL'] = $apt->D_EMAIL;
            //     $papts[]
            // }
            for($i=0 ; $i<count($apts) ; $i++) {
                $papts[$i]['D_EMAIL'] = $apts[$i]->D_EMAIL;
                $papts[$i]['CID'] = $apts[$i]->CID;
            }
            request()->session()->put('apts',$papts);

            // request()->session->put('apts',$apts);
            return redirect()->to('patdash');
        }
        else {
            return view('pages.patient.patlogin');
        }
    }

    public function logincheck(Request $request)
    {
        $P_EMAIL = Input::get("pemail");
        $PSWD = Input::get("pswd");

        $results = DB::select('SELECT * FROM patient WHERE P_EMAIL=?',[$P_EMAIL]);
        if(count($results)==0) {
            request()->session()->put('invalidpemail',TRUE);
            return redirect()->to('patlogin');
        }
        else if($results[0]->PSWD==$PSWD) {
            request()->session()->forget('invalidpemail');
            request()->session()->put('FNAME',$results[0]->FNAME);
            request()->session()->put('LNAME',$results[0]->LNAME);
            request()->session()->put('P_EMAIL',$P_EMAIL);
            request()->session()->put('A',$results[0]->AGE);
            if ($results[0]->GENDER == 'F') {
                request()->session()->put('G','Female');
            }
            else {
                request()->session()->put('G','Male');
            }
            
            return redirect()->to('patdash');

        }
        else {
            return view('pages.patient.patlogin');
        }
    }

    public function patdash()
    {
        session()->forget('DE');
        session()->forget('CI');
        session()->forget('DBN');
        session()->forget('CBN');
        session()->forget('searchre');
        $P_EMAIL = session()->get('P_EMAIL','Error');

        $tod = date("Y-m-d");

        $apts = DB::select('SELECT * FROM appointment WHERE P_EMAIL=? AND DATE1 >= ? ORDER BY DATE1',[$P_EMAIL, $tod]);
            $papts = [];
            
            for($i=0 ; $i<count($apts) ; $i++) {
                $papts[$i]['D_EMAIL'] = $apts[$i]->D_EMAIL;
                $din = DB::select('SELECT * FROM doctor WHERE D_EMAIL=?',[$apts[$i]->D_EMAIL]);
                $dn = $din[0]->FNAME . " " . $din[0]->LNAME;
                $cin = DB::select('SELECT * FROM clinic WHERE CID=?',[$apts[$i]->CID]);
                $Cna = $cin[0]->CNAME;
                $papts[$i]['Cna'] = $Cna;
                $papts[$i]['D'] = $apts[$i]->DATE1;
                $papts[$i]['T'] = $apts[$i]->TIME1;
                $papts[$i]['Dna'] = $dn;
            }
            request()->session()->put('apts',$papts);

        
        if($P_EMAIL=='Error') {
            return redirect()->to('patlogin');
        }
        return view('pages.patient.patdash');
    }


    public function patpastapt()
    {
        session()->forget('DE');
        session()->forget('CI');
        session()->forget('DBN');
        session()->forget('CBN');
        session()->forget('searchre');
        session()->forget('apts');
        $P_EMAIL = session()->get('P_EMAIL','Error');

        $tod = date("Y-m-d");

        $apts = DB::select('SELECT * FROM appointment WHERE P_EMAIL=? AND DATE1 < ? ORDER BY DATE1',[$P_EMAIL, $tod]);
            $papts = [];
            
            for($i=0 ; $i<count($apts) ; $i++) {
                $papts[$i]['D_EMAIL'] = $apts[$i]->D_EMAIL;
                $din = DB::select('SELECT * FROM doctor WHERE D_EMAIL=?',[$apts[$i]->D_EMAIL]);
                $dn = $din[0]->FNAME . " " . $din[0]->LNAME;
                $cin = DB::select('SELECT * FROM clinic WHERE CID=?',[$apts[$i]->CID]);
                $Cna = $cin[0]->CNAME;
                $papts[$i]['Cna'] = $Cna;
                $papts[$i]['D'] = $apts[$i]->DATE1;
                $papts[$i]['T'] = $apts[$i]->TIME1;
                $papts[$i]['Dna'] = $dn;
            }
            request()->session()->put('apts',$papts);

        
        if($P_EMAIL=='Error') {
            return redirect()->to('patlogin');
        }
        return view('pages.patient.patpastapt');
    }

    public function plogout(Request $request)
    {
        session()->flush();
        return redirect()->to('patlogin');
    }

    public function drsearch(Request $request)
    {
        session()->forget('DE');
        session()->forget('CI');
        session()->forget('DBN');
        session()->forget('CBN');
        $drn = Input::get('drn');
        $drr = DB::select('SELECT * FROM doctor WHERE FNAME=? OR LNAME=? OR SPECIALIZATION=?',[$drn,$drn,$drn]);
        $searchre = [];
        for ($i=0; $i<count($drr); $i++) {
            $searchre[$i]['D_EMAIL'] = $drr[$i]->D_EMAIL;
            $searchre[$i]['CID'] = $drr[$i]->CID;
            $searchre[$i]['DN'] = $drr[$i]->FNAME . " " . $drr[$i]->LNAME;
            $searchre[$i]['SPE'] = $drr[$i]->SPECIALIZATION;
            $intm = DB::select('SELECT * FROM clinic WHERE CID=?',[$drr[$i]->CID]);
            $searchre[$i]['CINFO'] = $intm[0]->CNAME. ", " . $intm[0]->BASE . ", " . $intm[0]->CITY . ", " . $intm[0]->PIN;
            $searchre[$i]['EXPR'] = $drr[$i]->EXPERIENCE;
            $searchre[$i]['DD'] = $drr[$i]->D1;
            $searchre[$i]['DF'] = $drr[$i]->FEES;
        }
        request()->session()->put('searchre',$searchre);
        return redirect()->to('searchres');    
    }

    public function searchres()
    {
        return view('pages.patient.searchres');
    }


    public function bkint(Request $request)
    {
        $DE = Input::get('DBKE');
        $CI = Input::get('CBKE');

        request()->session()->put('DE',$DE);
        request()->session()->put('CI',$CI);

        return redirect()->to('bkint2');
    }

    public function bkint2()
    {
        session()->forget('searchre');
        $de = session()->get('DE','Error');
        $dbin = DB::select('SELECT * FROM doctor WHERE D_EMAIL=?',[$de]);
        $dbinf = $dbin[0];
        $DBN = $dbinf->FNAME . " " . $dbinf->LNAME;
        session()->put('DBN',$DBN);
        $CI = session()->get('CI','Error');
        $CN = DB::select('SELECT * FROM clinic WHERE CID=?',[$CI]);
        $CBN = $CN[0]->CNAME;
        session()->put('CBN',$CBN);
        return view('pages.patient.bkint2');
    }

    public function bkint3(Request $request)
    {
        $P_EMAIL = session()->get('P_EMAIL','Error');
        $DE = session()->get('DE','Error');
        $CI = session()->get('CI','Error'); 
        $aptdate = Input::get('aptdate');
        $apttime = Input::get('apttime');
        $aptis = Input::get('aptis');
        $insertapt = 'INSERT INTO appointment (P_EMAIL, D_EMAIL, CID, DATE1, TIME1, ISSUE) VALUES (?,?,?,?,?,?)';
        DB::insert($insertapt,[$P_EMAIL,$DE,$CI,$aptdate,$apttime,$aptis]);

        session()->forget('DE');
        session()->forget('DBN');
        session()->forget('CBN');
        session()->forget('CI');

        return redirect()->to('patdash');
    
    }










    public function doclogin()
    {
        return view('pages.doctor.doclogin');
    }

    public function docsignup()
    {
        return view('pages.doctor.docsignup');
    }

    
    public function newdoc(Request $request)
    {
        $D_EMAIL = Input::get("demail");
        $PSWD = Input::get("pswd");
        $EXP = Input::get("exp");
        $FNAME = Input::get("fname");
        $LNAME = Input::get("lname");
        $GENDER = Input::get("gender");
        $SPL = Input::get("spl");
        $D1 = Input::get('d1');
        $CID = Input::get('cid');
        $FEES = Input::get('fees');
  
        $insertQuery = 'INSERT into doctor (D_EMAIL, PSWD, FNAME, LNAME, GENDER, EXPERIENCE, SPECIALIZATION, FEES, D1, CID) VALUES (?,?,?,?,?,?,?,?,?,?)';
        DB::insert($insertQuery, [$D_EMAIL, $PSWD, $FNAME, $LNAME, $GENDER, $EXP, $SPL, $FEES, $D1, $CID]);

        $results = DB::select('SELECT * FROM doctor WHERE D_EMAIL=?',[$D_EMAIL]);
        if(count($results)==0) {
            request()->session()->put('invalidpemail',TRUE);
            return redirect()->to('doclogin');
        }
        else if($results[0]->PSWD==$PSWD) {
            request()->session()->forget('invalidpemail');
            request()->session()->put('FNAME',$results[0]->FNAME);
            request()->session()->put('LNAME',$results[0]->LNAME);
            request()->session()->put('D_EMAIL',$D_EMAIL);
            request()->session()->put('SPL',$results[0]->SPECIALIZATION);
            request()->session()->put('D',$results[0]->D1);
            request()->session()->put('E',$results[0]->EXPERIENCE);
            
            $cnd = DB::select('SELECT * FROM clinic WHERE CID=?',[$CID]);
            $cndd = $cnd[0]->CNAME;

            request()->session()->put('C',$cndd);

            
            $apts = DB::select('SELECT * FROM appointment WHERE D_EMAIL=?',[$D_EMAIL]);
            $papts = [];
            
            for($i=0 ; $i<count($apts) ; $i++) {
                $papts[$i]['P_EMAIL'] = $apts[$i]->P_EMAIL;
                $papts[$i]['CID'] = $apts[$i]->CID;
            }
            request()->session()->put('apts',$papts);

            // request()->session->put('apts',$apts);
            return redirect()->to('docdash');
        }
        else {
            return view('pages.doctor.doclogin');
        }
    }

    public function logincheckd (Request $request)
    {
        $D_EMAIL = Input::get("demail");
        $PSWD = Input::get("pswd");

        $results = DB::select('SELECT * FROM doctor WHERE D_EMAIL=?',[$D_EMAIL]);
        if(count($results)==0) {
            request()->session()->put('invalidpemail',TRUE);
            return redirect()->to('doclogin');
        }
        else if($results[0]->PSWD==$PSWD) {
            request()->session()->forget('invalidpemail');
            request()->session()->put('FNAME',$results[0]->FNAME);
            request()->session()->put('LNAME',$results[0]->LNAME);
            request()->session()->put('D_EMAIL',$D_EMAIL);
            request()->session()->put('SPL',$results[0]->SPECIALIZATION);
            request()->session()->put('D',$results[0]->D1);
            request()->session()->put('E',$results[0]->EXPERIENCE);
            
            if ($results[0]->GENDER == 'F') {
                request()->session()->put('G','Female');
            }
            else {
                request()->session()->put('G','Male');
            }
            
            return redirect()->to('docdash');

        }
        else {
            return redirect()->to('doclogin');
        }
    }

    public function docdash()
    {
        $D_EMAIL = session()->get('D_EMAIL','Error');

        $tod = date("Y-m-d");

        $apts = DB::select('SELECT * FROM appointment WHERE D_EMAIL=? AND DATE1 >= ? ORDER BY DATE1',[$D_EMAIL, $tod]);
            $papts = [];
            
            for($i=0 ; $i<count($apts) ; $i++) {
                $papts[$i]['P_EMAIL'] = $apts[$i]->P_EMAIL;
                $pin = DB::select('SELECT * FROM patient WHERE P_EMAIL=?',[$apts[$i]->P_EMAIL]);
                $pn = $pin[0]->FNAME . " " . $pin[0]->LNAME;
                $cin = DB::select('SELECT * FROM clinic WHERE CID=?',[$apts[$i]->CID]);
                $Cna = $cin[0]->CNAME;
                $papts[$i]['Cna'] = $Cna;
                $papts[$i]['D'] = $apts[$i]->DATE1;
                $papts[$i]['T'] = $apts[$i]->TIME1;
                $papts[$i]['Pna'] = $pn;
            }
            request()->session()->put('apts',$papts);

        
        if($D_EMAIL=='Error') {
            return redirect()->to('doclogin');
        }
        return view('pages.doctor.docdash');
    }



    public function docpastapt()
    {
        
        session()->forget('apts');
        $D_EMAIL = session()->get('D_EMAIL','Error');

        $tod = date("Y-m-d");

        $apts = DB::select('SELECT * FROM appointment WHERE D_EMAIL=? AND DATE1 < ? ORDER BY DATE1',[$D_EMAIL, $tod]);
            $papts = [];
            
            for($i=0 ; $i<count($apts) ; $i++) {
                $papts[$i]['P_EMAIL'] = $apts[$i]->P_EMAIL;
                $pin = DB::select('SELECT * FROM patient WHERE P_EMAIL=?',[$apts[$i]->P_EMAIL]);
                $pn = $pin[0]->FNAME . " " . $pin[0]->LNAME;
                $cin = DB::select('SELECT * FROM clinic WHERE CID=?',[$apts[$i]->CID]);
                $Cna = $cin[0]->CNAME;
                $papts[$i]['Cna'] = $Cna;
                $papts[$i]['D'] = $apts[$i]->DATE1;
                $papts[$i]['T'] = $apts[$i]->TIME1;
                $papts[$i]['Pna'] = $pn;
            }
            request()->session()->put('apts',$papts);

        
        if($D_EMAIL=='Error') {
            return redirect()->to('doclogin');
        }
        return view('pages.doctor.docpastapt');
    }


    public function dlogout(Request $request)
    {
        session()->flush();
        return redirect()->to('doclogin');
    }
}
