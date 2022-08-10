<?php

namespace App\Controllers;

class News extends BaseController
{
    public function index() // show news list
    {
        $model = model(NewsModel::class);

        $data['list'] = $model->getNews(); // get all news
        $data['title'] = "News List";
        
        return view('templates/header', $data)
            . view('news/list',$data)
            . view('templates/footer');
    }

    public function add(){
        $data['back'] = 1;
        $model = model(NewsModel::class);
        $data['title'] = "Create News";
        if(!empty ($_POST['title'])){  // if $_POST has value, add this value into table
            
            $model->addNews($_POST);
            return redirect()->to('/news');
            
        }else{
            return view('templates/header', $data)
            . view('news/add',$data)
            . view('templates/footer');
        }    
    }

    public function edit($id = null){
        $data['back'] = 1;
        $model = model(NewsModel::class);
        if(!empty($_POST['id'])){  // if $_POST has value, update data
            $model->updateNews($_POST); // update data base on its id
            return redirect()->to('/news');
        }else{
            $data['article'] = $model->getNewsById($id); // get data base on its id
            if(!$data['article']){  // check if id is correct
                throw new \CodeIgniter\Exceptions\PageNotFoundException("article edit");
            }
            $data['title'] = "Edit News";
            return view('templates/header', $data)
                . view('news/add',$data)
                . view('templates/footer');
        }     
    }

    

    public function delete($id){
        $model = model(NewsModel::class);
        if(empty($id)){
            return redirect()->to('/news');
        }else{
            $model->delete($id);
            return redirect()->to('/news');
        }
    }

    public function show($id = 1)
    {
        $data['back'] = 1;
        $model = model(NewsModel::class);
        $data['article'] = $model->getNewsById($id); // get data base on its id
        if(!$data['article']){ // check if id is correct
            throw new \CodeIgniter\Exceptions\PageNotFoundException("article");
        }
        $data['title'] = "News Content";
        return view('templates/header', $data)
        . view('news/content',$data)
        . view('templates/footer');

    }
}