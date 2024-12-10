<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpWord\PhpWord;

class TaskController extends Controller
{
    //
    public function showForm()
    {
        return view('task_form');
    }

    public function handleForm(Request $request){
        $request->validate([
            'content' => 'required',
        ]);

        $task = new Task();
        $task->content = $request->content;
        $task->save();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText($request->content);

        $fileName = storage_path('app/task.docx');
       
        try {
            $phpWord->save($fileName, 'Word2007');
            Log::info('Word document saved to: ' . $fileName);
        } catch (\Exception $e) {
            Log::error('Error saving Word document: ' . $e->getMessage());
        }

        return back()->with('success', 'Task saved and document created!');
    
}



}
