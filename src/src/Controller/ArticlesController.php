<?php
declare(strict_types=1);

namespace App\Controller;

class ArticlesController extends AppController{
    
    public function initialize():void{
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index(){
        try{
            $articles = $this->Articles->find('all');
            $countArticle= $articles->count();            
            $this->set(compact('articles','countArticle'));
        }
        catch(\Exception $e){
            echo 'Error:'.$e->getMessage();
            return;
       }
    }

    public function add(){
        try{
            if ($this->request->is('post')) {
                $articleEntity = $this->Articles->newEntity($this->request->getdata());
                $article = $this->Articles->patchEntity($articleEntity, $this->request->getdata());
                $article->created_at = date("Y-m-d H:i:s");            
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Your article has been saved.'));
                    return $this->redirect(['controller' => 'Articles', 'action' => 'index']);
                }
                $this->Flash->error(__('Unable to add your post.'));
            }
            return $this->redirect(['controller' => 'Articles', 'action' => 'index']);
        }
        catch(\Exception $e){
            echo 'Error:'.$e->getMessage();
            return;
       }
    }

    public function edit($id = null){
        try{        
            $article = $this->Articles->get($id);
            if ($this->request->is(['post','put'])) {
                // Method post or put will update DB
                $articleEntity = $this->Articles->patchEntity($article, $this->request->getdata());
                $articleEntity->updated_at = date("Y-m-d H:i:s");
                if ($this->Articles->save($articleEntity)) {
                    $this->Flash->success(__('Your article has been updated.'));                
                    return $this->redirect(['controller' => 'Articles', 'action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your post.'));
            }
            else{
                // method Get to show data
                $this->set('article', $article);
            }
        }
        catch(\Exception $e){
            echo 'Error:'.$e->getMessage();
            return;
       }
    }
    
    public function delete($id){
        try{        
            $this->request->allowMethod(['post', 'delete']);
            $article = $this->Articles->get($id);
            if ($this->Articles->delete($article)) {
                $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
                return $this->redirect(['controller' => 'Articles', 'action' => 'index']);
            }
        }
        catch(\Exception $e){
            echo 'Error:'.$e->getMessage();
            return;
       }
    }
}