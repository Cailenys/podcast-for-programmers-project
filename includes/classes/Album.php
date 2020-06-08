<?php
	class Album {

		private $con;
		private $id;
		private $title;
		private $mentorId;
		private $category;
		private $podcastCoverPath;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query = mysqli_query($this->con, "SELECT * FROM podcastcover WHERE id='$this->id'");
			$album = mysqli_fetch_array($query);

			$this->title = $album['title'];
			$this->mentorId = $album['mentor'];
			$this->category = $album['category'];
			$this->podcastCoverPath = $album['podcastCoverPath'];
		}

		public function getTitle() {
			return $this->title;
		}

		public function getMentor() {
			return new Mentor($this->con, $this->mentorId);
		}

		public function getCategory() {
			return $this->category;
		}

		public function getPodcastCoverPath() {
			return $this->podcastCoverPath;
		}

		public function getNumberOfPodcasts() {
			$query = mysqli_query($this->con, "SELECT id FROM podcasts WHERE podcastcover='$this->id'");
			return mysqli_num_rows($query);
		}

		public function getPodcastIds() {

			$query = mysqli_query($this->con, "SELECT id FROM podcasts WHERE podcastcover='$this->id' ORDER BY seriesOrder ASC");

			$array = array();

			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;

		}


	}
?>