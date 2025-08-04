<?php

namespace app\traits;

trait Paginate
{
    protected $limit = 10;
    protected $offset = 0;
    protected $currentPage;
    protected $linksPerPage = 5;

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function setCurrentPage()
    {
        $this->currentPage = $_GET['page'] ?? 1;
        $this->offset = ($this->currentPage - 1) * $this->limit;
        
        return $this;
    }

    public function totalPages($total)
    {
        return ceil($total / $this->limit);
    }

    public function renderLinks($totalRegisters)
    {
        $totalPages = $this->totalPages($totalRegisters);

        $startLinks = 1;

        if($this->currentPage > $this->linksPerPage){
            $startLinks = $this->currentPage - $this->linksPerPage;
        }

        $endLinks = $totalPages;

        if(($this->currentPage + $this->linksPerPage) < $totalPages){
            $endLinks = $this->currentPage + $this->linksPerPage;
        }

        $links = '<ul style="list-style-type: none; padding: 0; margin: 0;">';
        $active = $totalPages ? 'active' : '';
        if($this->currentPage > 1){
            $previusPage = $this->currentPage - 1;
            $links .= "<li style='display: inline-block; margin-right: 5px;'> <a style='text-decoration: none; padding: 5px 10px; border: 1px solid #ccc; color: " . ($active ? "red" : "#333") . ";' href='?page=1' class='{$active}'> Init </a> </li>";
            $links .= "<li style='display: inline-block; margin-right: 5px;'> <a style='text-decoration: none; padding: 5px 10px; border: 1px solid #ccc; color: " . ($active ? "red" : "#333") . ";' href='?page={$previusPage}' class='{$active}'> << </a> </li>";
        }

        for ($i = $startLinks; $i <= $endLinks; $i++) {
            $active = $this->currentPage == $i ? 'active' : '';
            $links .= "<li style='display: inline-block; margin-right: 5px;'> <a style='text-decoration: none; padding: 5px 10px; border: 1px solid #ccc; color: " . ($active ? "red" : "#333") . ";' href='?page={$i}' class='{$active}'> {$i} </a> </li>";
        }

        if($this->currentPage < $totalPages){
            $nextPage = $this->currentPage + 1;
            $links .= "<li style='display: inline-block; margin-right: 5px;'> <a style='text-decoration: none; padding: 5px 10px; border: 1px solid #ccc; color: " . ($active ? "red" : "#333") . ";' href='?page={$nextPage}' class='{$active}'> >> </a> </li>";
            $links .= "<li style='display: inline-block; margin-right: 5px;'> <a style='text-decoration: none; padding: 5px 10px; border: 1px solid #ccc; color: " . ($active ? "red" : "#333") . ";' href='?page={$totalPages}' class='{$active}'> End </a> </li>";

        }
        $links .= '</ul>';
        
        return $links; // Adicionado para retornar a string gerada
    }
}
