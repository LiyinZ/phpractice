<?php 

class Pagination {
	public $current_page;
	public $per_page;
	public $total_count;
	public $total_pages;

	public function __construct($page = 1, $per_page = 2, $total_count = 0) {
		$this->current_page = (int)$page;
		$this->per_page = (int)$per_page;
		$this->total_count = (int)$total_count;
		$this->total_pages = $this->total_pages();
	}

	public function offset() {
		return ($this->current_page - 1) * $this->per_page;
	}

	private function total_pages() {
		return ceil(($this->total_count)/($this->per_page));
	}

	public function prev_page() {
		return $this->current_page - 1;
	}

	public function next_page() {
		return $this->current_page + 1;
	}

	public function has_prev_page() {
		return $this->prev_page() >= 1;
	}

	public function has_next_page() {
		return $this->next_page() <= $this->total_pages();
	}

	// print active if current
	private function print_active($i, $page) {
		if ($i == $page) {
			echo "<li class=\"active\"><a href=\"index.php?page=$i\">$i</a>";
		} else {
			echo "<li><a href=\"index.php?page=$i\">$i</a>";
		}
	}

	// print previous arrow
	private function print_prev() {
		if ($this->has_prev_page()) {
			echo "<li><a href=\"index.php?page={$this->prev_page()}\">«</a></li>";
		} else {
			echo "<li class=\"disabled\"><a>«</a></li>";
		}
	}

	// print next arrow
	private function print_next() {
		if ($this->has_next_page()) {
			echo "<li><a href=\"index.php?page={$this->next_page()}\">»</a></li>";
		} else {
			echo "<li class=\"disabled\"><a>»</a></li>";
		}
	}

	// list all page numbers, max 5 items
	public function list_pages() {
		$this->print_prev();

		if ($this->current_page+2 >= $this->total_pages-1) {
			$this->pages_right();
		} else {
			$this->pages_left();
		}

		$this->print_next();
	}

	private function pages_left() {
		for ($i = $this->current_page; $i <= $this->current_page+2; $i++) {
			$this->print_active($i, $this->current_page);
		}
		for ($i = $this->total_pages-1; $i <= $this->total_pages; $i++) {
			$this->print_active($i, $this->current_page);
		}
	}

	private function pages_right() {
		if ($this->total_pages-4 > 0) {
			for ($i = $this->total_pages-4; $i <= $this->total_pages; $i++) {
				$this->print_active($i, $this->current_page);
			}
		} else {
			for ($i = 1; $i <= $this->total_pages; $i++) {
				$this->print_active($i, $this->current_page);
			}
		}
	}
}

 ?>