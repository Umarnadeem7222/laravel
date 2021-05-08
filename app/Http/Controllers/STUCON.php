<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Gate; 
use Illuminate\Support\Facades\File; 

use Illuminate\Support\Facades\DB;
use App\Models\student;
use App\Models\allclass;
use App\Models\file1;
use App\Models\notification;
use App\Models\stufile;
use App\Models\user;
use App\Models\Hclass;
use Auth;
use Image;
use Illuminate\Support\Facades\Response;

class STUCON extends Controller
{
    public function main(){
        if(Gate::allows('teacher-in')){
            $id = Auth::id();
        $data = allclass::all()->where('T_ID','=',$id);
        $count = allclass::all()->where('T_ID','=',$id)->count();
        return view('tclass',compact('data','count'));
        }else{
        $id = Auth::id();
        $hc = Hclass::all()->where('S_ID','=',$id);
        $count = Hclass::all()->where('S_ID','=',$id)->count();
        return view('classes',compact('hc','count'));
    }}
    public function class(){
        $id = Auth::id();
        $hc = Hclass::all()->where('S_ID','=',$id);
        $count = Hclass::all()->where('S_ID','=',$id)->count();
        return view('classes',compact('hc','count'));
    }
    public function classdetail($ids){
        if(Gate::allows('student-in')){
            $data1 = file1::where('C_ID',$ids)->get();
            $count = file1::where('C_ID',$ids)->get()->count();
            $data2 = allclass::where('id',$ids)->take(1)->get();
            return view('classdetail',compact('data1','data2','count'));
        }
        dd("no acces to teacher");
    }
    public function showupload($ids){
        if(Gate::allows('teacher-in')){
            $data5 = allclass::where('id','=',$ids)->take(1)->get();
            return view('upload',compact('data5'));
        }
        dd("no acces to teacher");
    }
    public function tclassdetail(){
        if(Gate::allows('teacher-in')){

            return view('tclassdetail');

        }
        dd("no acces to student");
    }
    public function upload($id1 = NULL){
        if(Gate::allows('teacher-in')){

            $data5 = allclass::where('id','=',$id1)->take(1)->get();
            
            return view('upload',compact('data5'));

        }
        dd("no acces to student");
    }
    public function file2(request $req,$ids){
        if(Gate::allows('teacher-in')){
            $teacher = Auth::id();
            $tname = Auth::user()->name;
            if($req->IsMethod('post')){
                   $req->validate([
                    'file' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
                ]);
                $oname = $req->file->GetClientOriginalName();
                $fileName = time().'.'.$req->file->extension();  
                    $info = allclass::where('id','=',$ids)->first();
               $path =  $req->file->move(public_path('file'), $fileName);
                $data = $req->all();
                $newfile = new file1;
                
                $newfile->Name = $fileName;
               
                $newfile->T_ID = $teacher;
                
                $newfile->Desc = $data['desc'];
                $newfile->Path = $req->file->GetClientOriginalExtension();
                $newfile->Oname = $oname;
                $newfile->T_Name = $tname;
                $newfile->C_Name = $info->Name;
                $newfile->C_ID = $info->id;
                if( $req->has('sfile') ) {
                    $newfile->S_FILE = 1;
                } else {
                    
                    $newfile->S_FILE = 0;
                }
                
                $newfile->save();
              
                return redirect('/view/'.$info->id);
        } 
    }
    else{
    dd("no acces to student");

    }

}
    public function view($ids = NULL){
        if(Gate::allows('teacher-in')){
            
            $newfile = file1::where(['C_ID'=>$ids])->get();
            $count = file1::where(['C_ID'=>$ids])->get()->count();
            $id = $ids;
           
         
           
            $newfile1 = file1::where(['C_ID'=>$ids])->take(1)->get();
           
            return view('tclassdetail',compact('newfile','newfile1','count','id'));
            
        }else{
                dd("no acces to student");
            }
    }
    public function tclass(){
        $id = Auth::id();
        $data = allclass::all()->where('T_ID','=',$id);
        $count = allclass::all()->where('T_ID','=',$id)->count();
       
        return view('tclass',compact('data','count'));
    }
    public function signin(){
        return view('signin');
    }
    function downloadFile($ids  = Null){
        
        $a = file1::where(['id'=>$ids])->take(1)->first();
        $file = public_path().'/file/'.$a->Name;
        $header = array(
            'Content-Type: application/'.$a->Path,
        );
        return Response::download($file, $a->Oname,$header);
    }
    function deleteFile($ids){
        $del = file1::where('id',$ids)->delete();
        return redirect()->back();
    }
    function deleteclass($ids){
        $del = allclass::where('id',$ids)->delete();
        $del = file1::where('C_ID',$ids)->delete();
        $del = hclass::where('id',$ids)->delete();
        return redirect()->back()->with('msg','Class Deleted Successfully');
    }

