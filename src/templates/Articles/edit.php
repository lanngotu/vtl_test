<?php
    echo $this->Html->link(
        'Home',
        ['controller' => 'Articles', 'action' => 'index', '_full' => true]
    );
    echo $this->Form->create($article,array(        
        'inputDefaults' => array(
            'label' => true,
            'div' => true,
        )
    ));    
    echo $this->Form->control(
        'title',
        [
            'label' => [
                'text' => 'Title'
            ],
            'required' => true,
            'value'=>$article->title,
        ]);    
    echo $this->Form->control(
        'desc',
        [
            'label' => [
                'text' => 'Desc'
            ],
            'type'=>'textarea',
            'required' => true,
            'value'=>$article->desc,
        ]);
    // echo $this->Form->input('detail', ['required' => true]);
    echo $this->Form->control(
        'detail',
        [
            'label' => [

                'text' => 'Detail'
            ],
            'type'=>'textarea',
            'required' => true,
            'value'=>$article->detail,
        ]);
    echo $this->Form->control(
        'Save Article',
        [
            'label' => [
                'text' => 'Save Article'
            ],
            'type'=>'submit',
        ]);    
    echo $this->Form->end();
?>