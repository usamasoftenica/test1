<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campgrounds extends CI_Model {

public function findNumRows($table,$where="",$like="")
  {
    # code...
     $this->db->select('*');
     $this->db->from($table);
     if($where){
     $this->db->where($where);
   }
    if($like)
    {

        $this->db->like($like);

    }  
     $query = $this->db->get();
     $result = $query->num_rows();
     return $result;
  }
  public function findOrCreate($table, $like , $id)
  {

    # code...
     $this->db->select($id);
     $this->db->from($table);

        $this->db->like($like);

     $query = $this->db->get();

     $result = $query->result();
    
     if(!$result)
     {
        
       //$sql = $this->db->insert($table,$like);
       //return $id= $this->db->insert_id();

         return 0 ;
     }

     return $result[0]->$id  ;
      
  }


    public function getInformation(){

   $this->db->select("info_id,name,slug");
   $this->db->from("informationalpages");
   $this->db->where('live',1);
   $this->db->order_by('order', 'asc');
   $query = $this->db->get();        
   return $query->result();    

    }
    public function getInformationforHome(){

     $this->db->select("info_id,name,slug");
   $this->db->from("informationalpages");
   //$this->db->where('live',1);
   $this->db->order_by('order', 'asc');
   $query = $this->db->get();        
   return $query->result();    

    }
    public function getInformationHOme(){

     $this->db->select("info_id,name,slug");
   $this->db->from("informationalpages");
   $this->db->where('live',1);
   $this->db->order_by('order', 'asc');
//   $this->db->limit('9');
   $query = $this->db->get();        
   return $query->result();    

    }
    public function getHomeContent(){

     $this->db->select("*");
   $this->db->from("home_content");
  
   $query = $this->db->get();        
   return $query->result();    

    }
    public function getInformationAll(){

    $this->db->select("*");
    $this->db->from("informationalpages");
    $this->db->where('live',1);
    $this->db->order_by('order', 'asc');
   
   $query = $this->db->get();        
   return $query->result();    

    }
    public function getBannerImagesAll(){

    $this->db->select("*");
    $this->db->from("banner_image_home");
    // $this->db->where('live',1);
    $this->db->order_by('id_image', 'desc');
   
   $query = $this->db->get();        
   return $query->result();    

    }
    public function getAllRegion(){

    $this->db->select("*");
    $this->db->from("region");
    // $this->db->where('live',1);
    //$this->db->order_by('id_image', 'desc');
   
   $query = $this->db->get();        
   return $query->result();    

    }
    public function getInformationAllForSort(){

     $this->db->select("*");
   $this->db->from("informationalpages");
    //$this->db->where('live',1);
  //$this->db->order_by('info_id', 'asc');
   
   $query = $this->db->get();        
   return $query->result();    

    }
    function get_next($id){

$stmt = $this->db->query("SELECT * FROM sitedescription WHERE siteId > $id ORDER BY siteId LIMIT 1;");
$id = $stmt->row();
if ($id !== false) {
    return $id;
}
}
function get_previous($id){

$stmt = $this->db->query("SELECT * FROM sitedescription WHERE siteId < $id ORDER BY siteId DESC LIMIT 1;");
$id = $stmt->row();
if ($id !== false) {
    return $id;
}
}
   
public function find($table,$where,$start="",$end="",$row="",$joins = "",$like="", $select="",$orderBy="" ,$groupby="")

    {
          if ($select != "") {
           $this->db->select($select);
          }
          else
          {
            $this->db->select('*');
          }

    $this->db->from($table);    
     if ($joins != "") {
           foreach ($joins as $join) {
               $this->db->join($join[0], $join[1], $join[2]);
           }

       }

    if($where){
    $this->db->where($where);
  }

       //    if ($where != "") {
       //     foreach ($where as $wher) {
       //         // $this->db->join($join[0], $join[1], $join[2]);
       //       $this->db->where($wher);
       //     }

       // }

    if($like)
    {

        $this->db->like($like);

    }    

// if($orderBy!="" && $order!="" ){
// $this->db->order_by($orderBy, $order);
// }
   
      if ($orderBy != "") {
           foreach ($orderBy as $order) {
               $this->db->order_by($order[0], $order[1]);
           }

       }

       if ($groupby!= "") {
           foreach ($groupby as $group) {
               $this->db->group_by($group[0]);
           }

       }
       
      if ($end != "") {

           $this->db->limit($end, $start);

       }     $query = $this->db->get();


    if(empty($row))

    $result = $query->row();

    else{

        $result = $query->result();

    }
    //echo $this->db->last_query();
    return $result;

    }
       public function findNumRowsPagenation2($table,$where="",$like="",$joins)
  {
    # code...
     $this->db->select('*');
     $this->db->from($table);
      if ($joins != "") {
           foreach ($joins as $join) {
               $this->db->join($join[0], $join[1], $join[2]);
           }

       }
    if($where){
    $this->db->where($where);
  }

    if($like)
    {

        $this->db->like($like);

    }  
      // if ($like != "") {
      //   $i=0;
      //      foreach ($like as $w) {

      //         if($i==0){
      //          $this->db->like($w);
      //        }else{
      //         $this->db->or_like($w);
      //        }
      //        $i++;
      //      }

      //  }
     $query = $this->db->get();
     $result = $query->num_rows();
     return $result;
  }

    public function findNumRowsPagenation($table,$where="",$like="",$joins)
  {
    # code...
     $this->db->select('*');
     $this->db->from($table);
      if ($joins != "") {
           foreach ($joins as $join) {
               $this->db->join($join[0], $join[1], $join[2]);
           }

       }
      if ($where != "") {
           foreach ($where as $w) {

               $this->db->like($w);
           }

       }

    if($like)
    {

        $this->db->like($like);

    }  
      // if ($like != "") {
      //   $i=0;
      //      foreach ($like as $w) {

      //         if($i==0){
      //          $this->db->like($w);
      //        }else{
      //         $this->db->or_like($w);
      //        }
      //        $i++;
      //      }

      //  }
     $query = $this->db->get();
     $result = $query->num_rows();
     return $result;
  }
public function findpagenation($table,$where,$start="",$end="",$row="",$joins = "",$like="", $select="",$orderBy="")

    {
          if ($select != "") {
          $this->db->select($select);
          }
          else
          {
            $this->db->select('*');
          }

    $this->db->from($table);    
     if ($joins != "") {
           foreach ($joins as $join) {
               $this->db->join($join[0], $join[1], $join[2]);
           }

       }

   if ($where != "") {
           foreach ($where as $w) {

               $this->db->where($w);
           }

       }

       //    if ($where != "") {
       //     foreach ($where as $wher) {
       //         // $this->db->join($join[0], $join[1], $join[2]);
       //       $this->db->where($wher);
       //     }

       // }

    if($like)
    {

        $this->db->like($like);

    }    
      // if ($like != "") {
      //   $i=0;
      //      foreach ($like as $w) {

      //         if($i==0){
      //          $this->db->like($w);
      //        }else{
      //         $this->db->or_like($w);
      //        }
      //        $i++;
      //      }

      //  }

// if($orderBy!="" && $order!="" ){
// $this->db->order_by($orderBy, $order);
// }
   
      if ($orderBy != "") {
           foreach ($orderBy as $order) {
               $this->db->order_by($order[0], $order[1]);
           }

       }
      if ($start != "") {

           $this->db->limit($end, $start);

       }     $query = $this->db->get();


    if(empty($row))

    $result = $query->row();

    else{

        $result = $query->result();

    }

    return $result;

    }

  public function insert($table,$data)
  {
    
       $sql = $this->db->insert($table,$data); 
       
      if($sql)
      {
        return $id= $this->db->insert_id();
      }else{
        return -1;
      }
  }

     public function update_data($column,$id="", $table, $data, $where = "") {

        if ($where != "") {
            $this->db->where($where);
        } else {
            $this->db->where($column, $id);
        }
        $this->db->update($table, $data);
    }
    public function delete($column,$id, $table, $where = "") {

    if ($where != "") {
      $this->db->where($where);
    } else {
      $this->db->where($column, $id);
    }
    $this->db->delete($table);
  }

//find_summary function get all data of specific id from database
    public function find_rows_data($table,$where,$orderBy="")
    {
        # code...
          $this->db->select('*');
     $this->db->from($table);
     if($where)
     $this->db->where($where);
        if ($orderBy != "") {
            foreach ($orderBy as $order) {
                $this->db->order_by($order[0], $order[1]);
            }

        }
     $query = $this->db->get();
    
     return $query->result();
    }

    //findNumRowsForaboveCode function fetch number of rows from database with condition 
public function findNumRowsForaboveCode($table,$where,$joins)
  {
    # code...
    
     $this->db->select('*');
     $this->db->from($table);
      if ($joins != "") {
           foreach ($joins as $join) {
               $this->db->join($join[0], $join[1], $join[2]);
           }

       }
       if ($where != "") {
           foreach ($where as $w) {

               $this->db->where($w);
           }

       }
     $query = $this->db->get();
     $result = $query->num_rows();
     return $result;
  }

   //$employer->username function get data against diff conditions(general function) from database
 public function findSearchIssue($table,$where="",$start="",$end="",$row="",$joins = "",$like="", $select="",$orderBy="",$groupby="")

    {
          if ($select != "") {
          $this->db->select($select);
          }
         
    $this->db->from($table);    
     if ($joins != "") {
           foreach ($joins as $join) {
               $this->db->join($join[0], $join[1], $join[2]);
           }

       }

  if ($where != "") {
           foreach ($where as $w) {

               $this->db->where($w);
           }

       }
     
    if($like)
    {

        $this->db->like($like);

    }    

   
      if ($orderBy != "") {
           foreach ($orderBy as $order) {
               $this->db->order_by($order[0], $order[1]);
           }

       }
         if ($groupby!= "") {
           foreach ($groupby as $group) {
               $this->db->group_by($group[0]);
           }

       }

      if ($start != "" || $end!="") {
           $this->db->limit($end,$start);

       }

            $query = $this->db->get();


    if(empty($row))

    $result = $query->row();

    else{

        $result = $query->result();

    }

    return $result;

    }


    //new function for favourite campsites.

    public function findNumRowsForaboveCode2($table,$where,$joins)
    {
        # code...

        $this->db->select('*');
        $this->db->from($table);
        if ($joins != "") {
            foreach ($joins as $join) {
                $this->db->join($join[0], $join[1], $join[2]);
            }

        }
        if ($where != "") {
           // foreach ($where as $w) {

                $this->db->where($where);
            //}

        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }


    public function findSearchIssue2($table,$where="",$start="",$end="",$row="",$joins = "",$like="", $select="",$orderBy="",$groupby="")

    {
        if ($select != "") {
            $this->db->select($select);
        }

        $this->db->from($table);
        if ($joins != "") {
            foreach ($joins as $join) {
                $this->db->join($join[0], $join[1], $join[2]);
            }

        }

        if ( is_array( $where ) )
        {

            if ($where != "") {

                foreach ($where as $w) {

                    $this->db->where($w);
                }

            }

        }else{

            if ($where != "") {

                $this->db->where($where);
            }
        }


        if($like)
        {

            $this->db->like($like);

        }


        if ($orderBy != "") {
            foreach ($orderBy as $order) {
                $this->db->order_by($order[0], $order[1]);
            }

        }
        if ($groupby!= "") {
            foreach ($groupby as $group) {
                $this->db->group_by($group[0]);
            }

        }

        if ($start != "" || $end!="") {
            $this->db->limit($end,$start);

        }

        $query = $this->db->get();


        if(empty($row))

            $result = $query->row();

        else{

            $result = $query->result();

        }

        return $result;

    }


    // for searching only 
     public function findSearchIssueCampingsite($table,$where="",$start="",$end="",$row="",$joins = "",$like="", $select="",$orderBy="",$groupby="")

    {
          if ($select != "") {
          $this->db->select($select);
          }
         
    $this->db->from($table);    
     if ($joins != "") {
           foreach ($joins as $join) {
               $this->db->join($join[0], $join[1], $join[2]);
           }

       }

  if ($where != "") {
           // foreach ($where as $w) {

               $this->db->where($where);
           // }

       }
     
    if($like)
    {

        $this->db->like($like);

    }    

   
      if ($orderBy != "") {
           foreach ($orderBy as $order) {
               $this->db->order_by($order[0], $order[1]);
           }

       }
         if ($groupby!= "") {
           foreach ($groupby as $group) {
               $this->db->group_by($group[0]);
           }

       }

      if ($start != "" || $end!="") {
           $this->db->limit($end,$start);

       }

            $query = $this->db->get();


    if(empty($row))

    $result = $query->row();

    else{

        $result = $query->result();

    }

    return $result;

    }
    public function findNumRowsForaboveCodeCampsite($table,$where,$joins)
  {
    # code...
    
     $this->db->select('*');
     $this->db->from($table);
      if ($joins != "") {
           foreach ($joins as $join) {
               $this->db->join($join[0], $join[1], $join[2]);
           }

       }
       if ($where != "") {
           // foreach ($where as $w) {

               $this->db->where($where);
           // }

       }
     $query = $this->db->get();
     $result = $query->num_rows();
     return $result;
  }

    //testing pagination
    public function findNumRowsForaboveCodeCampsite2($table,$where="",$row="",$joins = "",$like="", $select="",$orderBy="",$groupby="")
    {
        if ($select != "") {
            $this->db->select($select);
        }

        $this->db->from($table);
        if ($joins != "") {
            foreach ($joins as $join) {
                $this->db->join($join[0], $join[1], $join[2]);
            }
        }

        if ($where != "") {
            // foreach ($where as $w) {

            $this->db->where($where);
            // }

        }

        if($like)
        {

            $this->db->like($like);

        }


        if ($orderBy != "") {
            foreach ($orderBy as $order) {
                $this->db->order_by($order[0], $order[1]);
            }

        }
        if ($groupby!= "") {
            foreach ($groupby as $group) {
                $this->db->group_by($group[0]);
            }

        }

        $query = $this->db->get();
        $result = $query->num_rows();


        return $result;
    }





 public function findNumRowsForaboveCodeCampsite123($table,$where="",$start="",$end="",$row="",$joins = "",$like="", $select="",$orderBy="",$groupby="")
  {
    # code...
    
      if ($select != "") {
          $this->db->select($select);
          }
         
    $this->db->from($table);    
     if ($joins != "") {
           foreach ($joins as $join) {
               $this->db->join($join[0], $join[1], $join[2]);
           }

       }

  if ($where != "") {
           // foreach ($where as $w) {

               $this->db->where($where);
           // }

       }
     
    if($like)
    {

        $this->db->like($like);

    }    

   
      if ($orderBy != "") {
           foreach ($orderBy as $order) {
               $this->db->order_by($order[0], $order[1]);
           }

       }
         if ($groupby!= "") {
           foreach ($groupby as $group) {
               $this->db->group_by($group[0]);
           }

       }

     

            $query = $this->db->get();


    if(empty($row))

    $result = $query->num_rows();

    else{

        $result = $query->num_rows();

    }

     return $result;
  }
  public function all_commetns_with_replies()
  {


     $comment = "SELECT * FROM comments" ;
     $query = $this->db->query($comment);
      return $query->result_array();

     //  $data = [] ;

     //  $cc = "SELECT * FROM comments LIMIT 0, 10";

     //  $query = $this->db->query($cc);
     //  $comments= $query->result();
     //  foreach ($comments as $key => $value) {

     //   $data[$key] = $value->id ;
     
     //  }

     //  $commentIds = join(",", $data);

     //  $replies = "SELECT * from replys where comment_id IN (".implode(',', $data).")" ;
     //     $query = $this->db->query($replies);
     // $replies= $query->result();

     // $result=['comments'=>$comments, 'replies'=>$replies];
     //  return $result ;
//     $comments="SELECT *
// FROM comments
// WHERE comments.id IN (select replys.comment_id from replys)";
//     $this->db->select("*");
// $this->db->from("comments c");
// $this->db->join("replys r", "c.id = r.comment_id ");
// $q = $this->db->get();
// return $q->result_array();



  }

  //chnages by adil
    public function getAllBlogs()
    {
        $this->db->select("*");
        $this->db->from("blog");
         $this->db->where('status',1);
        //$this->db->order_by('id_image', 'desc');

        $query = $this->db->get();
        return $query->result();

    }

  public function loadThreeBlogComments(){
    $this->db->select("*");
    $this->db->from("blog");
    $this->db->where('status' , 1) ;
    $this->db->order_by("blog_id", "desc");
    $this->db->limit(2);
    $query = $this->db->get();
    return $query->result();
  }

    public function getBlogDetail($id)
    {
        $this->db->select('*') ;
        $this->db->from('blog') ;
        $this->db->where('blog_slug' , $id) ;
        $this->db->where('status' , 1) ;

        $query = $this->db->get() ;
        return $query->result() ;
    }

      public function getBlogDetailsss($id)
    {
        $this->db->select('*') ;
        $this->db->from('blog') ;
        $this->db->where('blog_id' , $id) ;

        $query = $this->db->get() ;
        return $query->result() ;
    }

    public function deleteBlog($id)
    {
       $this->db->from('blog');
       $this->db->where('blog_id' , $id);
       $this->db->delete() ;
       $this->db->from('comments')
       ->where('detect_forum',1)
       ->where('forum_id',$id)
       ->delete();
    }

    public function deleteNewsletter($id)
    {
       $this->db->from('newsletter1');
       $this->db->where('id' , $id);
        $query = $this->db->get() ;
        $newsletter = $query->result() ;
         // print_r($newsletter[0]->pdf_file);
         
         // die();

        unlink(FCPATH.'/uploads/newsletter/'.$newsletter[0]->pdf_file);
        unlink(FCPATH.'/uploads/newsletter/'.$newsletter[0]->image);
        $this->db->from('newsletter1');
       $this->db->where('id' , $id);
       $this->db->delete() ;
       // $this->db->from('comments')
       // ->where('detect_forum',1)
       // ->where('forum_id',$id)
       // ->delete();
    }




    public function editBlog($id)
    {
      $this->db->from('blog');
      $this->db->where('blog_id' , $id);
      $query = $this->db->get() ;

      return $query->result() ;  

    }
     public function editNewsletter($id)
    {
      $this->db->from('newsletter1');
      $this->db->where('id' , $id);
      $query = $this->db->get() ;
      return $query->result() ;  

    }

    public function approvedComments($id)
  {
    //testing
    $this->db->select('*,comments.id as commnent_id ,comments.created_at as createD')
      ->from('comments')
      ->join('subscribe', ' subscribe.id = comments.sender_id')
      ->where('forum_id' , $id)
      ->where('detect_forum' ,1)
      ->where('comments_approved' , 1) ;
      

      $query = $this->db->get();

    //end testing

//      $this->db->select('*');
//      $this->db->from('comments');
//      $this->db->where('forum_id',$id);
//      $this->db->where('detect_forum',0);
//      $query = $this->db->get() ;

      return $query->result() ;

  }

  public function getAllForums()
  {

    $this->db->select('*,forums.forum_id as forum_compensation_id ,forums.created_at as dateCreatedAt, count(c.name ) as comment_count')
//    $this->db->select('*')
      ->from('forums')
    ->join('subscribe','subscribe.id = forums.user_id','inner')
    ->join('comments c' , ' CAST(c.forum_id AS UNSIGNED) =   forums.forum_id','left')
    ->where('forum_approval' , 1)
    ->where('block' , 0)
    ->group_by('forums.forum_id')
     ->order_by('forums.forum_id', 'DESC');
    $query = $this->db->get() ;

    return $query->result() ;

  }


    public function getAllForumsPagination($offset,$like="")
  {
    
    if($like !="")
    {

      $this->db->select('*,forums.forum_id as forum_compensation_id ,forums.created_at as dateCreatedAt, count(c.name ) as comment_count')
//    $this->db->select('*')
      ->from('forums')
    ->join('subscribe','subscribe.id = forums.user_id','inner')
    ->join('comments c' , ' CAST(c.forum_id AS UNSIGNED) =   forums.forum_id','left')
    ->where('forum_approval' , 1)
    ->where('block' , 0)
    ->like('question', $like)
    ->group_by('forums.forum_id')
     ->order_by('forums.forum_id', 'DESC')
     ->limit(10, $offset);
     
    $query = $this->db->get() ;

    return $query->result() ;
    }else{
      $this->db->select('*,forums.forum_id as forum_compensation_id ,forums.created_at as dateCreatedAt, count(c.name ) as comment_count')
//    $this->db->select('*')
      ->from('forums')
    ->join('subscribe','subscribe.id = forums.user_id','inner')
    ->join('comments c' , ' CAST(c.forum_id AS UNSIGNED) =   forums.forum_id','left')
    ->where('forum_approval' , 1)
    ->where('block' , 0)
    ->group_by('forums.forum_id')
     ->order_by('forums.forum_id', 'DESC')
     ->limit(10, $offset);
     
    $query = $this->db->get() ;

    return $query->result() ;

    }

    

  }

  public function getForumDetail($id)
  {
    $this->db->select('*,forums.created_at as dateCreatedAt')
      ->from('forums')
      ->join('subscribe' , 'subscribe.id = forums.user_id')
      ->where('forum_id' ,$id )
      ->where('block' , 0 ) ;

    $query = $this->db->get();
    return $query->result() ;

  }

  public function getForumComents($id)
  {
    $this->db->select("*,comments.id as comment_id, comments.created_at as commentCreatedat")->from('comments')
      ->join('subscribe s' , 's.id = comments.sender_id' )
      ->where('detect_forum' ,2)
      ->where('forum_id' , $id)
    ->where('comments_approved' , 1) ;
    $query = $this->db->get();
    return $query->result() ;
  }

  public function getAllFroumsPending()
  {
    $this->db->select('*')
      ->from('forums')
      ->where('forum_approval' , 0);
    $query = $this->db->get();

    return $query->result() ;
  }

  public function editForum($data,$id)
  {
    $this->db->update('forums',$data,array('forum_id' => $id));
  }


  public function forum_delete($id)
  {
    $this->db->from('forums');
    $this->db->where('forum_id' , $id);
    $this->db->delete() ;
  }


  public function uproveForum($data,$id)
  {
    $this->db->update('forums',$data,array('forum_id' => $id));
  }

  //end changes by adil

  public function getAdminId()
  {
    $this->db->select('id')
    ->from('subscribe')
      ->where('email' , 'admin@colorado.com') ;
      $query = $this->db->get();

      return $query->row() ;
  }

  public function getAllBlogComments($id)
  {
    $this->db->select("*,comments.id as comID, comments.created_at as comment_date")->from('comments')
      ->join('subscribe s' , 's.id = comments.sender_id' )
      ->where('detect_forum' ,1)
      ->where('forum_id' , $id)
      ->where('comments_approved' , 1) ;
    $query = $this->db->get();
    return $query->result() ;

  }

  public function activeDeactive($id)
  {
    $sql = "UPDATE forums SET block = IF(block=1, 0, 1) where forum_id  = ".$id;
    $this->db->query($sql);
  }


  public function forumPostComment($id)
  {
    $this->db->select("*,comments.id as comID")->from('comments')
      ->join('subscribe s' , 's.id = comments.sender_id' )
      ->where('detect_forum' ,2)
      ->where('forum_id' , $id)
      ->where('comments_approved' , 1) ;
    $query = $this->db->get();
    return $query->result() ;
  }

  public function lastFiveBlog()
  {
    $this->db->select("*");
    $this->db->from("blog");
    $this->db->where('status' , 1) ;
    $this->db->order_by("blog_id", "desc");
    $this->db->limit(5);
    $query = $this->db->get();
    return $query->result();
  }

  public function dateDiffrence($yourDate)
  {
    # code...
    $now = new DateTime(date("Y-m-d")); // or your date as well
    $your_date = new DateTime($yourDate);            
    $TotalDays = $now->diff($your_date);
    $TotalDays=$TotalDays->format('%r%a');
    // die(var_dump($yourDate));
    return  $TotalDays;
  }

  public function checkSubscriptionExp()
  {
    # code...
    if(isset($this->session->userdata['userdata']) && $this->session->userdata['userdata']['days'] < 0){
      redirect(base_url().'profile');
      return;
    }
  }

}
?>
