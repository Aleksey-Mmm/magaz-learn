<option
    <?php if($category['id'] == $this->model->category_id){echo 'selected';}?>
    value="<?= $category['id'] ?>">
    <?= $tab. ' '.  $category['title'] ?>
</option>
<?php
if(isset($category['children'])) {?>
    <?= $this->getMenuHtml($category['children'], $tab. '-')?>
<?php } ?>