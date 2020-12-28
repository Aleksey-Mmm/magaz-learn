<option
    <?php if($category['id'] == $this->model->parent_id){echo 'selected';}?>
    <?php if($category['id'] == $this->model->id){echo 'disabled';}?>
    value="<?= $category['id'] ?>">
    <?= $tab. ' '.  $category['title'] ?>
</option>
<?php
if(isset($category['children'])) {?>
    <?= $this->getMenuHtml($category['children'], $tab. '-')?>
<?php } ?>