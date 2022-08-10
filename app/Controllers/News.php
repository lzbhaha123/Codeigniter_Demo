<?php

namespace App\Controllers;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data['list'] = $model->getNews();
        $data['title'] = "News List";
        
        return view('templates/header', $data)
            . view('news/list',$data)
            . view('templates/footer');
    }

    public function add(){
        $data['back'] = 1;
        $model = model(NewsModel::class);
        $data['title'] = "Create News";
        if(!empty ($_POST['title'])){
            
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
        if(!empty($_POST['id'])){
            $model->updateNews($_POST);
            return redirect()->to('/news');
        }else{
            $data['article'] = $model->getNewsById($id);
            if(!$data['article']){
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
        $data['article'] = $model->getNewsById($id);
        if(!$data['article']){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("article");
        }
        $data['title'] = "News Content";
        return view('templates/header', $data)
        . view('news/content',$data)
        . view('templates/footer');

    }
}