<?php
/**
 * Date: 20.11.2020
 * Time: 16:10
 */

namespace app\components;


use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{

    public $tpl;
    public $ul_class;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if ($this->ul_class === null) {
            $this->ul_class = 'menu';
        }
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';

    }

    public function run()
    {
        //get cash
        $menu = \Yii::$app->cache->get('menu');
        if ($menu) {
            return $menu;
        }

        $this->data = Category::find()
            ->select('id, parent_id, title')
            ->indexBy('id')
            ->asArray()
            ->all();
        $this->tree = $this->getTree();
        $this->menuHtml = '<ul class="'. $this->ul_class. '">';
        $this->menuHtml .= $this->getMenuHtml($this->tree);
        $this->menuHtml .= '</ul>';
        //debug($this->tree);
        //set cash время жизни в секундах
        \Yii::$app->cache->set('menu', $this->menuHtml, 60);
        return $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];
        $c = 0;
        foreach ($this->data as $id => &$node) {
            $c++;
            if (!$node['parent_id']) { //верхняя нода (parent_id == 0)
                $tree[$id] = &$node;
            } else {
                $this->data[$node['parent_id']]['children'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree)
    {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category)
    {
        ob_start();
        include __DIR__. '/menu_tpl/'. $this->tpl;
        return ob_get_clean();
    }
}