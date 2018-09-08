<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 24.01.2018
 * Time: 17:30
 */

class Model {
	/**
	 * @var PDO $pdo
	 */
	public $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function checkFlash() {
		$flash[] = '';
		if ( !empty($_SESSION['error'])) {
			$flash['error'] = $_SESSION['error'];
			unset($_SESSION['error']);
		}
		if ( !empty($_SESSION['message'])) {
			$flash['message'] = $_SESSION['message'];
			unset($_SESSION['message']);
		}
		if ( !empty($flash)) {
			return $flash;
		} else {
			return false;
		}
	}

	function getArticlesByPage($page, $num_on_page) {
		$stmt = $this->pdo->prepare('SELECT article_id 
FROM article 
ORDER BY date DESC 
LIMIT :lim OFFSET :off');
		$lim  = intval($num_on_page, 10);
		$off  = intval($page * $num_on_page-$num_on_page, 10);
		$stmt->bindParam(':lim', $lim, PDO::PARAM_INT);
		$stmt->bindParam(':off', $off, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $r) {
			$articles[] = $this->get_article($r['article_id']);
		}

		return $articles;
	}

	public function get_article($article_id) {
		//get text
		$stmt = $this->pdo->prepare('SELECT
  article.article_id,
  article.title,
  article.date,
  article.text,
  user.name,

  COUNT(likes.user_id) AS likes
FROM article
  JOIN user ON article.author = user.user_id
  JOIN likes ON article.article_id = likes.article_id
WHERE article.article_id = :id');
		$stmt->execute(array(
			':id' => $article_id
		));
		$article = $stmt->fetch(PDO::FETCH_ASSOC);

		//get tags
		$stmt = $this->pdo->prepare('SELECT tag_name.tag_name
FROM tag_name
  JOIN tag ON tag_name.tag_id = tag.tag_id
WHERE article_id = :ai');
		$stmt->execute(array(
			':ai' => $article_id
		));
		$article['tag'] = $stmt->fetchAll(PDO::FETCH_COLUMN);

		//get images
		$stmt = $this->pdo->prepare('SELECT img_path
FROM images
WHERE article_id = :ai');
		$stmt->execute(array(
			':ai' => $article_id
		));
		$article['images'] = $stmt->fetchAll(PDO::FETCH_COLUMN);

		//get comments
		$stmt = $this->pdo->prepare('SELECT comments.article_id,
 comments.parent_id, 
 comments.comment_id, 
 comments.comment_text, 
 user.name
FROM comments
JOIN user ON comments.author = user.user_id
WHERE article_id = :ai');
		$stmt->execute(array(
			':ai' => $article_id
		));
		$article['comments'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $article;
	}

	public function getLikeStatus($article_id, $user_id) {
		$stmt = $this->pdo->prepare('SELECT 1
FROM likes
WHERE article_id = :ai AND user_id = :ui');
		$stmt->execute(array(
			':ai' => $article_id,
			':ui' => $user_id,
		));

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ( !empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	function getPagination($page, $num_on_page) {

		$pagination['current'] = $page;
		$stmt                  = $this->pdo->query('SELECT COUNT(article_id) AS count FROM article');
		$result                = $stmt->fetch(PDO::FETCH_ASSOC);
		$pagination['last']    = ceil($result['count'] / $num_on_page);

		return $pagination;
	}
}