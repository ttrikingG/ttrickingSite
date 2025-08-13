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

        $links = '<ul style="list-style-type: none; padding: 0; margin: 0; display: inline-flex;">';
        $active = $totalPages ? 'active' : '';

        $baseStyle = "color: #84cc16; text-decoration: none; padding: 8px 16px; margin: 0 4px; border-radius: 6px; transition: all 0.3s ease; font-weight: 500; border: 1px solid transparent;";
        $hoverStyle = "onmouseover=\"this.style.background='rgba(132, 204, 22, 0.2)'\" onmouseout=\"this.style.background='transparent'\"";

        if ($this->currentPage > 1) {
            $previusPage = $this->currentPage - 1;
            $links .= "<li><a style='{$baseStyle}' {$hoverStyle} href='?page=1' class='{$active}'>Init</a></li>";
            $links .= "<li><a style='{$baseStyle}' {$hoverStyle} href='?page={$previusPage}' class='{$active}'>&laquo;</a></li>";
        }

        for ($i = $startLinks; $i <= $endLinks; $i++) {
            $active = $this->currentPage == $i ? 'active' : '';
            $bgActive = $active ? "background: rgba(132, 204, 22, 0.2);" : "";
            $links .= "<li><a style='{$baseStyle} {$bgActive}' {$hoverStyle} href='?page={$i}' class='{$active}'>{$i}</a></li>";
        }

        if ($this->currentPage < $totalPages) {
            $nextPage = $this->currentPage + 1;
            $links .= "<li><a style='{$baseStyle}' {$hoverStyle} href='?page={$nextPage}' class='{$active}'>&raquo;</a></li>";
            $links .= "<li><a style='{$baseStyle}' {$hoverStyle} href='?page={$totalPages}' class='{$active}'>End</a></li>";
        }

        $links .= '</ul>';

        return $links;

    }
}
