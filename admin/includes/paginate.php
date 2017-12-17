<?php
/**
 * Created by PhpStorm.
 * User: Elad
 * Date: 17/12/2017
 * Time: 07:41
 */

class Paginate {

    protected $current_page;
    protected $items_per_page;
    protected $items_total_count;

    public function __construct($page=1, $item_per_page=10, $items_total_count=0){

        $this->setCurrentPage((int)$page);
        $this->setItemsPerPage((int)$item_per_page);
        $this->setItemsTotalCount((int)$items_total_count);
    }

    //region Getters & Setters
    /**
     * @return mixed
     */
    public function getCurrentPage()
    {
        return $this->current_page;
    }

    /**
     * @param mixed $current_page
     */
    public function setCurrentPage($current_page)
    {
        $this->current_page = $current_page;
    }

    /**
     * @return mixed
     */
    public function getItemsPerPage()
    {
        return $this->items_per_page;
    }

    /**
     * @param mixed $items_per_page
     */
    public function setItemsPerPage($items_per_page)
    {
        $this->items_per_page = $items_per_page;
    }

    /**
     * @return mixed
     */
    public function getItemsTotalCount()
    {
        return $this->items_total_count;
    }

    /**
     * @param mixed $items_total_count
     */
    public function setItemsTotalCount($items_total_count)
    {
        $this->items_total_count = $items_total_count;
    }
    //endregion


    public function next(){

        return $this->getCurrentPage() + 1;

    }

    public function previous(){

        return $this->getCurrentPage() - 1;

    }

    /*
     * returns the total number of pages needed.
     */
    public function page_total(){

        return ceil($this->getItemsTotalCount()/$this->getItemsPerPage());
    }

    public function has_previous(){

        return $this->previous() >= 1 ? true : false;
    }

    public function has_next(){

        return $this->next() <= $this->page_total() ? true : false;
    }

    public function offset(){

        return ($this->getCurrentPage()-1) * $this->getItemsPerPage();

    }


}