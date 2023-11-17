<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->charset() ?>
    <title>Article Management</title>
    <?= $this->Html->css(["normalize.min", "milligram.min", "fonts", "cake","style"]) ?>
</head>
<body>
<h1>Add Article form</h1>
<?php
    echo $this->Form->create(NULL,array(
        "url"=>"/article/add",
        "inputDefaults" => array(
            "label" => true,
            "div" => true,
        )
    ));    
    echo $this->Form->control(
        "title",
        [
            "label" => [
                "text" => "Title"
            ],
            "required" => true                
        ]);    
    echo $this->Form->control(
        "desc",
        [
            "label" => [
                "text" => "Desc"
            ],
            "type"=>"textarea",
            "required" => true
        ]);
    // echo $this->Form->input("detail", ["required" => true]);
    echo $this->Form->control(
        "detail",
        [
            "label" => [

                "text" => "Detail"
            ],
            "type"=>"textarea",
            "required" => true
        ]);
    echo $this->Form->control(
        "Save Article",
        [
            "label" => [
                "text" => "Add Article"
            ],
            "type"=>"submit",
        ]);    
    echo $this->Form->end();
?>
<h1>Article list</h1>
<?php if(!empty($articles) && $countArticle>0): ?>    
    <table>
        <tr>
            <th>Title</th>
            <th>Desc</th>
            <th>Action</th>
        </tr>
        <?php foreach($articles as $article): ?>
            <tr>
                <td><?=$this->Html->link($article->title, ["action"=> "edit", $article->id])?></td>
                <td><?=$article->desc;?></td>
                <td>
                    <?=$this->Html->link("Edit", ["action" => "edit", $article->id])?>
                    <?=$this->Form->postLink(
                            "Delete",
                            ["action" => "delete", $article->id],
                            ["confirm" => "Are you sure to delete Article: {$article->title}?"])
                    ?>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
<?php endif; ?>
</body>
</html>