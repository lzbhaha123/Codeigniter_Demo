<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';

    public function getNews()
    {
        return $this->findAll();
    }

    public function getNewsById($id){
        return $this->where(['id'=>$id])->first();
    }
    public function updateNews($data){
        $this->allowedFields = ['title', 'body'];
        return $this->update($data['id'],$data);
    }
    public function addNews($data){
        $this->allowedFields = ['title', 'body'];
        return $this->save(['title'=>$data['title'],'body'=>$data['body']]);
    }
}