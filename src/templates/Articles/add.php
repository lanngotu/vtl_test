<h1>Add Blog Article</h1>
<?php
    echo $this->Form->create(NULL,array('url'=>'/article/add'));    
    echo $this->Form->input('title');
    echo $this->Form->input('desc', ['rows' => '3']);
    echo $this->Form->input('detail', ['rows' => '3']);
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>