<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends CreatePostRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //dd($this);

        if($this->user()->id== $this->post->user_id){
            return true;
        }else{
            session()->flash('msg',"Error usted no es el autor del post");
            return false;
        }

    }


}
