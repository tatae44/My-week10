<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function blog2() {
    $blog2 = DB::table("blogs")->get();
    return view("blog2", compact("blog2"));
    }
    function about2(){
        $name = "tanakit";
    $date = "6 กรกฎาคม 2026";

    return view("about2", compact("name", "date"));

    }
    function create(){
        return view('form');
    }
    function insert(Request $request){
        $request->validate(
            [
                "title" => "required|max:255",
                "content" => "required",
            ],[
                "title.required" => "กรุณาระบุชื่อบทความ",
                "title.max" => "ชื่อบทความต้องไม่เกิน 255 ตัวอักษร",
                "content.required" => "กรุณาระบุเนื้อหาบทความ",
            ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('blogs')->insert($data);

        return redirect()->route('blog2')->with('success', 'บันทึกบทความเรียบร้อยแล้ว');
    }
    function delete($id){
        DB::table('blogs')->where('id', $id)->delete();
        return redirect()->route('blog2')->with('success', 'ลบบทความเรียบร้อยแล้ว');
    }
}


