<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 01.03.2018
 * Time: 22:20
 */

function outComments($article) {
	outTree(0, $article['comments'], 0);
}

function outTree($parent_id, $comments, $level) {
	foreach ($comments as $comment) {
		if ($comment['parent_id'] == $parent_id) {
			include('application/views/comment-view.php');
			outTree($comment['comment_id'], $comments, $level+1);
		}
	}
}

function translit($s) {
	$s = (string) $s; // преобразуем в строковое значение
	$s = strip_tags($s); // убираем HTML-теги
	$s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
	$s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
	$s = trim($s); // убираем пробелы в начале и конце строки
	$s = mb_strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
	$s = strtr($s, array(
		'а' => 'a',
		'б' => 'b',
		'в' => 'v',
		'г' => 'g',
		'д' => 'd',
		'е' => 'e',
		'ё' => 'e',
		'ж' => 'j',
		'з' => 'z',
		'и' => 'i',
		'й' => 'y',
		'к' => 'k',
		'л' => 'l',
		'м' => 'm',
		'н' => 'n',
		'о' => 'o',
		'п' => 'p',
		'р' => 'r',
		'с' => 's',
		'т' => 't',
		'у' => 'u',
		'ф' => 'f',
		'х' => 'h',
		'ц' => 'c',
		'ч' => 'ch',
		'ш' => 'sh',
		'щ' => 'shch',
		'ы' => 'y',
		'э' => 'e',
		'ю' => 'yu',
		'я' => 'ya',
		'ъ' => '',
		'ь' => ''
	));
//		$s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
	$s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус

	return $s; // возвращаем результат
}