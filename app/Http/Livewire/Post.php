<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post as ModelPost;
use Illuminate\Support\Facades\Log;

class Post extends Component
{
    public $title,$body,$posts,$editdata,$update_id,$updatedata,$post_id,$deletedata,$description;

    public $edit_mode=false,$create_mode=false;

    public function store()
    {

       $validate_data= $this->validate([
                'title'=>'required',
                'description'=>'required'
       ]);

       ModelPost::create($validate_data);
       session()->flash('message','Post Created Successfully');
       $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->title='';
        $this->body='';
    }

    public function editPost($id)
    {
        Log::info("editPost");
        Log::info($id);
        $this->edit_mode=true;
        $editdata=ModelPost::find($id);
        $this->title=$editdata->title;
        $this->body=$editdata->body;
        $this->update_id=$id;

    }


    public function update()
    {

       $validate_data= $this->validate([
                'title'=>'required',
                'description'=>'required'
       ]);

       $updatedata=ModelPost::find($this->update_id);
       $updatedata->update($validate_data);

       session()->flash('message','Post Updated Successfully');
       $this->resetInputFields();
       $this->edit_mode=false;
    }

    public function cancelupdate()
    {
        $this->edit_mode=false;
        $this->resetInputFields();
    }
    public function delete($id)
    {
        $deletedata=ModelPost::find($id);
        $deletedata->delete();

    }

    public function render()
    {
        $this->posts=ModelPost::all();
        return view('livewire.post')->layout('livewire.home');
    }
}
