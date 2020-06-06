<?php
	class Podcast {

		private $con;
		private $id;
		private $mysqliData;
		private $title;
		private $mentorId;
		private $podcastCoverId;
		private $category;
		private $duration;
		private $path;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query = mysqli_query($this->con, "SELECT * FROM podcasts WHERE id='$this->id'");
			$this->mysqliData = mysqli_fetch_array($query);
			$this->title = $this->mysqliData['title'];
			$this->mentorId = $this->mysqliData['mentor'];
			$this->podcastCoverId= $this->mysqliData['podcastCover'];
			$this->category = $this->mysqliData['category'];
			$this->duration = $this->mysqliData['duration'];
			$this->path = $this->mysqliData['path'];
		}

		public function getTitle() {
			return $this->title;
		}

		public function getId() {
			return $this->id;
		}

		public function getMentor() {
			return new Mentor($this->con, $this->mentorId);
		}

		public function getAlbum() {
			return new Album($this->con, $this->podcastCoverId);
		}

		public function getPath() {
			return $this->path;
		}

		public function getDuration() {
			return $this->duration;
		}

		public function getMysqliData() {
			return $this->mysqliData;
		}

		public function getCategory() {
			return $this->category;
		}

	}
?>