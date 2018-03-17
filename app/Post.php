<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function comments(){
    	return $this->hasMany(Comment::class);
    }
    public function addComment($body){
    	$this->comments()->create( compact('body') );
    	/*Comment::create([
    		'body' => $body,
    		'post_id' => $this->ad
    	]);*/
    }
    public function user(){ // $post->user->name() gets you the author name
    	return $this->belongsTo(User::class);
    }
    public function scopeFilter( $query, $filters){
	    	if ($month = $filters['month']) {
	    		$query->whereMonth('created_at', Carbon::parse($month)->month);
	    	}
	    	if ($year = $filters['year']) {
	    		$query->whereYear('created_at', $year);
	    	}
    }
    public static function archives(){
    	return static::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) published ')
    		->groupBy('year', 'month')
    		->orderByRaw('min(created_at) desc')
    		->get()
    		->toArray();
    }
    public function tags(){
    	// Any post may have many tags
    	return $this->belongsToMany(Tag::class);
    	// Any tag may be applied to many posts
    }
}
