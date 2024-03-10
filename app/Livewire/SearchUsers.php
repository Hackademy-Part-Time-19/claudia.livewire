<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;


class SearchUsers extends Component
{
          
    
    use WithPagination;

    public $users;

   
    public $search="";

    public function render()
   {
        if($this->search==""){

            $this->users = User::all();
        }else{
           $this->users= User::where('name','like','%'.$this->search.'%')->orWhere('email','like','%'.$this->search.'%')->orderBy('name','ASC')->get();
        }
        
       return view('livewire.search-users');
    }
}