    public function showstu(request $req){
        $class = $req->input("classes");
        
        $stu = Hclass::all()->where('Name','=',$class)->pluck("S_ID");
        $stu1 = Hclass::all()->where('Name','=',$class)->take(1);
        $data1= user::whereIn('id',$stu)->get();  
        $count= user::whereIn('id',$stu)->get()->count();  
        
        return view('showstu',compact('data1','stu1','count'));
    }
    public function showstu1($ids){
       $stu = Hclass::all()->where('id','=',$ids)->pluck("S_ID");
        $stu1 = Hclass::all()->where('id','=',$ids)->take(1);
        $data1= user::whereIn('id',$stu)->get();  
        $count= user::whereIn('id',$stu)->get()->count();  
          
        return view('showstu',compact('data1','stu1','count'));
    }
    public function showclass(){
        if(Gate::denies('teacher-in')){
            $data1 = allclass::all();
            return view('allclasses',compact('data1'));
        }
        dd("No access to teacher");
       
    }
    public function athDB($ids = NULL){
        if(Gate::allows('student-in')){
            $data2 = new Hclass;
            $stu = auth::id();
            $data1 = allclass::where(['id'=>$ids])->first();    
            if( Hclass::where([['id',$ids],['S_ID',$stu]])->exists()){
                return redirect('/class')->with('msg1','You are Already Enrolled in this class');
            }else{
            $data2->id = $data1->id;
            $data2->Name = $data1->Name;
            $data2->TName = $data1->TName;
            $data2->MaxStu = $data1->MaxStu;
            $data2->T_ID = $data1->T_ID;
            $data2->S_ID = Auth::id();
            $data2->save();
            return redirect('/class')->with('msg','class enrolled successfully : '.$data2->Name);
        }}
       dd(" No access to teacher");
    }       
    public function addclass(Request $request){
        if(Gate::allows('teacher-in')){
            $data = $request->all();
            $data1 =  new allclass;
            $data1->id = $data['cid'];
            $data1->Name = $data['cname'];
            $data1->TName = Auth::user()->name;
            $data1->T_ID = Auth::id();
            $data1->MaxStu = $data['ms'];
            $data1->save();
            return redirect('/tclass')->with('msg',$data1->Name.' Class created successfully ');
        }
        dd("No access to student");

    }
    public function tshowclass(){

        $data1 = allclass::all();
        return view('tshowclass',compact('data1'));
    }
    public  function stuassign($ids){
        if(Gate::allows('student-in')){
        $data = file1::where('id','=',$ids)->take(1)->get();
        return view('stuassign',compact('data'));
    }
    }
    public  function stufile(request $req, $ids){
        if(Gate::allows('student-in')){
            if($req->IsMethod('post')){
                
                $req->validate([
                 'file' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
             ]);
             $oname = $req->file->GetClientOriginalName();
             $fileName = time().'.'.$req->file->extension();  
             $info = file1::where('id','=',$ids)->first();
             $path =  $req->file->move(public_path('stufile'), $fileName);
             $data = $req->all();
             $newfile = new stufile;
             if( stufile::where([['Task_ID',$ids],['S_ID',Auth::id()]])->exists()){
                return redirect('/classdetail/'.$info->C_ID)->with('msg1','File Already has been submitted');
             }
             $newfile->Name = $fileName;
             $newfile->C_ID = $info->C_ID;
             $newfile->T_ID = $info->T_ID;
             $newfile->comment = $data['cmt'];
             $newfile->Ext = $req->file->GetClientOriginalExtension();
             $newfile->OName = $oname;
             $newfile->TName = $info->T_Name;
             $newfile->Task_ID = $ids;
             $newfile->Task = $info->Desc;
             $newfile->CName = $info->C_Name;
             $newfile->S_ID = Auth::id();
             $newfile->S_Name =  Auth::user()->name;
             
             $newfile->save();
           
             return redirect('/classdetail/'.$info->C_ID)->with('msg','File has been uploaded');
     } 
    }
    }  
    
    public  function supload($ids){
        if(Gate::allows('teacher-in')){
        $data = stufile::where('Task_ID','=',$ids)->get();
        $data1 = stufile::where('Task_ID','=',$ids)->take(1)->get();
        return view('suploads',compact('data','data1'));
    }
    
    }
    function downloadFile1($ids  = Null){
        
        $a = stufile::where(['id'=>$ids])->take(1)->first();
        $file = public_path().'/stufile/'.$a->Name;
        $header = array(
            'Content-Type: application/'.$a->Path,
        );
        return Response::download($file, $a->OName,$header);
    }
    public function search(request $req){

        $search = $req->input('search');
        $result = allclass::where("id",$search)->get(); 
        $count = allclass::where("id",$search)->get()->count(); 
        
        return view('searchres',compact('result','count'));
    }
    public function block($ids, $id2){
        $class = hclass::where([['S_ID',$ids],['id',$id2]])->pluck('Name');
        $msg = "Student removed from this class";
        $del = hclass::where([['S_ID',$ids],['id',$id2]])->delete();
        $exportedmsg = $this->class($msg);
        return redirect()->back()->with('msg',$msg);
    }
    public function leave($ids){
        $id2 = Auth::id();
        $class = hclass::where([['S_ID',$id2],['id',$ids]])->pluck('Name');
        $del = hclass::where([['S_ID',$id2],['id',$ids]])->delete();
        return redirect()->back()->with('msg','You left class :'.$class);
    }
}


