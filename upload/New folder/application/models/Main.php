<?php
defined('BASEPATH') OR exit('direct access is denied');

class Main extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function table_content($table){
    	$this->db->limit(15);
        $query = $this->db->get($table);

            return $query->result();
    }
    public function table_header(){
        $table_name = 'bugs';
        $query = $this->db->query('DESCRIBE '.$table_name.' ');
        return $query->result();
    }
    public function list_tables(){
        $query = $this->db->query('SHOW TABLES');
        return $query->result();
    }
    public function delete($id,$table_name){
        $this->db->where('id',$id);
        if($this->db->delete($table_name)){
            return true;
        }else return false;
    }
    public function search_users($data){
            $this->db->select('id,username,email,name,tel');
         $this->db->where("username LIKE '%$data%' OR email LIKE '%$data%' OR name LIKE '%$data%' ");
         $query = $this->db->get('users');
         return $query->result();

        }
    public function search_posts($data){
        $this->db->select('id,title,cat_id,views,likes');
        $this->db->where("title LIKE '%$data%' ");
        $this->db->limit(15);
        $query = $this->db->get('posts');
        return $query->result();

    }
    public function post_delete($id){
        $this->db->where('id',$id);
         $this->db->delete('posts');
         return true;

    }
    public  function table_num_count($table_name){
    	$query=$this->db->get($table_name);
    	return $query->num_rows();

	}
	public function post_rank(){
    	$query=$this->db->query('SELECT title,views FROM posts ORDER BY views DESC LIMIT 15 ');
    	return $query->result();
	}
	public function cat_list(){
		$query = $this->db->query('SELECT name,id FROM post_cats LIMIT 15');
		return $query->result();
	}
	public function cat_id($post_cat){
		$this->db->select('id');
		$this->db->where('name',$post_cat);
		$query = $this->db->get('post_cats');
		return $query->result();

	}
	public function post_add($data){
		$result=$this->db->insert('posts',$data);
		return $result;


	}
	public function cat_add($cat_name){
		$result=$this->db->insert('post_cats',$cat_name);
		return $result;

	}
	public function slide_add($data){
		$result=$this->db->insert('main',$data);

//		$query=$this->db->query("SELECT val1 FROM main WHERE var 	= 'slide_count' ");
//		$num = array();
//
//		foreach ($query->result() as $item){
//			$num[] = $item->val1;
//		}
		$query = $this->db->get('main');
		$num = $query->num_rows();
		$this->db->set('val1',$num-1);
		$this->db->where('var','slide_count');
		$this->db->update('main');


		return $result;
	}
	//this is a test function just to test the results i want to get in the whole process of programming the admin panel
	public function slide_delete($id){
		$query = $this->db->get('main');
		$num = $query->num_rows();
		$this->db->set('val1',$num-2);
		$this->db->where('var','slide_count');
		$this->db->update('main');
		$this->db->where('id',$id);

		return $this->db->delete('main');

	}
	public function edit_post_get_info($post_id){
		$this->db->where('id',$post_id);
		$query = $this->db->get('posts');
		return $query->result();
	}
	public function post_rank_weekly(){
		$query = $this->db->query('SELECT * FROM posts ORDER BY time DESC,views DESC LIMIT 20');//this query will be used to create related json responses in the program
		return $query->result();
	}
	public function test(){
		$query = $this->db->query('SELECT time FROM posts ORDER BY time DESC,views DESC LIMIT 20');//this query will be used to create related json responses in the program
		return $query->result();
	}
}