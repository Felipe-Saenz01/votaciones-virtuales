<?php

namespace App\Http\Livewire;

use App\Models\Sufragante;
use App\Models\Tag;
use Livewire\Component;

class TagSelector extends Component
{
    public $tags;
    public $selectSufragante;
    public $sufraganteEdit;

    public function mount(Sufragante $sufragante = null){
        $this->tags = Tag::all();

        $this->selectSufragante = [];
        
        if($sufragante != null){
  
            //$this->sufraganteEdit = $sufragante->tags->toArray();

            foreach ($sufragante->tags->toArray()  as $tag) {
                $this->selectSufragante[] = $tag['id'];
            } 

        }
        

    
    }


    public function render()
    {
        return view('livewire.tag-selector');
    }
}
