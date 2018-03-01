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
		if ( !empty($_SESSION['error'])) {
			$flash['error'] = $_SESSION['error'];
			unset($_SESSION['error']);
		}
		if ( !empty($_SESSION['message'])) {
			$flash['message'] = $_SESSION['message'];
			unset($_SESSION['message']);
		}
		if ($flash) {
			return $flash;
		} else {
			return false;
		}
	}

	public function get_articles() {

		$stmt     = $this->pdo->query('SELECT article.article_id FROM article ORDER BY date DESC');
		$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($articles as &$article) {
			$article = $this->get_article($article['article_id']);
		}

		return $articles;
	}

	public function get_article($article_id) {
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
			':ai' => $article['article_id']
		));
		$article['tag'] = $stmt->fetchAll(PDO::FETCH_COLUMN);

		//get images
		$stmt = $this->pdo->prepare('SELECT img_path
FROM images
WHERE article_id = :ai');
		$stmt->execute(array(
			':ai' => $article['article_id']
		));
		$article['images'] = $stmt->fetchAll(PDO::FETCH_COLUMN);

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
		if (!empty($result)) {
			return true;
		} else {
			return false;
		}
	}

	function translit($s) {
		$s = (string) $s; // преобразуем в строковое значение
		$s = strip_tags($s); // убираем HTML-теги
		$s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
		$s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
		$s = trim($s); // убираем пробелы в начале и конце строки
		$s = mb_strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
		$s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d',
		                     'е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y',
		                     'к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p',
		                     'р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h',
		                     'ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y',
		                     'э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
//		$s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
		$s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
		return $s; // возвращаем результат
	}
}