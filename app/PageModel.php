<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    protected $table = "page";
    
    const PAGE_ABOUT = 1;
    const PAGE_CONTACT = 2;
    const PAGE_FAQ = 3;
    public function getPageTemplate(){
        $page = [
                        $this::PAGE_ABOUT=>"AboutUs",
                        $this::PAGE_CONTACT=>"ContactUs",
                        $this::PAGE_FAQ=>"FAQs",
                       ];
        return $page;
    }
    public function getByTypeId($type_id){
        return $this::where('page_type',$type_id)->first();
    }
}
