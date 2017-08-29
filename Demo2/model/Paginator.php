<?php 
namespace util;
class Paginator{
	public $totalRecordOnepage; // Só Record trên 1 trang
	public $pageIndex; // Chỉ số trang
	public $total; // Tổng số Record

	public function createLink($totalShowPage, $n){ // $totalShowPage : số trang hiện trên thanh
		
		echo '<nav aria-label="Page navigation">';
		echo '<ul class="pagination">';
// <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
		if($n <= $totalShowPage ){
			for($i = 1 ;$i <= $this->pageIndex -1; $i++){
				echo '<li><a href="?show=' . $this->totalShowPage . '&page=' . $i . '">'.$i.'</a></li>';		
			}
			echo '<li class="active"><a href="#">'.$this->pageIndex.'<span class="sr-only">(current)</span></a></li>';

			for($i = $this->pageIndex + 1 ;$i <= $n; $i++){
				echo '<li><a href="?show=' . $this->totalShowPage . '&page=' . $i . '">'.$i.'</a></li>';		
			}
		}
		else if($this->pageIndex + $totalShowPage -1 >= $n){			
			if($this->pageIndex != 1){
				echo '<li>';
				echo '<a href="?show=' . $totalShowPage . '&page=' .($this->pageIndex - 1) . '" aria-label="Previous">';
				echo '<span aria-hidden="true">&laquo;</span>';
				echo '</a>';
				echo '</li>';
			}
			for($i = $n - $totalShowPage + 1; $i<= $this->pageIndex - 1; $i++){
				echo '<li><a href="?show=' . $totalShowPage . '&page=' . $i . '">'.$i.'</a></li>'; 
			}
			echo '<li class="active"><a href="#">'.$this->pageIndex.'<span class="sr-only">(current)</span></a></li>';
			for($i = $this->pageIndex + 1; $i<= $n; $i++){
				echo '<li><a href="?show=' . $totalShowPage . '&page=' . $i . '">'.$i.'</a></li>';
			}
		}
		else{
			if($this->pageIndex != 1){
				echo '<li>';
				echo '<a href="?show=' . $totalShowPage . '&page=' .($this->pageIndex - 1) . '" aria-label="Previous">';
				echo '<span aria-hidden="true">&laquo;</span>';
				echo '</a>';
				echo '</li>';
			}

			echo '<li class="active"><a href="#">'.$this->pageIndex.'<span class="sr-only">(current)</span></a></li>';
			for($i = $this->pageIndex + 1;$i < $this->pageIndex + $totalShowPage; $i++){
				echo '<li><a href="?show=' . $totalShowPage . '&page=' . $i . '">'.$i.'</a></li>';				
			}	
			echo '<li>';
			echo '<a href="?show=' . $totalShowPage . '&page=' .($this->pageIndex + 1) . '" aria-label="Next">';
			echo '<span aria-hidden="true">&raquo;</span>';
			echo '</a>';
			echo '</li>';
		}

		echo '</ul>';
		echo '</nav>';
	}
}
?>