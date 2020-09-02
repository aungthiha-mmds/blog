<?php

namespace App;

use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function blogs(){
        return $this->belongsToMany('App\Blog', 'tag_blog');
    }

    public function blog($bid, $tid){
        $tag_blog = DB::table('tag_blog')->where('blog_id', '=', $bid)->where('tag_id','=', $tid)->first();
        return $tag_blog;
    }
}
