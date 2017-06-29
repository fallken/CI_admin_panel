<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
    {

        parent::__construct();

    }
    public function index()//this function will be called when the whole class controller has been initiated
	{
        $data['table_header'] = $this->main->table_header();
        $data['users'] = $this->main->table_num_count('users');
        $data['posts'] = $this->main->table_num_count('posts');
        $data['bugs'] = $this->main->table_num_count('bugs');
        $data['post_cat'] = $this->main->table_num_count('post_cats');
        $data['post_rank']= $this->main->post_rank();
        $data['post_rank_weekly']= $this->post_rank_weekly_process($this->main->post_rank_weekly());
        $data['main_view']='admin_shit';
		$this->load->view('main',$data);
	}
    public function show($table){
        $data['table']=$this->main->table_content($table);
        $data['table_name']=$table;
        $data['main_view']='table_data';
        $this->load->view('main',$data);

    }
    public function search_users(){//it work fine and could be used in the project :)
        $search_query = $this->input->post('search');
        $data['table']=$this->main->search_users($search_query);
        $data['table_name']='users';
        $data['main_view']='table_data';
        $this->load->view('main',$data);


    }
    public function search_posts(){//it work fine and could be used in the project :)
        $search_query = $this->input->post('search');
        $data['table']=$this->main->search_posts($search_query);
        $data['table_name']='posts';
        $data['main_view']='table_data';
        $this->load->view('main',$data);

    }
    public function delete($id,$table_name){//this function is working pretty fine and could be used in the project :)
        if($this->main->delete($id,$table_name)==true)echo 'the operation was successfull';//change it to what u desire

    }
    public function delete_post($id){//a specific function for deleting a post :)
        if ($this->main->post_delete($id)){
            $this->session->set_flashdata('post_deleted','the post '.$id .' has been deleted successfully');
            $url = '/welcome/show/posts';
            redirect($url);
        }else echo 'system has fucked up m8';
    }
    public function add_post(){//this function still needs to be tested :(
		$post_name=$this->input->post('post_name');
		$image_path = "../images/posts/";
		if (!isset($post_name)){
			$data['cat_list']=$this->main->cat_list();
            $data['main_view'] = 'add_post';
            $this->load->view('main', $data);
        }else{
            $post_name=$this->input->post('post_name');
            $post_body=$this->input->post('post_body');
            $cat_id=$this->input->post('post_cat');
            $image = $this->upload_image($image_path);
            $post_data = array(
                'title'=>$post_name,
                'text'=>urlencode($post_body),
                'cat_id'=>$cat_id,
				'time'=>time(),
                'img'=>$image
            );
            if ($this->main->post_add($post_data)){

				$data['cat_list']=$this->main->cat_list();
                $data['main_view'] = 'add_post';
                $this->load->view('main',$data);
                $this->session->set_flashdata('post_created','post has been created');
                redirect('welcome/add_post');


            }else{
            	$data['cat_list']=$this->main->cat_list();
                $this->session->set_flashdata('post_failure','the post creation process face a failure');
                $data['main_view']='add_post';
                $this->load->view('main',$data);
	            }


        }}
    public function upload_image($path="../images/")
    {
        //this whole system is a little tricky but i think the problem could be solved and i can analyze it and figure it out
        //man i didnt exacly know the permission system but now i have fixed it it was a permission like : sudo chmod -R 777 /opt/lampp thi
        //grants full permission and the server can do its job its good really good
        //now it will upload the image and its location

        $type = explode('.', $_FILES["image"]["name"]);
        $type = $type[count($type) - 1];
        $url = "" . $this->rand_code(5) . $this->rand_code(5) . '.' . $type;
        if (in_array($type, array("jpg", "jpeg", "gif", "png")))
            if (is_uploaded_file($_FILES["image"]["tmp_name"]))
                if (move_uploaded_file($_FILES['image']["tmp_name"],$path. $url)) {
                    return $url;
                } else {
                    return false;
                }
    }
	public function add_cat(){
        $image_path = "../images/cats/";
    	$cat_name=$this->input->post('cat_name');
    	if (!isset($cat_name)){
    		$data['main_view']='add_cat';
    		$this->load->view('main',$data);

		}else{

			$data= array('name'=>$this->input->post('cat_name'),'img'=> $this->upload_image($image_path));

    		if ($this->main->cat_add($data)){
    			$this->session->set_flashdata('success','the category has been inserted successfully ');
    			redirect('welcome/add_cat');
			}
			else{
    			$this->session->set_flashdata('failure','category insertion process has faced and error');
    			redirect('welcome/add_cat');
			}
		}

	}
	function rand_code($num)
	{
		//produces  a random code in the process
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$size = strlen( $chars );
		$str = "";
		for( $i = 0; $i < $num; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
	public function add_slide(){
        $image_path = "../images/others/";
        $slide_name=$this->input->post('slide_name');
		if (!isset($slide_name)){
			$data['main_view']='add_slide';
			$this->load->view('main',$data);
		}else{
		    $slide_name = $this->input->post('slide_name');
		    $slide_name = $slide_name.rand(5,150);
			$data= array('var'=>$slide_name,'val1'=> $this->upload_image($image_path),'val2'=>$this->input->post('slide_body'),
              'link'=>$this->input->post('slide_link'),'type'=>$this->input->post('slide_type'));
			if ($this->main->slide_add($data)){
				$this->session->set_flashdata('success','the slide has been inserted successfully ');
				redirect('welcome/add_slide');
			}else{
				$this->session->set_flashdata('failure','slide insertion process has faced and error');
				redirect('welcome/add_cat');
			}
		}
	}
	public function delete_slide($id){
		if ($this->main->slide_delete($id)){
			$this->session->set_flashdata('slide_delete','the requsted slide has been deleted successfully');
			redirect('welcome/show/main');
		}

	}
	public function post_rank_weekly_process($info){
		$time2 = $this->seconds_to_time(time());
		//this block is to sort stdclass arrays by the key they have
		$col  = 'views';
		$sort = array();
		foreach ($info as $i => $obj) {
			$sort[$i] = $obj->{$col};
		}

		array_multisort($sort, SORT_DESC, $info);
		//end of block
		foreach ($info  as $item){
				if($time2-$this->seconds_to_time($item->time)<=7){
					$results[]=$item;
				}}


				return $this->array_multi_subsort($results,'id');//just lol ... i reveresed the whole array to make it from ascending to descending
	}
	function array_multi_subsort($array, $subkey)
	{//sorting multidimensional arrays designed for codeigniter
		$b = array(); $c = array();

		foreach ($array as $k => $v)
		{
			$b[$k] = strtolower($v->$subkey);
		}

		asort($b);
		foreach ($b as $key => $val)
		{
			$c[] = $array[$key];
		}

		return $c;
	}
	public function edit($post_id){
        $image_path = "../images/posts/";
        $input = $this->input->post('post_name');
        if (!isset($input)){
            $data['post_info']=$this->main->edit_post_get_info($post_id);
            $data['cat_list']=$this->main->cat_list();
            $data['main_view']='edit_post';
            $this->load->view('main',$data);
        }
        else{
			$path=$this->main->edit_post_get_info($post_id);
			if (unlink('../images/posts/'.$path[0]->img)){
				$this->session->set_flashdata('update_success','the image was also successfully deleted');
			}
			else{
				$this->session->set_flashdata('update_failure','could not delete the image'.' '.base_url().'index.php/'.$path[0]->img.' probably image is not there');
			}
			$image=$this->upload_image($image_path);
				$update=array(
					'title'=>$this->input->post('post_name'),
					'text'=>urlencode($this->input->post('post_body')),
					'img'=>$image,
					'cat_id'=>$this->input->post('post_cat')
				);
				if($this->main->update($post_id,$update)){
                    $this->session->set_flashdata('update_yes','the data has been updated successfully');
                }else{
                    $this->session->set_flashdata('update_no','the data has not been updated successfully');

                }
                redirect('welcome/edit/'.$path[0]->id);
		}


		}
    public function test($post_id){
//
//		$time2 = $this->seconds_to_time(time());
////		$time_table=$this->main->test();
//
//		$time1=$this->seconds_to_time(1497713461);
//								echo $time2-$time1;
        $data['post_info']=$this->main->edit_post_get_info($post_id);
        $data['main_view']='edit_post_test';
        $this->load->view('main',$data);

    }
	public function seconds_to_time($seconds){//a function to convert seconds stored in databse into real date
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a');

	}
}
