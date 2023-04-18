<?php

namespace App\Http\Livewire\User;
use App\Models\Review;
use App\Models\User;
use Livewire\Component;

class UserReviewComponent extends Component
{
    public $user_id;
    public $rating;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'rating' => 'required'
        ]);
    }

    public function addReview()
    {
        $this->validate([
            'rating' => 'required'
        ]);
        $review = new Review();
        $review->rating = $this->rating;
        $review->user_id= $this->user_id;
        $review->save();

        $user = User::find($this->user_id);
        $user->rstatus = true;
        $user->save();
        session()->flash('message','Your review has been added successfully!');
    }

    public function render()
    {
        $user = User::find($this->user_id);
        return view('livewire.user.user-review-component',['user'=>$user])->layout('layouts.base');
    }
}
